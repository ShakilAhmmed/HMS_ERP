<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table ='users';
    protected $primaryKey ='users_id';
    protected $fillable = [
        'users_name', 'guardian_name','address', 'phone', 'sex','birth_date', 'age', 'blood_group',
        'department_id', 'designation_id', 'shift_id','working_hours', 'status', 'image',
        'email', 'password',
    ];


    public function validate()
    {
      return [
        'users_name'=>'required|max:50',
        'address'=>'required',
        'phone'=>'required|digits_between:11,14',
        'sex'=>'required|max:20',
        'department_id'=>'required',
        'designation_id'=>'required',
        'shift_id'=>'required',
        'status'=>'required',
        'email'=>'required|unique:users,email',
        'password'=>'required|confirmed',
      ];
    }
}
