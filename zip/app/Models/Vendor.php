<?php

namespace App\Models;

use App\Notifications\VendorPasswordResetNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Vendor extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name', 'last_name','address', 'city', 'state', 'gstn', 'pan', 'contact_person_name',
        'mobile', 'email', 'password', 'alternate_contact_person',
        'alternate_mobile_number', 'alternate_email', 'status',
        'is_active', 'is_delete',
    ];

    protected $hidden = [
        'password',
    ];

    public function category()
{
    return $this->belongsTo(Category::class, 'category_id', 'id');
}


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new VendorPasswordResetNotification($token));
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'vendor_categories', 'vendor_id', 'category_id');
    }
}
