<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $table = 'news';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'description',
        'content',
        'authorId'
    ];
    
    public function categoryNews(){
        return $this->hasMany('App\CategoryNews','newsId');
    }
    
    public function author(){
        return $this->belongsTo('App\Author','authorId');
    }
    
    public function images(){
        return $this->hasMany('App\NewsImage','newsId');
    }
}
