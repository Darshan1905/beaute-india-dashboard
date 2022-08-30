<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vendorcode', 'business', 'name',  'country_id',  'state_id',  'city', 'pincode', 'contact', 'email', 'address', 'pdf', 'pan', 'gst','status','shop_id'	
    ];
}