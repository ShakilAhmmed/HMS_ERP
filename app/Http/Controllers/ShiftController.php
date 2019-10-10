<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShiftModel;
use Illuminate\Support\Arr;
use Validator;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $shift=ShiftModel::paginate(10);
      return $shift;
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
          $shift=new ShiftModel;
          $validator=Validator::make($request->all(),$shift->validate());
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
              $requested_data=Arr::add($requested_data,'shift_id',time());
              $shift->fill($requested_data)->save();
              $response=[
                  'status'=>201,
                  'data'=>$shift
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
        $shift = ShiftModel::findOrFail($id);
        if ($shift->status == 1)
        {
          $shift->update(['status'=>2]);
          $response=['status'=>202];
        }
        else
        {
          $shift->update(['status'=>1]);
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
        $shift=ShiftModel::findOrFail($id);
        $validator=Validator::make($request->all(),$shift->validate($id));
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
            $requested_data=Arr::add($requested_data,'shift_id',time());
            $shift->fill($requested_data)->save();
            $response=[
                'status'=>201,
                'data'=>$shift
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
      $deleted=ShiftModel::findOrFail($id)->delete();
      $deleted ? $response=response()->json(['status'=>200]) : $response=response()->json(['status'=>400]) ;
      return $response;
    }
}
