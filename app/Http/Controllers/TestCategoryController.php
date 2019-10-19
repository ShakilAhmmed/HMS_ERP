<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestCategoryModel;
use Illuminate\Support\Arr;
use Validator;

class TestCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $test_category=TestCategoryModel::paginate(10);
      return $test_category;
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
        $test_category=new TestCategoryModel;
        $validator=Validator::make($request->all(),$test_category->validate());
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
            $requested_data=Arr::add($requested_data,'test_category_id',time());
            $test_category->fill($requested_data)->save();
            $response=[
                'status'=>201,
                'data'=>$test_category
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
        $test_category = TestCategoryModel::findOrFail($id);
        if ($test_category->status == 1)
        {
          $test_category->update(['status'=>2]);
          $response=['status'=>202];
        }
        else
        {
          $test_category->update(['status'=>1]);
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
        $test_category=TestCategoryModel::findOrFail($id);
        $validator=Validator::make($request->all(),$test_category->validate($id));
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
            $requested_data=Arr::add($requested_data,'test_category_id',time());
            $test_category->fill($requested_data)->save();
            $response=[
                'status'=>201,
                'data'=>$test_category
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
        $deleted=TestCategoryModel::findOrFail($id)->delete();
        return $deleted ? response()->json(['status'=>200]) : response()->json(['status'=>400]) ;
    }
}
