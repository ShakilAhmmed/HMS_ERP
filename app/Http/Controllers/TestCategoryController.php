<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestSubCategoryModel;
use App\TestCategoryModel;
use App\TestTypeModel;
use App\TestModel;
use Illuminate\Support\Arr;
use Validator;

class TestCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $test_category=TestCategoryModel::where(function($test_category) use ($request){
          if($request->q)
          {
             $test_category->where('test_category_name',$request->q)
                          ->orWhere('description','LIKE','%'.$request->q.'%');
          }
      })->paginate($request->row);

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
        $test_sub_category = TestSubCategoryModel::where('test_category_id',$id)->get();
        $test_sub_category_id=collect($test_sub_category)->pluck('test_sub_category_id')->toArray();
        $test_type=TestTypeModel::whereIn('test_sub_category_id',$test_sub_category_id)->get();
        $test_type_id=collect($test_type)->pluck('test_type_id')->toArray();

        TestModel::whereIn('test_type_id',$test_type_id)->delete();
        TestTypeModel::whereIn('test_sub_category_id',$test_sub_category_id)->delete();
        TestSubCategoryModel::where('test_category_id',$id)->delete();
        $deleted=TestCategoryModel::findOrFail($id)->delete();

        return $deleted ? response()->json(['status'=>200]) : response()->json(['status'=>400]) ;
    }
}
