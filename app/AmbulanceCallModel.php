<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmbulanceCallModel extends Model
{
    protected $table="ambulance_call";
    protected $primaryKey="ambulancecall_id";
    protected $fillable=['ambulance_id','patient_id','from','to','amount','contact_no','ambulancecall_id'];

    public function validate()
    {
        return [
            'ambulance_id'=>'required',
            'patient_id'=>'required',
            'from'=>'required',
            'to'=>'required',
            'amount'=>'required|numeric',
            'contact_no'=>'required|digits_between:11,14',
        ];
    }
}
