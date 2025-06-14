<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    public function statedetail()
    {
        return $this->hasOne('App\Models\State', 'id', 'state');
    }

    public function exhibitor()
    {
        return $this->hasOne('App\Models\Exhibitor', 'id', 'exhibitor_id');
    }

    public function category()
    {
        return $this->hasMany('App\Models\InquiryCategory', 'inquiry_id', 'id');
    }

    public function company()
    {
        return $this->hasOne('App\Models\InquiryCompany', 'inquiry_id', 'id');
    }

    public function stall()
    {
        return $this->hasOne('App\Models\StallInquiry', 'inquiry_id', 'id');
    }

    public function detail()
    {
        return $this->hasMany('App\Models\InquiryDetail', 'inquiry_id', 'id');
    }
}
