<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShiftModel extends Model
{
    protected $table = "shift";
    protected $primaryKey = "shift_id";
    protected $fillable=['shift_name','description','status','shift_id'];

    public function validate($id=0)
    {
        return [
            'shift_name'=>'required|max:50|regex:/^[a-zA-Z]+$/u|unique:shift,shift_name|unique:shift,shift_id,'.$id.',shift_id',
            'status'=>'required'
        ];
    }
}
