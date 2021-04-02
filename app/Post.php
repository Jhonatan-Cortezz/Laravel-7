<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'category_id', 'name','slug', 'abstract', 'body', 'status',
    ];
    protected $dates = ['deleted_at'];
    protected $hidden= ['created_at', 'updated_at'];
    //establece la relacion a la tabla Categoria
    public function image(){
        // belognsTo es la relacion inversa hacia el modelo categoria
        return $this->morphOne('App\Image', 'imageable');
    }
}
