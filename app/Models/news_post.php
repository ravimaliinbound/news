<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class news_post extends Model
{
     public function admins()
    {
        return $this->belongsTo(news_admin::class, 'admin_id');
    }
}