<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsImage extends Model
{
    //
    protected $table = 'news_images';
    protected $primaryKey = 'id';
    protected $fillable = [
        'newsId'
    ];
    
    public function news(){
        return $this->belongsTo('App\News','newsId');
    }
}
