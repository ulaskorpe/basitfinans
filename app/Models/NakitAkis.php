<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NakitAkis extends Model
{

    /**
    user_id
    session_id
    year
    month
    type_id
    amount
     */
    protected $table = 'nakit_akisi';
    protected $fillable = [
       'user_id','guest_id','year','month','type_id','amount'
    ];
}
