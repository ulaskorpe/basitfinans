<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $table = 'clients';
    protected $fillable = [
        'name','title','email','phone','address','website','logo','description'
    ];

    public function executives(){
        return $this->hasMany(ClientExecutive::class,'client_id','id');
    }

}
