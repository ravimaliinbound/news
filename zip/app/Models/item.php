<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'item_table';

    // Define fillable fields for mass assignment
    protected $fillable = [   
        'packaging_slip_id',
        'description',
        'than',
        'cut',
        'meter',
        'quantity',
    ];

    public function packagingSlip()
    {
        return $this->belongsTo(PackagingSlip::class, 'packaging_slip_id');
    }
}
