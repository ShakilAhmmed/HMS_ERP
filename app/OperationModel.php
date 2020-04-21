<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperationModel extends Model
{
    protected $table = "operation";
    protected $primaryKey = "operation_id";
    protected $fillable=['operation_name','operation_type','amount','description','status','operation_id'];

    public function validate($id=0)
    {
        return [
            'operation_name'=>'required|max:50|regex:/^[a-zA-Z]+$/u|unique:operation,operation_name,'.$id.',operation_id',
            'operation_type'=>'required',
            'amount'=>'required|numeric',
            'status'=>'required'
        ];
    }
}
