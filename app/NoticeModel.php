<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoticeModel extends Model
{
    protected $table="notice";
    protected $primaryKey="notice_id";
    protected $fillable=['title','description','start_date','end_date','status','notice_id'];

    public function validate()
    {
        return [
            'title'=>'max:50|required',
            'status'=>'required'
        ];
    }
}
