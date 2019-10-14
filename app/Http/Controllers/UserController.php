<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;
use App\DepartmentModel;
use App\DesignationModel;
use App\ShiftModel;
use Illuminate\Support\Arr;
use Validator;
use Image;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user=UserModel::paginate(10);
      return $user;
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
      $users=new UserModel;
      $validator=Validator::make($request->all(),$users->validate());
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

          if($request['image'])
          {
            $position=strpos($request['image'],";");
            $sub_str=substr($request['image'], 0,$position);
            $extenstion=explode("/", $sub_str);
            $upload_path="backend_assets/assets/images/users/".time().".".$extenstion[1];
            $image_upload=Image::make($request['image'])->resize(300, 200);
            $image_upload->save($upload_path);
            $requested_data=Arr::set($requested_data, 'image',$upload_path);
          }
          $requested_data=Arr::add($requested_data,'users_id',time());
          $password = Hash::make($request['password']);
          $requested_data=Arr::set($requested_data,'password',$password);
          // print_r($requested_data);
          // exit();
          $users->fill($requested_data)->save();
          $response=[
              'status'=>201,
              'data'=>$users
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
        $user = UserModel::findOrFail($id);
        if ($user->status == 1)
        {
          $user->update(['status'=>2]);
          $response=['status'=>202];
        }
        else
        {
          $user->update(['status'=>1]);
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
      return UserModel::findOrFail($id);

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
      $user=UserModel::findOrFail($id);
      $validator=Validator::make($request->all(),$user->validate($id));
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
        $password = Hash::make($request['password']);
        $requested_data=Arr::set($requested_data,'password',$password);
          $user->fill($requested_data)->save();
          $response=[
              'status'=>201
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
      $deleted=UserModel::findOrFail($id)->delete();
      return $deleted ? response()->json(['status'=>200]) : response()->json(['status'=>400]) ;
    }

    public function GetUserAddData()
    {
      $data['department']=DepartmentModel::all();
      $data['designation']=DesignationModel::all();
      $data['shift']=ShiftModel::all();

      return response()->json($data);
    }
}
