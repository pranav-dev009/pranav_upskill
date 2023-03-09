<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;
use App\Http\Requests\Company;
use App\Models\Employees;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CompanyController extends Controller
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
            $companies = Companies::onlyTrashed()->get();
        }
        else {
            $companies = Companies::all();
        }
        return view('company.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Company $request)
    {
        //
        $validatedData = $request->validated();
        $company = new Companies();
        $company->name =$request->get('companyname');
        $company->email = $request->get('companyemail');
        $company->logo = $request->file('logo')->getClientOriginalName();
        $company->website = $request->get('website');
        $company->save();
        $request->file('logo')->storeAs('public/images', $request->file('logo')->getClientOriginalName());
        return redirect()->route('company.index')->with('success', 'Company has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Companies  $company
     * @return \Illuminate\Http\Response
     */
    public static function show($id)
    {
        //
        try {
            $company = Companies::findOrFail($id);
        } catch(ModelNotFoundException $exception) {
            return redirect()->route('company.index')->with('missingcompany', 'The company does not exists');
        }
        return $company->name;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Companies  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id = "")
    {
        //
        try {
            $company = Companies::findOrFail($id);
        } catch(ModelNotFoundException $exception) {
            return redirect()->route('company.index')->with('missingcompany', 'The company does not exists');
        }
        return view('company.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Companies  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Company $request, $id)
    {
        //
        $validatedData = $request->validated();
        try {
            $company = Companies::findOrFail($id);
        } catch(ModelNotFoundException $exception) {
            return redirect()->route('company.index')->with('missingcompany', 'The company does not exists');
        }
        $company->name =$request->get('companyname');
        $company->email = $request->get('companyemail');
        $company->logo = $request->file('logo')->getClientOriginalName();
        $company->website = $request->get('website');
        $company->save();
        $request->file('logo')->storeAs('public/images', $request->file('logo')->getClientOriginalName());
        return redirect()->route('company.index')->with('update', 'Company has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Companies  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id = "")
    {
        $employeeCount = Employees::select('*')->where('company_id', '=', $id)->get()->count();
        if($employeeCount > 0) {
            return redirect()->route('company.index')->with('companyhasemployee', 'This company cannot be deleted as it contains employees');
        }
        else {
            try {
                $delete = Companies::findOrFail($id);
            } catch(ModelNotFoundException $exception) {
                return redirect()->route('company.index')->with('missingcompany', 'The company does not exists');
            }
            $delete->delete();
            return redirect()->back()->with('delete', 'Company has been removed successfully');
        }
    }

    /**
     * get all deleted companies
     *
     * @return response()
     */
    public function retrive() {
        $companies = Companies::onlyTrashed()->get();
        return view('company.trash', ['companies' => $companies]);
    }

    /**
     * restore all post
     *
     * @return response()
     */
    public function restore($id)
    {
        Companies::withTrashed()->find($id)->restore();
        return redirect()->back()->with('companyrestore', 'Company has been restored succesfully');
    }

    /**
     * restore all post
     *
     * @return response()
     */
    public function restoreAll()
    {
        Companies::onlyTrashed()->restore();
        return redirect()->route('company.index')->with('companyrestoreall', 'All the deleted companies have been restored succesfully');
    }
}
