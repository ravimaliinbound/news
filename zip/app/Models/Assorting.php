<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assorting extends Model
{
    use HasFactory;

    protected $table = 'assorting';

    protected $fillable = [    
        'packaging_slip_id',
        'name',
        'post',
        'transport',
        'screen',
        'bales',
        'rate',
        'total_amount',
    ];
    public function packagingSlip()
    {
        return $this->belongsTo(PackagingSlip::class, 'packaging_slip_id');
    }
}
