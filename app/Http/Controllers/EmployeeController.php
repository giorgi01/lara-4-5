<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::all();
        $companies = Company::all();
        return view('all-employee', ['employees' => $employees, 'companies' => $companies]);
    }

    public function store(Request $request){
        Employee::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'birthdate' => $request->birthdate,
            'personal_id' => $request->personal_id,
            'salary' => $request->salary,
            'company_id' => $request->company_id
        ]);
        return redirect()->route('employees.index');
    }

    public function edit(Request $request, $id)
    {
        $employee = Employee::where('id', $id)->first();

        return view('edit-employee')->with('employee', $employee);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::where('id', $id)->first();
        $employee->name = $request->name;
        $employee->lastname = $request->lastname;
        $employee->birthdate = $request->birthdate;
        $employee->personal_id = $request->personal_id;
        $employee->salary = $request->salary;
        $employee->company_id = $request->company_id;

        $employee->save();

        return redirect()->route('employees.index');
    }

    public function destroy(Request $request)
    {
        Employee::where('id', $request->employee_id)->delete();

        return redirect()->route('employees.index');
    }
}
