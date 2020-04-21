<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    protected $table = "test";
    protected $primaryKey = "test_id";
    protected $fillable=['test_name','test_type_id','description','amount','status','test_id'];

    public function validate($id=0)
    {
        return [
            'test_name'=>'required|max:50|regex:/^[a-zA-Z]+$/u|unique:test,test_name,'.$id.',test_id',
            'test_type_id'=>'required',
            'amount'=>'required||numeric|digits_between:1,9',
            'status'=>'required'
        ];
    }
}
