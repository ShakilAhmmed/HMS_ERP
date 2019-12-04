<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BedModel;
use Illuminate\Support\Arr;
use Validator;

class BedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bed=BedModel::where(function($notice) use ($request){
            if ($request->q) {
                $notice->where('bed_number',$request->q)
                        ->orWhere('description','LIKE','%'.$request->q.'%');
            }
        })->paginate($request->row);
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
        $bed=new BedModel;
        $valid=Validator::make($request->all(),$bed->validate());
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
            $requestdata=Arr::add($requestdata,'bed_id',time());
            $bed->fill($requestdata)->save();
            $response=[
                'status'=>200,
                'data'=>$bed
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
        $bed=BedModel::findOrFail($id);
        if($bed->status==1):
        {
            $bed->update(['status'=>2]);
            $response=['status'=>202];
        }
        else:
        {
            $bed->update(['status'=>1]);
            $response=['status'=>200];
        }
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
        $bed=BedModel::findOrFail($id);
        $valid=Validator::make($request->all(),$bed->validate($id));
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
            $requestdata=Arr::add($requestdata,'bed_id',time());
            $bed->fill($requestdata)->save();
            $response=[
                'status'=>201,
                'data'=>$bed
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
        $delete=BedModel::findOrFail($id)->delete();
        return $delete ? response()->json(['status'=>200]) : response()->json(['status'=>400]) ;
    }
}
