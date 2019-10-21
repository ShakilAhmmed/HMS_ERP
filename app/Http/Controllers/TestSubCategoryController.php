<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestSubCategoryModel;
use App\TestCategoryModel;
use Validator;
use Arr;

class TestSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['test_sub_category']=TestSubCategoryModel::join('test_category','test_sub_category.test_category_name','=','test_category.test_category_id')
                                                        ->select('test_category.test_category_name AS test_category_name',
                                                        'test_sub_category.status AS status',
                                                        'test_sub_category.*','test_category.*')
                                                        ->paginate(10);
        $data['test_category']=TestCategoryModel::where('status',1)->get();
        return $data;
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
        $test_sub_category=new TestSubCategoryModel;
        $validator=Validator::make($request->all(),$test_sub_category->validate());
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
            $test_sub_category->fill($requested_data)->save();
            $response=[
                'status'=>201,
                'data'=>$test_sub_category
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
        //
    }
}
