<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Defective extends Model
{
    use HasFactory;

    protected $table = 'defective';


    protected $fillable = [   
        'packaging_id',
        'item_id',
        'quantity',
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

    public function color()
    {
        return $this->hasMany(ColorAssorting::class, 'packaging_slip_id');
    }
}
