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

        //usando la forma when 
        return $query->when(
            $filters['search'] ?? false, //corregido
            //isset($filters['search']), //esto no va!!
            fn ($query, $search) =>
            $query->where('title', 'like', "%$search%")
                    ->orWhere('resumen', 'like', "%$search%"));

        // return $query->when(
        //     $filters['category'] ?? false, //corregido
        //     fn ($query, $category) =>
        //         $query
        //             ->whereExists(function($query) {
        //             $query
        //                 ->from('categories')
        //                 ->whereColumn('categories.id', 'posts.category_id')
        //         })      ->where('categories.slug', $category)
        // );

        return $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) =>
            $query ->WhereHas('category', fn($query) =>
            $query ->Where('slug', $category))
        );

        return $query;

    //    if (request('search')) {
    //     if (isset($filters['search'])) {       
    //         //agregar las condiciones de busqueda
    //         return $query->where('title', 'like', '%' . $filters['search'] . '%')
    //                 ->orWhere('resumen', 'like', '%' . $filters['search'] . '%');
    //     }
    //     }

        
    }

    //hasOne , hasMany , belongsTo , belongsToMany



    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class ,  'user_id' , 'id') ;
    }

}
