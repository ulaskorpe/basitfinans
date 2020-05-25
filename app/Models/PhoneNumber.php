<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhoneNumber extends Model
{
    use SoftDeletes;

    protected $table = 'phone_numbers';
    protected $fillable = [
        'personnel_id','phone_number'
    ];
}
