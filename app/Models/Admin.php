<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Admin extends Model
{
    use SoftDeletes;

    protected $table = 'admins';
    protected $fillable = [
        'email','password','name_surname','phone','avatar','sudo',
        'applications','users','modules','clients','is_owner','lang'
    ];

}
