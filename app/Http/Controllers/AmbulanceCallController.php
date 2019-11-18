<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;
use App\AmbulanceModel;
use App\AmbulanceCallModel;
use Illuminate\Support\Arr;
use Validator;

class AmbulanceCallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function get_ambulance_data(Request $request)
    {
        $getambulancedata['user']=UserModel::all();
        $getambulancedata['ambulance']=AmbulanceModel::all();

        return response()->json($getambulancedata);
    }

    public function index(Request $request)
    {
        $ambulncecall=AmbulanceCallModel::join('users','ambulance_call.patient_id','users.users_id')
                                          ->join('ambulance','ambulance_call.ambulance_id','ambulance.ambulance_id')
                                          ->select('users.users_name','ambulance.vehicle_number','ambulance_call.*')
                                          ->where(function($patient_data) use ($request){
            if($request->q)
            {
               $patient_data->where('users_name','LIKE','%'.$request->q.'%')
                            ->orWhere('vehicle_number','LIKE','%'.$request->q.'%')
                            ->orWhere('ambulance_call','LIKE','%'.$request->q.'%');
            }
        })->paginate($request->row);
        return $ambulncecall;
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
        $ambulancecall=new AmbulanceCallModel;

        $valid=Validator::make($request->all(),$ambulancecall->validate());
        if($valid->fails())
        {
            $response=[
                'status'=>400,
                'errors'=>$valid->errors()
            ];
        }
        else
        {
            $requestdata=$request->all();
            $requestdata=Arr::add($requestdata,'ambulancecall_id',time());
            $ambulancecall->fill($requestdata)->save();
            $response=[
                'status'=>200,
                'data'=>$ambulancecall
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
        $ambulancecall=AmbulanceCallModel::findOrfail($id);
        $valid=Validator::make($request->all(),$ambulancecall->validate());
        if($valid->fails())
        {
            $response=[
                'status'=>400,
                'errors'=>$valid->errors()
            ];
        }
        else
        {
            $requestdata=$request->all();
            $requestdata=Arr::add($requestdata,'ambulancecall_id',time());
            $ambulancecall->fill($requestdata)->save();
            $response=[
                'status'=>201,
                'data'=>$ambulancecall
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
        $delete=AmbulanceCallModel::findOrfail($id)->delete();
        return $delete ? response()->json(['status'=>200]) : response()->json(['status'=>400]) ;
    }
}
