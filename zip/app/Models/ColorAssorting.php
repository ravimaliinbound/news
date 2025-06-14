<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorAssorting extends Model
{
    use HasFactory;

    protected $table = 'color_assortings';

    protected $fillable = [    
        'packaging_slip_id',
        'color',
        'quantity',
    ];


    public function packagingSlip()
    {
        return $this->belongsTo(PackagingSlip::class, 'packaging_slip_id');
    }
}
