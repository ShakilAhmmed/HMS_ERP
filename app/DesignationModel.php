<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesignationModel extends Model
{
    protected $table="designation";
    protected $primaryKey="designation_id";
    protected $fillable=['designation_name','description','status','designation_id'];

    public function validate($id=0)
    {
        return [
            'designation_name'=>'required|max:50|regex:/^[a-zA-Z]+$/u|unique:designation,designation_name,'.$id.',designation_id',
            'status'=>'required'
        ];
    }
}
