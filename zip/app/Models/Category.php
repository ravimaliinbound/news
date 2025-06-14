<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // In Category.php
public function vendors()
{
    return $this->hasMany(Vendor::class, 'category_id', 'id'); // Adjust foreign key and local key as needed
}

}
