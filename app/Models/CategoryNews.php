<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryNews extends Model
{
    //
    protected $table = 'category_news';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'categoryId',
        'newsId'
    ];
    
    public function category(){
        return $this->belongsTo('App\Category','categoryId');
    }
    
    public function news(){
        return $this->belongsTo('App\News','newsId');
    }
}
