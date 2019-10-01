<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DesignationModel;
use Illuminate\Support\Arr;
use Validator;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designation=DesignationModel::paginate(10);
        return $designation;
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
        $designation=new DesignationModel;
        $validata=Validator::make($request->all(),$designation->validate());
        if($validata->fails())
        {
            $response=[
                'status'=>400,
                'errors'=>$validata->errors()
            ];
        }
        else
        {
            $requestdata=$request->all();
            $requestdata=Arr::add($requestdata,'designation_id',time());
            $designation->fill($requestdata)->save();
            $response=[
                'status'=>200,
                'data'=>$designation
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
        $designation=DesignationModel::findOrFail($id);
        if($designation->status==1):
            $designation->update(['status'=>2]);
            $response=['status'=>202];
        else:
            $designation->update(['status'=>1]);
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
        $designation=DesignationModel::findOrFail($id);
        $validata=Validator::make($request->all(),$designation->validate($id));
        if($validata->fails())
        {
            $response=[
                'status'=>400,
                'errors'=>$validata->errors()
            ];
        }
        else
        {
            $designation->fill($request->all())->save();
            $response=[
                'status'=>201,
                'data'=>$designation
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
        $deleted=DesignationModel::findOrFail($id)->delete();
        return $deleted ? response()->json(['status'=>200]) : response()->json(['status'=>400]) ;
    }
}
