<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InwardItem extends Model
{
    use HasFactory;

    protected $fillable = [   
        'packaging_id',
        'item_id',
        'inward_quantity',
        'gate_pass_id',
        'ware_house_id',
        'date',
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

    public function gatePass()
    {
        return $this->belongsTo(GatePass::class, 'gate_pass_id');
    }
    public function warehouse()
    {
        return $this->belongsTo(WareHouse::class, 'ware_house_id');
    }
}
