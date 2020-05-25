<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $table = 'galleries';
    protected $fillable = [
        'title','plot','keyword','description','image','menu_title','content','type','language','order','show'
    ];

    public function galleryImages(){
        $this->hasMany('gallery_images','gallery_id','id');
    }
}
