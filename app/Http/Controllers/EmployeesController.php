<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $arr['employees']=Employees::paginate(3);
        return view('employeemanagementView.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employeemanagementView.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Employees $employeesdata)
    {

        $request->validate([

            'empid'=>'required|unique:employees,employeeid',
            'username' => 'required',
            'userdesignation' => 'required',
            'userage' =>'required|max:8',
            'useraddress'=>'required',
            'useremailid'=>'required|email|unique:employees,emailid'
        ],
        [
            'username.required' => 'Please enter Name',
            
        ]);

         $employeesdata->employeeid = $request->empid;
         $employeesdata->name=$request->username;
         $employeesdata->age= $request->userage;
         $employeesdata->emailid=$request->useremail;
         $employeesdata->designation=$request->userdesignation;
         $employeesdata->address=$request->useraddress;
         $employeesdata->joining_date=$request->joining_date;
          
         if($employeesdata->save()){
        
            return redirect()->route('employee.employeemanagement.index')->with('status', 'An employee has been added to List');

         }else{
             echo "here";
         }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editemployeedata= Employees :: find($id);
        return view('employeemanagementView.edit')->with(['editemployeedata'=>$editemployeedata]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $employeesdata = Employees::find($id);

        $employeesdata->employeeid = $request->empid;
        $employeesdata->name=$request->name;
        $employeesdata->age= $request->age;
        $employeesdata->emailid=$request->email;
        $employeesdata->designation=$request->designation;
        $employeesdata->address=$request->address;
        $employeesdata->joining_date=$request->joining_date;
        
        if ($employeesdata->save()) {

            return redirect()->route('employee.employeemanagement.index');
        } else {
            echo "error";
        }

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employees :: destroy($id);
        return redirect()->route('employee.employeemanagement.index');

    }
}
