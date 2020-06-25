<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NakitTypes extends Model
{

    /*
     * user_id
    session_id
    Type [ bool ]
    parent_type_id
     * type_name
    order
     * */
    protected $table = 'nakit_types';
    protected $fillable = [
        'user_id','guest_id','type','parent_type_id','type_name','order'
    ];

    public function subTypes(){
        return $this->hasMany(NakitTypes::class,'parent_type_id','id');
    }
}
