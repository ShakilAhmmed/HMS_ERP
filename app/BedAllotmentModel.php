<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BedAllotmentModel extends Model
{
    protected $table="bedallotment";
    protected $primaryKey="bedallotment_id";
    protected $fillable=['patient_id','bed_id','allotment_time','discharge_time','bedallotment_id'];

    public function validate()
    {
        return [
            'patient_id'=>'required',
            'bed_id'=>'required',
            'allotment_time'=>'required',
            'discharge_time'=>'required'
        ];
    }
}
