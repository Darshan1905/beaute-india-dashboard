<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'tracking_number', 'customer_id', 'customer_contact', 'status', 'amount' , 'sales_tax',	'paid_total', 'total', 'coupon_id', 'shop_id', 'discount', 'payment_id', 'payment_gateway', 'shipping_address', 'billing_address', 'logistics_provider' , 'delivery_fee', 'delivery_time',
       'Order ID',	'Date'	,'Store	SKU	Brand','Product Name',	'Payment Method', 'Product Quantity',	'COD Fee',	'Shipping Fee',	'Pickup Location',	'Product MRP',	'Product Selling', 'Price',	'MRP Value',	'GMV Value',	'Disc.% Slab',	'Coupon Code',	'Customer Name',	'Customer Email','Customer Mobile',	'Address Line 1',	'Address Line 2',	'Address City',	'Address State',	'Address Pincode',


    ];
}
