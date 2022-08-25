<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\Business;
use App\Models\Countries;
use App\Models\State;
use App\Models\Cities;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:vendors-list|vendors-create|vendors-edit|vendors-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:vendors-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:vendors-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:vendors-delete', ['only' => ['destroy']]);
    }

   
    public function index(Request $request)
    {
        return view('vendors.index');
    }

    public function vendorsList() {
        $industry = Vendor::get();
        return datatables()->of($industry)
                        ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
                        ->editColumn('business', function($row) {
                            return Business::where('id','=',$row->business)->first()->name; })

                        
                       ->editColumn('status', function($row) {
                            return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>';
                        })
                        ->addColumn('action', function($row) {
                            $btn = '';
                            $btn .= '<div class="btn-group">';
                            $btn .= ' <a class="btn btn-primary" href="' . route('vendors.edit', [$row->id]) . '">Edit</a>';
                            return $btn;
                        })
                        ->rawColumns([
                            'business' => 'business',
                            'status' => 'status',
                            'action' => 'action'
                        ])
                        ->make(true);
    }

    
    public function create()
    {   
        $business = Business::where('status','=',1)->pluck('name', 'id')->all();
        $countries = Countries::pluck('name', 'id')->all();
        return view('vendors.create',compact('business','countries'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'business' => 'required',
            'name' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city' => 'required',
        ]);
        if (isset($input['pdf']) && !empty($input['pdf'])) {
            $imageName = time().'.'.$request->pdf->extension();
            $request->pdf->move('uploads/images', $imageName);
            $input['pdf'] = 'uploads/images/'.$imageName;
        }
        $input = $request->except(['_token']);
             
        $st =0;
        $st =  Vendor::count();
        $st =$st+1;
        $input['vendorcode'] = strtoupper(substr($input['name'], 0, 2)).'-'.$input['state_id'].'-'.'00000'.$st; 
        Vendor::create($input);
    
        return redirect()->route('vendors.index')
            ->with('success','Brand Branches created successfully.');
    }

   
    public function show($id)
    {
        $post = Business::find($id);

        return view('vendors.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Vendor::find($id);
        $business = Business::where('status','=',1)->pluck('name', 'id')->all();
        $countries = Countries::pluck('name', 'id')->all();
        $state = State::where('country_id', $post->country_id)->pluck('name', 'id')->all();
        $city = Cities::where('state_id', $post->state_id)->pluck('name', 'id')->all();
        return view('vendors.edit',compact('business','post','countries','state','city'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'business' => 'required',
            'name' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city' => 'required',
        ]);

        $post = Vendor::find($id);
        $input = $request->except(['_token']);
        if (isset($input['pdf']) && !empty($input['pdf'])) {
            $imageName = time().'.'.$request->pdf->extension();
            $request->pdf->move('uploads/images', $imageName);
            $input['pdf'] = 'uploads/images/'.$imageName;
        }else{
            unset($input['pdf']);
        }
        $post->update($input);
    
        return redirect()->route('vendors.index')
            ->with('success', 'Vendor updated successfully.');
    }

    public function destroy($id)
    {
        Vendor::find($id)->update(array('status' => 0));
        return redirect()->route('vendors.index')
            ->with('success', 'Vendor deleted successfully.');
    }
}