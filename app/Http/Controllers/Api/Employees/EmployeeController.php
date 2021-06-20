<?php

namespace App\Http\Controllers\Api\Employees;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  EmployeeResource::collection(Employee::orderBy('id','desc')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $employee = Employee::create($request->all());
        return  response()->json(['data' => new EmployeeResource($employee) ,'status' => '200', 'msg' => 'Employee Created Successfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        if(!$employee){
            return $this->notFound();
        }
        return  response()->json(['data' => new EmployeeResource($employee) ,'status' => '200', 'msg' => 'Employee data'],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {

        $employee = Employee::find($id);
        if(!$employee){
            return $this->notFound();
        }

        $employee->update($request->all());
        return  response()->json(['data' => new EmployeeResource($employee) ,'status' => '200', 'msg' => 'Employee updated successfully'],200);
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
        $employee = Employee::find($id);
        if(!$employee){
            return $this->notFound();
        }

        if($employee->delete()){
            return  response()->json(['data',[],'status' => '200', 'msg' => 'Employee deleted successfully'],200);
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
            'msg' => "The employee is not found  ",

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
