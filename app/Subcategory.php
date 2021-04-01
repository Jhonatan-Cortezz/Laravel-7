<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'category_id', 'slug',
    ];
    protected $dates = ['deleted_at'];
    protected $hidden= ['created_at', 'updated_at'];
    //establece la relacion a la tabla Categoria
    public function category(){
        // belognsTo es la relacion inversa hacia el modelo categoria
        return $this->belongsTo(Category::class);
    }
}
