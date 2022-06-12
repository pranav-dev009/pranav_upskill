<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;
use App\Http\Requests\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companies = Companies::all();
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
        $company = Companies::find($id);
        return $company->name;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Companies  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $company = Companies::find($id);
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
        $company = Companies::find($id);
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
    public function destroy($id)
    {
        //
        $delete = Companies::find($id);
        $delete->delete();
        return redirect()->back()->with('delete', 'Company has been removed successfully');
    }
}
