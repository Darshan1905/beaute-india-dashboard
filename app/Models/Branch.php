<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'business', 'business_activity_id', 'name', 'address',	'contact', 'email' , 'gst', 'status', 'country_id', 'state_id', 'city'
    ];
}