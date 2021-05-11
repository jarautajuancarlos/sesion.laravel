<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taq extends Model
{
    use HasFactory;

    // RELACION MUCHOS A MUCHOS
    public function posts(){
      return $this->belongsToMany(Post::class);
    }
}
