<?php

namespace App\Http\Controllers\Employee\Manage;

use App\Http\Controllers\Controller;
use App\Mail\EmployeeInfo;
use App\Models\Employee;
use App\Models\EmployeeAttandance;
use Exception;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    public function get_index()
    {
        $employee = Employee::find(Auth::guard('employee')->id());
        $items = EmployeeAttandance::where('employee_id', $employee->id)->orderBy('created_at', 'DESC')->get();
        return view('employee_module.manage.employee.index', compact('items'));
    }


    public function get_present()
    {
        $employee = Employee::find(Auth::guard('employee')->id());
        $items = EmployeeAttandance::where('employee_id', $employee->id)->where('status', 'Present')->orderBy('created_at', 'DESC')->get();
        return view('employee_module.manage.employee.index', compact('items'));
    }

    public function get_absence()
    {
        $employee = Employee::find(Auth::guard('employee')->id());
        $items = EmployeeAttandance::where('employee_id', $employee->id)->where('status', 'Absence')->orderBy('created_at', 'DESC')->get();
        return view('employee_module.manage.employee.index', compact('items'));
    }

    public function get_data_details($id)
    {
        $item = Employee::find($id);
        return view('employee_module.manage.employee.show', compact('item'));
    }

    public function get_attandance_show()
    {
        $item = Employee::find(Auth::guard('employee')->id());
        // dd();
        return view('employee_module.manage.employee.attandance', compact('item'));
    }

    public function take_attandance(Request $request)
    {
        try {
            $employee = Employee::find(Auth::guard('employee')->id());
            $employeeAttandance = new EmployeeAttandance();
            $todayDate = EmployeeAttandance::where('employee_id', $employee->id)->whereDate('created_at', Carbon::today())->first();
            $yesterdayDate = EmployeeAttandance::where('employee_id', $employee->id)->whereDate('created_at', Carbon::yesterday())->first();
            if ($yesterdayDate != null && $yesterdayDate->in_time != null && $yesterdayDate->in_date != null && $yesterdayDate->out_time == null && $yesterdayDate->out_date == null) {
                $employeeAttandanceData['status'] = 'Absence';
                $yesterdayDate->fill($employeeAttandanceData)->update();
            }

            $date = Carbon::parse($request->date);
            $time = Carbon::parse($request->time);
            if ($todayDate != null) {
                if ($todayDate->in_time != null && $todayDate->in_date != null && $todayDate->out_time == null && $todayDate->out_date == null) {
                    $hours = $time->diffInHours($todayDate->in_time);

                    $employeeAttandanceData['out_date'] = $date;
                    $employeeAttandanceData['out_time'] = $time;
                    $employeeAttandanceData['hours'] = $hours;
                    $employeeAttandanceData['updated_at'] = Carbon::now();
                    if($hours <= 1) {
                        $employeeAttandanceData['status'] = 'Absence';
                    } else {
                        $employeeAttandanceData['status'] = 'Present';
                    }
                    $todayDate->fill($employeeAttandanceData)->update();
                    return response()->json([
                        'status' => 200,
                        'message' => 'Check in office time : ' . $time
                    ]);
                } else {
                    return response()->json([
                        'status' => 400,
                        'message' => 'You already check out office time.'
                    ]);
                }
            }
            if ($todayDate == null) {
                $employeeAttandanceData['employee_id'] = $request->id ?? null;
                $employeeAttandanceData['in_date'] = $date ?? null;
                $employeeAttandanceData['in_time'] = $time ?? null;
                $employeeAttandanceData['out_date'] = null;
                $employeeAttandanceData['out_time'] = null;
                $employeeAttandanceData['hours'] = null;
                $employeeAttandanceData['status'] = 'On Duty';
                $employeeAttandanceData['created_at'] = Carbon::now();
                $employeeAttandance->insert($employeeAttandanceData);

                return response()->json([
                    'status' => 200,
                    'message' => 'Check in office time : ' . $time
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 400,
                'message' => 'Something is wrong, kindly try again'
            ]);
        }
    }
}
