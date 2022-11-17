<?php


namespace App\Imports;


use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use App\Models\Product;
use Auth;

class ImportProduct implements  ToCollection,WithHeadingRow
{

    public function collection(Collection $rows)
    {
 
        foreach ($rows as $row)
        {
           $dd = json_decode($row);
           if(isset($dd->prodcut_name)){
            $result =    Product::create([
                        'user_id'        => Auth::user()->id,
                        'name'       => $dd->prodcut_name,
                        'inventory_count' => $dd->inventory_count,
                        'normal_price'       => $dd->mrp,
                        'sale_price'       => $dd->selling_price,
                        'shipping_price'       => $dd->shipping_price,
                        'short_description'       => $dd->short_description,
                        'image'       => $dd->image,
                        'shop_id'       => $dd->shop_id,
                        'category_id'       => $dd->category_id,
                        'sku_no' =>$dd->sku_no,
                        'brand_id'       => $dd->brand_id,
                        'product_size'       => $dd->product_size_id,
                        'long_decription'       => $dd->long_decription,
                    ]);
            // Product::where('id',$result->id)->update(array('sku_no' => 'PRO'.'0000'.$result->id));
           }
 
           
        }
    }

}

