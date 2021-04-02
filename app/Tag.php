<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'category_id', 'slug',
    ];
    protected $dates = ['deleted_at'];
    protected $hidden= ['created_at', 'updated_at'];

    // establecer la relacion a la tabla subcategoria
    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function category(){
        // belognsTo es la relacion inversa hacia el modelo categoria
        return $this->belongsTo(Category::class);
    }
}
