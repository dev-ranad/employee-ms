<?php

namespace App\Http\Controllers\Admin\Manage;

use App\Http\Controllers\Controller;
use App\Mail\EmployeeInfo;
use App\Models\Employee;
use App\Models\EmployeeAttandance;
use App\Models\EmployeeContact;
use App\Models\EmployeeDetail;
use Exception;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{
    public function get_index()
    {
        $items = Employee::orderBy('created_at', 'DESC')->get();
        return view('admin_module.manage.employee.index', compact('items'));
    }

    public function get_active()
    {
        $items = Employee::where('status', 1)->orderBy('created_at', 'DESC')->get();
        return view('admin_module.manage.employee.index', compact('items'));
    }

    public function get_banned()
    {
        $items = Employee::where('status', 0)->orderBy('created_at', 'DESC')->get();
        return view('admin_module.manage.employee.index', compact('items'));
    }

    public function post_data_create()
    {
        return view('admin_module.manage.employee.create');
    }

    public function get_data_details($id)
    {
        $item = Employee::find($id);
        return view('admin_module.manage.employee.show', compact('item'));
    }

    public function post_data_save(Request $request)
    {
        try {
            // $request->validate([
            //     'first_name' => 'required',
            //     'last_name' => 'required',
            //     'username' => 'required|string',
            //     'email' => 'required|string|email:rfc,dns',
            //     'password' => 'required|string',
            //     'contact_name' => 'required|string',
            //     'contact_email' => 'required|string|email:rfc,dns',
            //     'contact_number' => 'required|numeric',
            //     'country' => 'required|string',
            //     'state' => 'required|string',
            //     'city' => 'required|string',
            //     'zip_code' => 'required|numeric',
            //     'address' => 'required|string',
            //     'photo' => 'required|image|mimes:jpeg,png,jpg',
            // ]);
            // dd($request->all());
            $employee = new Employee();
            $employeeDetail = new EmployeeDetail();
            $employeeContact = new EmployeeContact();

            $employee->first_name = $request->first_name ?? null;
            $employee->last_name = $request->last_name ?? null;
            $employee->username = $request->username ?? null;
            $employee->email = $request->email ?? null;
            $employee->password = Hash::make($request->password) ?? null;
            $employee->save();
            // dd($employee);

            if ($employee) {
                if ($request->hasFile('photo')) {
                    $photo = $request->file('photo');
                    $photo_name = 'Photo_' . rand() . '.' . $photo->getClientOriginalExtension();
                    $photo_resize = Image::make($photo->getRealPath());
                    $photo_resize->resize(512, 512);
                    $photo_resize->save(public_path('upload/employee/' . $photo_name));
                    $employeeDetailData['photo'] = $photo_name;
                }
                $employeeDetailData['employee_id'] = $employee->id ?? null;
                $employeeDetailData['country'] = $request->country ?? null;
                $employeeDetailData['state'] = $request->state ?? null;
                $employeeDetailData['city'] = $request->city ?? null;
                $employeeDetailData['zip_code'] = $request->zip_code ?? null;
                $employeeDetailData['address'] = $request->address ?? null;
                $employeeDetail->insert($employeeDetailData);

                $employeeContactData['employee_id'] = $employee->id ?? null;
                $employeeContactData['contact_name'] = $request->contact_name ?? null;
                $employeeContactData['contact_email'] = $request->contact_email ?? null;
                $employeeContactData['contact_number'] = $request->contact_number ?? null;
                $employeeContact->insert($employeeContactData);
            }
            // $data = [
            //     'name' => $request->first_name.' '.$request->last_name,
            //     'email' => $request->email,
            //     'password' => $request->password
            // ];
            // // dd($data);
            // Mail::to($request->user())->send(new EmployeeInfo($data));
            return redirect()->back();
        } catch (Exception $ex) {
            dd($ex->getMessage());
            // notify()->error($ex->getMessage());
            // return redirect()->back();
        }
    }

    public function get_attandance()
    {
        $items = EmployeeAttandance::orderBy('created_at', 'DESC')->get();
        return view('admin_module.manage.employee.attandance', compact('items'));
    }


    public function get_present()
    {
        $items = EmployeeAttandance::where('status', 'Present')->orderBy('created_at', 'DESC')->get();
        return view('admin_module.manage.employee.attandance', compact('items'));
    }

    public function get_absence()
    {
        $items = EmployeeAttandance::where('status', 'Absence')->orderBy('created_at', 'DESC')->get();
        return view('admin_module.manage.employee.attandance', compact('items'));
    }
}
