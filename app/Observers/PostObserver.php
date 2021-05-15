<?php

namespace App\Observers;

use App\Models\Post;

use Illuminate\Support\Facades\Storage;

class PostObserver
{

    public function created(Post $post)
    {
        //
    }


    public function deleting(Post $post)
    {
        if($post->image){
          Storage::delete($post->image->url);
        }
    }
}
