<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use App\Http\Requests\Employee;
use App\Models\Companies;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->has('trashed')) {
            $employee = Employees::onlyTrashed()->get();
        }
        else {
            $employee = Employees::all();
        }
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
    public function edit($id = "")
    {
        //
        try {
            $employee = Employees::findOrFail($id);
        } catch(ModelNotFoundException $exception) {
            return redirect()->route('employee.index')->with('missingemployee', 'The employee does not exists');
        }
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
        try {
            $employee = Employees::findOrFail($id);
        } catch(ModelNotFoundException $exception) {
            return redirect()->route('employee.index')->with('missingemployee', 'The employee does not exists');
        }
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
    public function destroy($id = "")
    {
        //
        try {
            $delete = Employees::findOrFail($id);
        } catch(ModelNotFoundException $exception) {
            return redirect()->route('employee.index')->with('missingemployee', 'The employee does not exists');
        }
        $delete->delete();
        return redirect()->back()->with('delete', 'Employee has been removed successfully');
    }


    /**
     * get all deleted employees
     *
     * @return response()
     */
    public function retrive() {
        $employees = Employees::onlyTrashed()->get();
        return view('employee.trash', ['employees' => $employees]);
    }

    /**
     * restore specific post
     *
     * @return void
     */
    public function restore($id)
    {
        Employees::withTrashed()->find($id)->restore();
        return redirect()->back()->with('employeerestore', 'Employee has been restored succesfully');
    }

    /**
     * restore all post
     *
     * @return response()
     */
    public function restoreAll()
    {
        Employees::onlyTrashed()->restore();
        return redirect()->route('employee.index')->with('employeerestoreall', 'All the deleted employees have been restored succesfully');
    }

    public function createAPI(Employee $request) {
        $validatedData = $request->validated();
        $employee = new Employees();
        $employee->firstname =$request->get('firstname');
        $employee->lastname = $request->get('lastname');
        $companyID = Companies::select('id')->where('name', '=', $request->get('company'))->get();
        if ($companyID == "") {
            return ['Failure' => 'Invalid company id'];
        }
        $employee->company_id = $companyID[0]->id;
        $saved = $employee->save();
        if(!$saved) {
            return ['Failure' => 'Employee could not be added'];    
        }
        return ['Success' => 'Employee has been added successfully'];
    }

    public function deleteAPI(Request $request) {
        $id = $request->get('id');
        try {
            $delete = Employees::findOrFail($id);
        } catch(ModelNotFoundException $exeption) {
            return ['Failure' => 'Employee doesn\'t exists'];
        }
        $deleted = $delete->delete();
        if(!$deleted) {
            return ['Failure' => 'Employee could not be deleted'];    
        }
        return ['Success' => 'Employee has been deleted successfully'];
    }

    public function updateAPI(Employee $request) {
        $validatedData = $request->validated();
        try {
            $employee = Employees::findOrFail($request->get('id'));
        } catch(ModelNotFoundException $exeption) {
            return ['Failure' => 'Employee doesn\'t exists'];
        }
        $employee->firstname = $request->get('firstname');
        $employee->lastname = $request->get('lastname');
        $companyID = Companies::select('id')->where('name', '=', $request->get('company'))->get();
        if ($companyID == "") {
            return ['Failure' => 'Invalid company id'];
        }
        $employee->company_id = $companyID[0]->id;
        $saved = $employee->save();
        if(!$saved) {
            return ['Failure' => 'Employee could not be updated'];    
        }
        return ['Success' => 'Employee has been updated successfully'];
    }

    public function readAPI(Request $request) {
        if($request->has('id')) {
            $id = $request->get('id');
            try {
                $employees = Employees::findOrFail($id);
            } catch(ModelNotFoundException $exeption) {
                return ['Failure' => 'Employee doesn\'t exists'];
            }
        }
        else {
            $employees = Employees::all();
        }
        return ['Success' => $employees];
    }
}
