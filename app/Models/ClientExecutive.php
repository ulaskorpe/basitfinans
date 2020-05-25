<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientExecutive extends Model
{
    use SoftDeletes;

    protected $table = 'client_executives';
    protected $fillable = [
        'email','name','phone','image','client_id','description'
    ];

    public function client(){
        return $this->belongsTo(Client::class,'client_id','id');
    }
}
