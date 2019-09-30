<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentModel extends Model
{
    protected $table="departments";
    protected $primaryKey="departments_id";
    protected $fillable=['department_name','description','status','departments_id'];

    public function validate($id=0)
    {
        return [
            'department_name'=>'required|max:50|regex:/^[a-zA-Z]+$/u|unique:departments,departments_id,'.$id.',departments_id',
            'status'=>'required'
        ];
    }

}
