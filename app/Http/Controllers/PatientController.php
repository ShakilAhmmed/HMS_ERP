<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Image;
use Hash;
use Arr;
class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
       $patient_model=new User;
       $validation=Validator::make($request->all(),$patient_model->patient_validate());
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
                $upload_path="backend_assets/assets/images/users/".time().".".$extenstion[1];
                $image_upload=Image::make($request->image)->resize(300, 200);
                $image_upload->save($upload_path);
                $requested_data=Arr::set($requested_data, 'image',$upload_path);
            }
            $requested_data=Arr::add($requested_data,'users_id',time());
            $password = Hash::make($request->password);
            $requested_data=Arr::set($requested_data,'password',$password);
            $patient_model->fill($requested_data)->save();
            $response=[
                  'status'=>201,
                  'data'=>$patient_model
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
        //
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
