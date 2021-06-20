<?php

namespace App\Http\Controllers\Api\Companies;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  CompanyResource::collection(Company::orderBy('id','desc')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {

        $company = Company::create($request->all());
        return  response()->json(['data' => new CompanyResource($company) ,'status' => '200', 'msg' => 'Company Created Successfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        if(!$company){
            return $this->notFound();
        }
        return  response()->json(['data' => new CompanyResource($company) ,'status' => '200', 'msg' => 'Company data'],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {

        $company = Company::find($id);
        if(!$company){
           return $this->notFound();
        }

        $company->update($request->all());
        return  response()->json(['data' => new CompanyResource($company) ,'status' => '200', 'msg' => 'Company updated successfully'],200);
;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        if(!$company){
           return $this->notFound();
        }

        if($company->delete()){
            return  response()->json(['data',[],'status' => '200', 'msg' => 'Company deleted successfully'],200);
        } else
        {
            return  $this->error();
        }
    }

    public function  notFound(){
        $data = [
            'data' => [],
            'status' => false,
            'status_code' => 404,
            'msg' => "The company is not found  ",

        ];
        return response()->json($data, 404);
    }

    public function  error(){
        $data = [
            'data' => [],
            'status' => false,
            'status_code' => 500,
            'msg' => "Something went wrong",

        ];
        return response()->json($data, 500);
    }
}
