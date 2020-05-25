<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryImage extends Model
{
    use SoftDeletes;

    protected $table = 'gallery_images';
    protected $fillable = [
        'title','keyword','description','image','gallery_id','language','order','show'
    ];

    public function gallery(){
        $this->belongsTo('galleries','gallery_id','id');
    }

}
