<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    // Traits
    use HasFactory;

    //public $fillable = ['title', 'resumen' , 'body'];

    protected $guarded = ['id'];
    public $with = ['category', 'author'];

    public function  getRouteKeyName(){
        return 'slug';
    }

    public function scopeFilter( $query , array $filters ){
        if( isset($filters['search'] ) ){
    
            $query->where('title' , 'like' ,'%' .request('search') . '%')->orWhere( 'resumen' , 'like' ,'%' .request('search') . '%');
        }
    }

    //hasOne , hasMany , belongsTo , belongsToMany

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class ,  'user_id' , 'id') ;
    }

}
