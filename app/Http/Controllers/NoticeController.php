<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NoticeModel;
use Illuminate\Support\Arr;
use Validator;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $notice=NoticeModel::where(function($notice) use ($request){
            if ($request->q) {
                $notice->where('title',$request->q)
                        ->orWhere('description','LIKE','%'.$request->q.'%');
            }
        })->paginate($request->row);
        return $notice;
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
        $notice=new NoticeModel;
        $validate=Validator::make($request->all(),$notice->validate());
        if ($validate->fails()) {
            $response=[
                'status'=>400,
                'errors'=>$validate->errors()
            ];
        }
        else
        {
            $requestdata=$request->all();
            $requestdata=Arr::add($requestdata,'notice_id',time());
            $notice->fill($requestdata)->save();
            $response=[
                'status'=>200,
                'data'=>$notice
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
        $notice=NoticeModel::findOrFail($id);
        if($notice->status==1):
            $notice->update(['status'=>2]);
            $response=['status'=>202];
        else:
            $notice->update(['status'=>1]);
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
        $notice=NoticeModel::findOrFail($id);
        $validate=Validator::make($request->all(),$notice->validate($id));
        if ($validate->fails()) {
            $response=[
                'status'=>400,
                'errors'=>$validate->errors()
            ];
        }
        else
        {
            $requestdata=$request->all();
            $requestdata=Arr::add($requestdata,'notice_id',time());
            $notice->fill($requestdata)->save();
            $response=[
                'status'=>201,
                'data'=>$notice
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
        $delete=NoticeModel::findOrFail($id)->delete();
        return $delete ? response()->json(['status'=>200]) : response()->json(['status'=>400]) ;
    }
}
