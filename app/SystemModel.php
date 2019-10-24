<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemModel extends Model
{
    protected $table ='system';
    protected $primaryKey ='system_id';
    protected $fillable = [
        'system_name','system_title', 'address','phone', 'paypal_email', 'purchase_code','currency', 'system_email', 'system_language',
        'logo','system_id'];


    public function validate($id=0)
    {
      return [
        'system_name'=>'required|max:50',
        'system_title'=>'required|max:50',
        'address'=>'required',
        'phone'=>'required|digits_between:11,14',
        'paypal_email'=>'required||unique:system,paypal_email,'.$id.',system_id',
        'purchase_code'=>'required',
        'currency'=>'required',
        'system_email'=>'required||unique:system,system_email,'.$id.',system_id',
        'system_language'=>'required',
      ];
    }
}
