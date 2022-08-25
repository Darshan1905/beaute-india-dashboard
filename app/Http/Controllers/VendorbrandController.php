<?php

namespace App\Http\Controllers;

use App\Models\Vendorbrand;
use App\Models\Vendor;
use App\Models\Brand;
use App\Models\Industrysegment;
use Illuminate\Http\Request;

class VendorbrandController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:vendorbrands-list|vendorbrands-create|vendorbrands-edit|vendorbrands-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:vendorbrands-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:vendorbrands-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:vendorbrands-delete', ['only' => ['destroy']]);
    }

   
    public function index(Request $request)
    {
        return view('vendorbrands.index');
    }

    public function vendorbrandsList() {
        $industry = Vendorbrand::get();
        return datatables()->of($industry)
                        ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
                        ->editColumn('vendor', function($row) {
                            return Vendor::where('id','=',$row->vendor_id)->first()->name; })

                        ->editColumn('brand', function($row) {
                                return Brand::where('id','=',$row->brand_id)->first()->name; })
        
                       ->editColumn('status', function($row) {
                            return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>';
                        })
                        ->addColumn('action', function($row) {
                            $btn = '';
                            $btn .= '<div class="btn-group">';
                            $btn .= ' <a class="btn btn-primary" href="' . route('vendorbrands.edit', [$row->id]) . '">Edit</a>';
                            return $btn;
                        })
                        ->rawColumns([
                            'vendor' => 'vendor',
                            'brand' => 'brand',
                            'status' => 'status',
                            'action' => 'action'
                        ])
                        ->make(true);
    }

    
    public function create()
    {   
        $vendor = Vendor::where('status','=',1)->pluck('name', 'id')->all();
        $brand = Brand::where('status','=',1)->pluck('name', 'id')->all();
        return view('vendorbrands.create',compact('vendor','brand'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'vendor_id' => 'required',
            'brand_id' => 'required',
        ]);

      
        $input = $request->except(['_token']);
        Vendorbrand::create($input);
    
        return redirect()->route('vendorbrands.index')
            ->with('success','Vendor Brand created successfully.');
    }

   
    public function show($id)
    {
        $post = Business::find($id);

        return view('userbranches.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Vendorbrand::find($id);
        $vendor = Vendor::where('status','=',1)->pluck('name', 'id')->all();
        $brand = Brand::where('status','=',1)->pluck('name', 'id')->all();
        return view('vendorbrands.edit',compact('post','vendor','brand'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'vendor_id' => 'required',
            'brand_id' => 'required',
        ]);

        $post = Vendorbrand::find($id);
        $input = $request->except(['_token']);
        $post->update($input);
    
        return redirect()->route('vendorbrands.index')
            ->with('success', 'Vendor Brand updated successfully.');
    }

    public function destroy($id)
    {
        Vendorbrand::find($id)->update(array('status' => 0));
        return redirect()->route('vendorbrands.index')
            ->with('success', 'Vendor Brand deleted successfully.');
    }
}