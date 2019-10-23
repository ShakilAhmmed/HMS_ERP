<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestTypeModel;
use App\TestModel;
use Validator;
use Arr;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['test']=TestModel::join('test_type','test.test_type_id','=','test_type.test_type_id')
                                      ->select('test.status AS test_status',
                                      'test.*','test_type.*')
                                      ->paginate(10);
        $data['test_type']=TestTypeModel::where('status',1)->get();
        return response()->json($data);
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
        $test=new TestModel;
        $validator=Validator::make($request->all(),$test->validate());
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
            $requested_data=Arr::add($requested_data,'test_id',time());
            $test->fill($requested_data)->save();
            $response=[
                'status'=>201,
                'data'=>$test
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
        $test = TestModel::findOrFail($id);
        if ($test->status == 1)
        {
          $test->update(['status'=>2]);
          $response=['status'=>202];
        }
        else
        {
          $test->update(['status'=>1]);
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
        $test=TestModel::findOrFail($id);
        $validator=Validator::make($request->all(),$test->validate($id));
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
            $test->fill($requested_data)->save();
            $response=[
                'status'=>201,
                'data'=>$test
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
        $deleted=TestModel::findOrFail($id)->delete();
        return $deleted ? response()->json(['status'=>200]) : response()->json(['status'=>400]) ;
    }
}
