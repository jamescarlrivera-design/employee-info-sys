<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Employee;
use App\Models\EmploymentStatus;
use App\Models\SalaryRates;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class EmployeeDashboardController extends Controller
{
    public function index()
    {


        $employee = Auth::user()->employee;

        return view('employee.home', compact('employee'));


    }



    

    public function view()
    {

        $employee = Auth::user()->employee;

        return view('employee.view', compact('employee'));

    }



    public function changePassword()
    {
        return view('employee.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors([
                'current_password' => 'The current password is incorrect.'
            ]);
        }

        Auth::user()->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('employee.change-password')
            ->with('success', 'Password changed successfully!');
    }
}
