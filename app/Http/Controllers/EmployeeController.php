<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use App\Http\Requests\Employee;
use App\Models\Companies;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employee = Employees::all();
        return view('employee.index', ['employees' => $employee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $companies = Companies::all();
        return view('employee.create', ['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Employee $request)
    {
        //
        $validatedData = $request->validated();
        $employee = new Employees();
        $employee->firstname =$request->get('firstname');
        $employee->lastname = $request->get('lastname');
        $employee->company_id = $request->get('company');
        $employee->save();
        return redirect()->route('employee.index')->with('success', 'Employee has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $employee = Employees::find($id);
        $companies = Companies::all();
        return view('employee.edit', ['employee' => $employee, 'companies' => $companies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Employee $request, $id)
    {
        //
        $validatedData = $request->validated();
        $employee = Employees::find($id);
        $employee->firstname = $request->firstname;
        $employee->lastname = $request->lastname;
        $employee->company_id = $request->company;
        $employee->save();
        return redirect()->route('employee.index')->with('update', 'Employee has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete = Employees::find($id);
        $delete->delete();
        return redirect()->back()->with('delete', 'Employee has been removed successfully');
    }
}
