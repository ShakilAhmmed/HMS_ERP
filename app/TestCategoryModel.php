<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestCategoryModel extends Model
{
  protected $table = "test_category";
  protected $primaryKey = "test_category_id";
  protected $fillable=['test_category_name','description','status','test_category_id'];

  public function validate($id=0)
  {
      return [
          'test_category_name'=>'required|max:50|regex:/^[a-zA-Z]+$/u|unique:test_category,test_category_name,'.$id.',test_category_id',
          'status'=>'required'
      ];
  }
}
