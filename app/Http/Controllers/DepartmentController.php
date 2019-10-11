<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DepartmentModel;
use Illuminate\Support\Arr;
use Validator;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $departments=DepartmentModel::where(function($departments) use ($request){
            if($request->q)
            {
               $departments->where('department_name',$request->q)
                            ->orWhere('description','LIKE','%'.$request->q.'%');
            }
        })->paginate($request->row);
        return $departments;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $departments=new DepartmentModel;
        $validator=Validator::make($request->all(),$departments->validate());
        if($validator->fails())
        {
            $response=[
                'status'=>400,
                'errors'=>$validator->errors()
            ];
        }
        else
        {
            $requested_data=$request->all();
            $requested_data=Arr::add($requested_data,'departments_id',time());
            $departments->fill($requested_data)->save();
            $response=[
                'status'=>201,
                'data'=>$departments
            ];
        }
        return response()->json($response);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departments=DepartmentModel::findOrFail($id);
        if($departments->status==1):
            $departments->update(['status'=>2]);
            $response=['status'=>202];
        else:
            $departments->update(['status'=>1]);
            $response=['status'=>200];
        endif;
        return response()->json($response);
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
        $departments=DepartmentModel::findOrFail($id);
        $validator=Validator::make($request->all(),$departments->validate($id));
        if($validator->fails())
        {
            $response=[
                'status'=>400,
                'errors'=>$validator->errors()
            ];
        }
        else
        {
            $departments->fill($request->all())->save();
            $response=[
                'status'=>201,
                'data'=>$departments
            ];
        }
        return response()->json($response);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted=DepartmentModel::findOrFail($id)->delete();
        return $deleted ? response()->json(['status'=>200]) : response()->json(['status'=>400]) ;
    }
}
