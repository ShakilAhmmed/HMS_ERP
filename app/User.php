<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table ='users';
    protected $primaryKey ='users_id';
    protected $fillable = [
        'users_name', 'guardian_name','address', 'phone', 'sex','birth_date', 'age', 'blood_group',
        'department_id', 'designation_id', 'shift_id','working_hours', 'status', 'image',
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function validate()
    {
      return [
        'users_name'=>'required|max:50',
        'address'=>'required|255',
        'phone'=>'required|digits_between:11,14',
        'sex'=>'required|max:20',
        'department_id'=>'required',
        'designation_id'=>'required',
        'shift_id'=>'required',
        'status'=>'required',
        'email'=>'required|unique:users,email',
        'password'=>'required|confirmed',
      ]
    }
}
