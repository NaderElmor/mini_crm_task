<?php

namespace App\Http\Controllers\Admin\Companies;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $companies = Company::when($request->search, function ($query) use ($request) {

            return $query->where('name','like','%'. $request->search .'%')
                         ->orWhere('email','like','%'. $request->search .'%')
                         ->orWhere('website','like','%'. $request->search .'%');
        })->latest()->paginate(10);

        return view('admin.companies.index', compact('companies'));
    }


    public function create()
    {
        return view('admin.companies.create');
    }


    public function store(CompanyRequest $request)
    {
        $request_data = $request->all();

        //validate the image
        if ($request->logo) {

             $request_data['logo'] = time().'-'. $request->file('logo')->getClientOriginalName();
             $request->file('logo')->storeAs('companies',  $request_data['logo']);

        }//end of if

        Company::create($request_data);
        session()->flash('success', 'Data Added Successfully');
        return redirect()->route('admin.companies.index');

    }//end of store




    public function edit(Company $company)
    {
        return view('admin.companies.edit', compact('company'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $request_data = $request->all();

        if ($request->logo) {

            if ($company->logo != 'default_logo.png') {

                Storage::disk('public')->delete('/companies/' . $company->logo);
            }//end of if

            $request_data['logo'] = time().'-'. $request->file('logo')->getClientOriginalName();
            $request->file('logo')->storeAs('companies',  $request_data['logo']);

        }//end of if

        $company->update($request_data);
        session()->flash('success','Data Updated Successfully');
        return redirect()->route('admin.companies.index');
    }



    public function destroy(Company $company)
    {
        if ($company->logo != 'default_logo.png') {

            Storage::disk('public')->delete('/companies/' . $company->logo);
        }//end of if

        $company->delete();
        session()->flash('success', 'Data Deleted Successfully');
        return redirect()->route('admin.companies.index');

    }
}
