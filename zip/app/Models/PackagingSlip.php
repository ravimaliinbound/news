<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagingSlip extends Model
{
    use HasFactory;

    protected $table = 'packaging_receipts';

    // Define fillable fields for mass assignment
    protected $fillable = [
        'receipt_number',
        'jober_name',
        'quality',
        'size',
        'waist',
        'length',
        'girth',
        'petticoat',
        'interlock',
        'quantity',
        'rate',
        'total_amount',
        'is_active',
        'total_quantity'
    ];


    public function items()
    {
        return $this->hasMany(Item::class, 'packaging_slip_id');
    }

    public function color()
    {
        return $this->hasMany(ColorAssorting::class, 'packaging_slip_id');
    }

    public function assorting()
    {
        return $this->hasMany(Assorting::class, 'packaging_slip_id');
    }

    public function gatePasses()
    {
        return $this->hasMany(GatePass::class, 'packaging_id');
    }

    public function inwarded()
    {
        return $this->hasMany(InwardItem::class, 'packaging_id');
    }
}
