<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestTypeModel;
use App\TestSubCategoryModel;
use Validator;
use Arr;

class TestTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data['test_type']=TestTypeModel::join('test_sub_category','test_type.test_sub_category_id','=','test_sub_category.test_sub_category_id')
                                    ->select('test_type.status AS test_type_status',
                                    'test_type.*','test_sub_category.*')
                                    ->paginate(10);
      $data['test_sub_category']=TestSubCategoryModel::where('status',1)->get();
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
        $test_type=new TestTypeModel;
        $validator=Validator::make($request->all(),$test_type->validate());
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
            $requested_data=Arr::add($requested_data,'test_type_id',time());
            $test_type->fill($requested_data)->save();
            $response=[
                'status'=>201,
                'data'=>$test_type
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
        $test_type = TestTypeModel::findOrFail($id);
        if ($test_type->status == 1)
        {
          $test_type->update(['status'=>2]);
          $response=['status'=>202];
        }
        else
        {
          $test_type->update(['status'=>1]);
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
        $test_type=TestTypeModel::findOrFail($id);
        $validator=Validator::make($request->all(),$test_type->validate($id));
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
            $test_type->fill($requested_data)->save();
            $response=[
                'status'=>201,
                'data'=>$test_type
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
      $deleted=TestTypeModel::findOrFail($id)->delete();
      return $deleted ? response()->json(['status'=>200]) : response()->json(['status'=>400]) ;
    }
}
