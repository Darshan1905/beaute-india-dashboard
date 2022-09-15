<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tracking_number', 'customer_id', 'customer_contact', 'status', 'amount' , 'sales_tax',	'paid_total', 'total', 'coupon_id', 'shop_id', 'discount', 'payment_id', 'payment_gateway', 'shipping_address', 'billing_address', 'logistics_provider' , 'delivery_fee', 'delivery_time'
    ];
}