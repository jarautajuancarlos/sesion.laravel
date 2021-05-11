<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // RELACION UNO A MUCHOS INVERSA
    public function user(){
      return $this->belongsTo(User::class);
    }
    public function category(){
      return $this->belongsTo(Category::class);
    }
    // RELACION MUCHOS A MUCHOS
    public function taqs(){
      return $this->belongsToMany(Taq::class);
    }

    // RELACION 1 A 1 POLIMORFICA
    public function image(){
      return $this->morphOne(Image::class, 'Imageable');
    }
}
