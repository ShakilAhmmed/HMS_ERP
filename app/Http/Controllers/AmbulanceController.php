<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AmbulanceModel;
use Illuminate\Support\Arr;
use Validator;

class AmbulanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ambulance=AmbulanceModel::paginate(10);
        return $ambulance;
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
        $ambulance=new AmbulanceModel;
        $validate=Validator::make($request->all(),$ambulance->validate());
        if($validate->fails())
        {
            $response=[
                'status'=>400,
                'errors'=>$validate->errors()
            ];
        }
        else
        {
            $requestdata=$request->all();
            $requestdata=Arr::add($requestdata,'ambulance_id',time());
            $ambulance->fill($requestdata)->save();
            $response=[
                'status'=>200,
                'data'=>$ambulance
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
        $ambulance=AmbulanceModel::findOrFail($id);
        $validate=Validator::make($request->all(),$ambulance->validate($id));
        if($validate->fails())
        {
            $response=[
                'status'=>400,
                'errors'=>$validate->errors()
            ];
        }
        else
        {
            $requestdata=$request->all();
            $requestdata=Arr::add($requestdata,'ambulance_id',time());
            $ambulance->fill($requestdata)->save();
            $response=[
                'status'=>201,
                'data'=>$ambulance
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
        $delete=AmbulanceModel::findOrFail($id)->delete();
        return $delete ? response()->json(['status'=>200]) : response()->json(['status'=>400]) ;
    }
}
