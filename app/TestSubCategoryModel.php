<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestSubCategoryModel extends Model
{
    protected $table = "test_sub_category";
    protected $primaryKey = "test_sub_category_id";
    protected $fillable=['test_sub_category_name','test_category_name','description','status','test_sub_category_id'];

    public function validate($id=0)
    {
        return [
            'test_sub_category_name'=>'required|max:50|regex:/^[a-zA-Z]+$/u|unique:test_sub_category,test_sub_category_name,'.$id.',test_sub_category_id',
            'test_category_name'=>'required',
            'status'=>'required'
        ];
    }
}
