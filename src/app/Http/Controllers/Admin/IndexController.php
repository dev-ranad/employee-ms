<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeAttandance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function get_index()
    {
        $items = Employee::orderBy('created_at', 'DESC')->get();
        $totalEmp = Employee::where('status', 1)->count();
        $todayPre = EmployeeAttandance::where('status', 'On Duty')->orWhere('status', 'Present')->whereDate('created_at', Carbon::today())->count();
        $todayAbs = EmployeeAttandance::where('status', 'Absence')->whereDate('created_at', Carbon::today())->count();
        return view('admin_module.index', compact('items', 'totalEmp', 'todayPre', 'todayAbs'));
    }
}
