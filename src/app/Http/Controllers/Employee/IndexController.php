<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeAttandance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function get_index()
    {

        $employee = Employee::find(Auth::guard('employee')->id());
        $items = EmployeeAttandance::where('employee_id', $employee->id)->orderBy('created_at', 'DESC')->get();
        $totalPre = EmployeeAttandance::where('employee_id', $employee->id)->where('status', 'Present')->where('created_at', Carbon::now()->month)->count();
        $totalAbs = EmployeeAttandance::where('employee_id', $employee->id)->where('status', 'Absence')->where('created_at', Carbon::now()->month)->count();
        return view('employee_module.index', compact('items', 'totalPre', 'totalAbs'));
    }
}
