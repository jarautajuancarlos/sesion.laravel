<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taq extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'color'];

    // PASAMOS SLUG CATEGORIA A URL NAVEGADOR
    public function getRouteKeyName(){
      return "slug";
    }

    // RELACION MUCHOS A MUCHOS
    public function posts(){
      return $this->belongsToMany(Post::class);
    }
}
