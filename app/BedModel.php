<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BedModel extends Model
{
    protected $table="bed";
    protected $primaryKey="bed_id";
    protected $fillable=['bed_number','description','status','bed_id'];

    public function validate($id=0)
    {
        return [
            'bed_number'=>'required|unique:bed,bed_number,'.$id.',bed_id',
            'status'=>'required'
        ];
    }
}
