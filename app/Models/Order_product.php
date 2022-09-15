<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'product_id', 'variation_option_id', 'order_quantity',	'unit_price', 'subtotal'     ];

    public function product_detail()
	{
	    return $this->belongsTo(Product::class, 'product_id', 'id');
	}    
}