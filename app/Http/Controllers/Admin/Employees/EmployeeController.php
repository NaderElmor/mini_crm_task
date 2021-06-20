<?php

namespace App\Http\Controllers\Admin\Employees;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employees = Employee::when($request->search, function ($query) use ($request) {

            return $query->where('first_name','like','%'. $request->search .'%')
                         ->orWhere('last_name','like','%'. $request->search .'%')
                         ->orWhere('email','like','%'. $request->search .'%');
        })->latest()->paginate(10);

        return view('admin.employees.index', compact('employees'));
    }


    public function create()
    {
        $companies = Company::all();
        return view('admin.employees.create', compact('companies'));
    }


    public function store(EmployeeRequest $request)
    {
        Employee::create($request->all());
        session()->flash('success', 'Data Added Successfully');
        return redirect()->route('admin.employees.index');

    }//end of store



    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('admin.employees.edit', compact('employee', 'companies'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->all());
        session()->flash('success','Data Updated Successfully');
        return redirect()->route('admin.employees.index');
    }



    public function destroy(Employee $employee)
    {
        $employee->delete();
        session()->flash('success', 'Data Deleted Successfully');
        return redirect()->route('admin.employees.index');

    }
}
