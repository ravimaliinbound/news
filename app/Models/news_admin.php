<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class news_admin extends Model
{
   public function posts()
    {
        return $this->hasMany(news_post::class, 'id');
    }
}
