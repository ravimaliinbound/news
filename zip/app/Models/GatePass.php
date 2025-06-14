<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GatePass extends Model
{
    use HasFactory;

    protected $table = 'gate_pass';

    protected $fillable = [   
        'packaging_id',
        'delivery_location',
        'car_number',
        'than',
        'meter',
        'driver_name',
        'bundle',
        'created_at',
        'updated_at',
    ];

    public function packagingSlip()
    {
        return $this->belongsTo(PackagingSlip::class, 'packaging_id');
    }

    public function items()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
