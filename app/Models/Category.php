<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // ASIGNACION MASIVA
    protected $fillable = ['name', 'slug'];

    // RELACION DE UNO A MUCHOS

    public function posts(){
      return $this->hasMany(Post::class);
    }


    

}
