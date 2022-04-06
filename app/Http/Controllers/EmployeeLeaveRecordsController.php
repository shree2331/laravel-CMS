<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employeeleaverecords;

class EmployeeLeaveRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      
         $arr['employeeleaverecords'] = Employeeleaverecords::join('employees', 'employees.employeeid', '=', 'employeeleaverecords.employeeid')
              ->get(['employeeleaverecords.*', 'employees.name']);

         return view('employeeLeaveRecord.index')->with($arr);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employeeLeaveRecord.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Employeeleaverecords $employeeleaverecords)
    {

        $request->validate([

            'empid'=>'required',
            'no_of_leaves' => 'required',
           
        ]);

         $employeeleaverecords->employeeid = $request->empid;
         $employeeleaverecords->no_of_leaves=$request->no_of_leaves;
         $employeeleaverecords->reason_of_leave= $request->reason_of_leave;

         $fromDate = trim(explode('-', $request->date_range)[0]);
         $toDate = trim(explode('-', $request->date_range)[1]);
         $filename=time()."_".$employeeleaverecords->employeeid.".".$request->file('file_name')->getClientOriginalExtension();
       
         $employeeleaverecords->file_name=$filename;
         $employeeleaverecords->from_date=$fromDate;
         $employeeleaverecords->to_date=$toDate;

         if($employeeleaverecords->save()){

            $request->file('file_name')->storeAs('public/uploads',$filename);
            return redirect()->route('leaverecords.employeeleaverecords.index')->with('status','Leave Applied');

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        Employeeleaverecords::where('record_id', $id)->delete();
        return redirect()->route('leaverecords.employeeleaverecords.index')->with('status','Record Deleted');;
    }
}
