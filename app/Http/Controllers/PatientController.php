<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Image;
use Hash;
use Arr;
use Helper;
class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $patient_data=User::where(function($patient_data) use ($request){
            if($request->q)
            {
               $patient_data->where('users_name','LIKE','%'.$request->q.'%')
                            ->orWhere('email','LIKE','%'.$request->q.'%')
                            ->orWhere('phone','LIKE','%'.$request->q.'%');
            }
        })->whereType('9')->paginate($request->row);
        return $patient_data;
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
                    $patient_model->fill($requested_data)->save();
                    $response=[
                          'status'=>201,
                          'data'=>$patient_model
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
            else {
                $response=[
                   'errors'=>['project_logo_ext'=>"Please Provide An Image"],
                   'status'=>400
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
        $patient_data=User::findOrFail($id);
        if($patient_data->status==1):
            $patient_data->update(['status'=>2]);
            $response=['status'=>202];
        else:
            $patient_data->update(['status'=>1]);
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
        $deleted=User::where('users_id',$id)->delete();
        return $deleted ? response()->json(['status'=>200]) : response()->json(['status'=>400]) ;
    }
}
