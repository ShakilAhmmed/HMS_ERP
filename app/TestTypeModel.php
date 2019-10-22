<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestTypeModel extends Model
{
    protected $table = "test_type";
    protected $primaryKey = "test_type_id";
    protected $fillable=['test_type_name','test_sub_category_id','description','status','test_type_id'];

    public function validate($id=0)
    {
        return [
            'test_type_name'=>'required|max:50|regex:/^[a-zA-Z]+$/u|unique:test_type,test_type_name,'.$id.',test_type_id',
            'test_sub_category_id'=>'required',
            'status'=>'required'
        ];
    }
}
