<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestSubCategoryModel;
use App\TestCategoryModel;
use App\TestTypeModel;
use App\TestModel;
use Validator;
use Arr;

class TestSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $test_sub_category=TestSubCategoryModel::where(function($test_sub_category) use ($request){
            if($request->q)
            {
               $test_sub_category->where('test_sub_category.test_sub_category_name','LIKE','%'.$request->q.'%')
                            ->orWhere('test_sub_category.description','LIKE','%'.$request->q.'%')
                            ->orWhere('test_category.test_category_name','LIKE','%'.$request->q.'%');
            }
        });

        $data['test_sub_category']=$test_sub_category->join('test_category','test_sub_category.test_category_id','=','test_category.test_category_id')
                                      ->select('test_category.test_category_name AS test_category_name',
                                      'test_sub_category.status AS sub_category_status',
                                      'test_sub_category.*','test_category.*')
                                      ->paginate($request->row);

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
      $test_sub_category = TestSubCategoryModel::findOrFail($id);
      if ($test_sub_category->status == 1)
      {
        $test_sub_category->update(['status'=>2]);
        $response=['status'=>202];
      }
      else
      {
        $test_sub_category->update(['status'=>1]);
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
        $test_sub_category=TestSubCategoryModel::findOrFail($id);
        $validator=Validator::make($request->all(),$test_sub_category->validate($id));
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
            $test_sub_category->fill($requested_data)->save();
            $response=[
                'status'=>201,
                'data'=>$test_sub_category
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
      $test_type = TestTypeModel::where('test_sub_category_id',$id)->get();
      $test_type_id=collect($test_type)->pluck('test_type_id')->toArray();
      $delete_test=TestModel::whereIn('test_type_id',$test_type_id)->delete();
      TestTypeModel::where('test_sub_category_id',$id)->delete();
      $deleted=TestSubCategoryModel::findOrFail($id)->delete();

      return $deleted ? response()->json(['status'=>200]) : response()->json(['status'=>400]) ;
    }
}
