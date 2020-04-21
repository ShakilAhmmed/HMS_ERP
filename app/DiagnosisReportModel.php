<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiagnosisReportModel extends Model
{
    protected $table = "test";
    protected $primaryKey = "test_id";
    protected $fillable=['diagnosis_report_id','patient_id','doctor_id','prescription_id','test_id','delivery_date','description','file','ready_or_not'];

    public function validate($id=0)
    {
        return [
            'patient_id'=>'required',
            'doctor_id'=>'required'
            'prescription_id'=>'required'
            'test_id'=>'required'
            'delivery_date'=>'required'
            'description'=>'required'
            'file'=>'required'
            'ready_or_not'=>'required'
        ];
    }
}
