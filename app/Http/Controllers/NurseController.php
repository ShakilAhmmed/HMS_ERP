<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShiftModel;
use App\User;
use Validator;
use Image;
use Hash;
use Arr;
use Helper;
use File;

class NurseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     {
         $nurse=User::where(function($nurse) use ($request){
             if($request->q)
             {
                $nurse->where('users_name','LIKE','%'.$request->q.'%')
                             ->orWhere('email','LIKE','%'.$request->q.'%')
                             ->orWhere('phone','LIKE','%'.$request->q.'%');
             }
         })->whereType('4')->paginate($request->row);
         return $nurse;
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['shift']=ShiftModel::whereStatus('1')->get();

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nurse=new User;
        $validation=Validator::make($request->all(),$nurse->nurse_validate());
        if($validation->fails())
        {
              $response=[
               'status'=>400,
               'errors'=>$validation->errors()
           ];
        }
        else
        {
             $requested_data=$request->all();

             if($request->image)
             {
                 $position=strpos($request->image,";");
                 $sub_str=substr($request->image, 0,$position);
                 $extenstion=explode("/", $sub_str);
                 $allowed=Helper::ImageExtension($extenstion[1]);
                 if($allowed=="Allowed")
                 {
                     $upload_path="backend_assets/assets/images/users/".time().".".$extenstion[1];
                     $image_upload=Image::make($request->image)->resize(300, 300);
                     $image_upload->save($upload_path);
                     $requested_data=Arr::set($requested_data, 'image',$upload_path);
                     $requested_data=Arr::add($requested_data,'users_id',time());
                     $password = Hash::make($request->password);
                     $requested_data=Arr::set($requested_data,'password',$password);
                     $nurse->fill($requested_data)->save();
                     $response=[
                           'status'=>201,
                           'data'=>$nurse
                       ];
                 }
                 else
                 {
                     $response=[
                        'errors'=>['project_logo_ext'=>$allowed],
                        'status'=>400
                    ];
                 }
             }
             $requested_data=Arr::set($requested_data,'status',1);
             $nurse->fill($requested_data)->save();
             $response=[
                   'status'=>201,
                   'data'=>$nurse
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
        $nurse = User::findOrFail($id);
        if ($nurse->status == 1)
        {
          $nurse->update(['status'=>2]);
          $response=['status'=>202];
        }
        else
        {
          $nurse->update(['status'=>1]);
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
        $data['shift']=ShiftModel::whereStatus('1')->get();
        $data['user']=User::findOrFail($id);

        return response()->json($data);
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
        $nurse=User::findOrFail($id);
        $validation=Validator::make($request->all(),$nurse->nurse_validate($id));
        if($validation->fails())
        {
              $response=[
               'status'=>400,
               'errors'=>$validation->errors()
           ];
        }
        else
        {
             $requested_data=$request->all();

             if($request->image != $nurse->image)
             {
                 $position=strpos($request->image,";");
                 $sub_str=substr($request->image, 0,$position);
                 $extenstion=explode("/", $sub_str);
                 $allowed=Helper::ImageExtension($extenstion[1]);
                 if($allowed=="Allowed")
                 {
                     if(File::exists($nurse->image))
                     {
                       File::delete( $nurse->image );
                     }
                     $upload_path="backend_assets/assets/images/users/".time().".".$extenstion[1];
                     $image_upload=Image::make($request->image)->resize(300, 300);
                     $image_upload->save($upload_path);
                     $requested_data=Arr::set($requested_data, 'image',$upload_path);
                     $requested_data=Arr::add($requested_data,'users_id',time());
                     $password = Hash::make($request->password);
                     $requested_data=Arr::set($requested_data,'password',$password);
                     $nurse->fill($requested_data)->save();
                     $response=[
                           'status'=>201,
                           'data'=>$nurse
                       ];
                 }
                 else
                 {
                     $response=[
                        'errors'=>['project_logo_ext'=>$allowed],
                        'status'=>400
                    ];
                 }
             }
             $requested_data=Arr::set($requested_data,'status',1);
             $nurse->fill($requested_data)->save();
             $response=[
                   'status'=>201,
                   'data'=>$nurse
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
        //
    }
}
