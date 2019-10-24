<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmbulanceModel extends Model
{
    protected $table="ambulance";
    protected $primaryKey="ambulance_id";
    protected $fillable=['vehicle_number','vehicle_mode','year_made','driver_name','driver_contact','driver_license','vehicle_type','ambulance_id'];

    public function validate($id=0)
    {
        return [
            'vehicle_number'=>'required|unique:ambulance,vehicle_number,'.$id.',ambulance_id',
            'driver_name'=>'required',
            'driver_contact'=>'required',
            'driver_license'=>'required',
            'vehicle_type'=>'required'
        ];
    }
}
