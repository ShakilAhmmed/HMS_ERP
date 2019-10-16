<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;
use App\BedModel;
use App\BedAllotmentModel;
use Illuminate\Support\Arr;
use Validator;

class BedAllotmentController extends Controller
{
    public function get_data(Request $request)
    {
        $getdata['user']=UserModel::all();
        $getdata['bed']=BedModel::all();

        return response()->json($getdata);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bed=BedAllotmentModel::join('users','bedallotment.patient_id','users.users_id')
                                ->join('bed','bedallotment.bed_id','bed.bed_id')
                                ->select('users.users_name','bed.bed_number','bedallotment.*')
                                ->paginate(10);

        return $bed;
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
        $bedallotment=new BedAllotmentModel;

        $valid=Validator::make($request->all(),$bedallotment->validate());
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
            $requestdata=Arr::add($requestdata,'bedallotment_id',time());
            $bedallotment->fill($requestdata)->save();
            $response=[
                'status'=>200,
                'data'=>$bedallotment
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
        $bedallotment=BedAllotmentModel::findOrfail($id);
        $valid=Validator::make($request->all(),$bedallotment->validate());
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
            $requestdata=Arr::add($requestdata,'bedallotment_id',time());
            $bedallotment->fill($requestdata)->save();
            $response=[
                'status'=>201,
                'data'=>$bedallotment
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
        $delete=BedAllotmentModel::findOrfail($id)->delete();
        return $delete ? response()->json(['status'=>200]) : response()->json(['status'=>400]) ;
    }
}
