<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    protected $table = 'sample';

    use HasFactory;

    protected $fillable = [
        'receipt_number',
        'quality',
        'name',
        'quantity',


    ];
}
