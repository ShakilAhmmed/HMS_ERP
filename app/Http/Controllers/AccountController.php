<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ShiftModel;
use Validator;
use Image;
use Hash;
use Arr;
use Helper;
use File;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function get_shift_data(Request $request)
    {
        $getdata['shift']=ShiftModel::all();

        return response()->json($getdata);
    }

    public function index()
    {
        $account=User::whereType('6')->paginate(10);
        return $account;
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
        $account=new User;
        $validation=Validator::make($request->all(),$account->accountvalid());
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
                    $account->fill($requested_data)->save();
                    $response=[
                          'status'=>201,
                          'data'=>$account
                      ];
                }
                else
                {
                    $response=[
                       'errors'=>['project_logo_ext'=>$allowed],
                       'status'=>400
                   ];
                }
                $response=[
                          'status'=>200,
                          'data'=>$account
                      ];

            }

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
        $user=User::findOrFail($id);
        if($user->status==1):
            $user->update(['status'=>2]);
            $response=['status'=>202];
        else:
            $user->update(['status'=>1]);
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
        return User::findOrFail($id);
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
        $account=User::where('users_id',$id)->firstOrFail();
        $validation=Validator::make($request->all(),$account->accountvalid($id));
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

            if($request->image && $request->image!=$account->image)
            {
                $position=strpos($request->image,";");
                $sub_str=substr($request->image, 0,$position);
                $extenstion=explode("/", $sub_str);
                $allowed=Helper::ImageExtension($extenstion[1]);
                if($allowed=="Allowed")
                {
                    if(File::exists($account->image)):
                      File::delete($account->image);
                    endif;
                    $upload_path="backend_assets/assets/images/users/".time().".".$extenstion[1];
                    $image_upload=Image::make($request->image)->resize(300, 300);
                    $image_upload->save($upload_path);
                    $requested_data=Arr::set($requested_data, 'image',$upload_path);
                    
                }
                else
                {
                    $response=[
                       'errors'=>['project_logo_ext'=>$allowed],
                       'status'=>400
                   ];
                }
                
            }
            $password = Hash::make($request->password);
            $requested_data=Arr::set($requested_data,'password',$password);
            $account->fill($requested_data)->save();
            $response=[
                 'status'=>201,
                 'data'=>$account
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
        $delete=User::findOrfail($id)->delete();
        return $delete ? response()->json(['status'=>200]) : response()->json(['status'=>400]) ;
    }
}
