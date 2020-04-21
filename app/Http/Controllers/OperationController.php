<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OperationModel;
use Validator;
use Arr;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $operation=OperationModel::where(function($operation) use ($request){
            if($request->q)
            {
               $operation->where('operation_name',$request->q)
                            ->orWhere('operation_type','LIKE','%'.$request->q.'%');
            }
        })->paginate($request->row);

        return $operation;
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
        $operation=new OperationModel;
        $validator=Validator::make($request->all(),$operation->validate());
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
            $requested_data=Arr::add($requested_data,'operation_id',time());
            $operation->fill($requested_data)->save();
            $response=[
                'status'=>201,
                'data'=>$operation
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
        $operation = OperationModel::findOrFail($id);
        if ($operation->status == 1)
        {
          $operation->update(['status'=>2]);
          $response=['status'=>202];
        }
        else
        {
          $operation->update(['status'=>1]);
          $response=['status'=>200];
        }
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
        $operation=OperationModel::findOrFail($id);
        $validator=Validator::make($request->all(),$operation->validate($id));
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
            $operation->fill($requested_data)->save();
            $response=[
                'status'=>201,
                'data'=>$operation
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
        $deleted=OperationModel::findOrFail($id)->delete();
        return $deleted ? response()->json(['status'=>200]) : response()->json(['status'=>400]) ;
    }
}
