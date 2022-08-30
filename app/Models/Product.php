<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'name', 'short_description', 'long_description','normal_price', 'sale_price', 'inventory_count', 'product_size', 'sku_no', 'stock_status', 'shipping_price', 'category_id','image','shop_id','vendor_id'
    ];
}