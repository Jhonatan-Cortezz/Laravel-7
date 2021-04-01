<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'module', 'slug',
    ];
    protected $dates = ['deleted_at'];
    protected $hidden= ['created_at', 'updated_at'];

    // establecer la relacion a la tabla subcategoria
    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
