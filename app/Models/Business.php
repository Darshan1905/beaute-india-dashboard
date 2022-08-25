<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'industrysegment_id', 'name', 'address',	'contact', 'email' , 'cin',	'gst', 'logo', 'status', 'country_id', 'state_id', 'city'
    ];
}