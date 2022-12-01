<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;
use App\Models\Vendor;
use App\Models\Categorie;
use App\Models\Size;
class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'name', 'short_description', 'long_description','normal_price', 'sale_price', 'inventory_count', 'product_size', 'sku_no', 'stock_status', 'shipping_price', 'category_id','image','shop_id','vendor_id','product_color','brand_id','delete_at','status'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id','id');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id','id');
    }

    public function category()
    {
        return $this->belongsTo(Categorie::class, 'category_id','id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'product_size','id');
    }
}