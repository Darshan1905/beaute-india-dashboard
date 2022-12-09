<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
class BrandController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:brands-list|brands-create|brands-edit|brands-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:brands-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:brands-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:brands-delete', ['only' => ['destroy']]);
    }

   
    public function index(Request $request)
    {
        return view('brands.index');
    }

    public function brandList() {
        $industry = Brand::get();
        return datatables()->of($industry)
            ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
            ->editColumn('shop', function($row) {
                          
                        if(isset(User::where('id','=',$row->shop_id)->first()->shopname)){ return User::where('id','=',$row->shop_id)->first()->shopname;} })

            ->editColumn('status', function($row) {
                            return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>';
                        })
            ->addColumn('action', function($row) {
                $btn = '';
                $btn .= '<div class="btn-group">';
                $btn .= ' <a class="btn btn-primary" href="' . route('brands.edit', [$row->id]) . '">Edit</a>';
                $btn .= ' <a  class="btn btn-danger" href="' . route('brands.delete', [$row->id]) . '">Delete</a>';
                $btn .= '<div>';
                return $btn;
            })
            
            ->addIndexColumn()
            ->rawColumns([
                'status' => 'status',
                'shop' => 'shop',
                'action' => 'action'
            ])
            ->make(true);
    }

    
    public function create()
    {   
        $shop = User::where(array('status' => 1,'type' => 'shop'))->pluck('name', 'id')->all();
        return view('brands.create',compact('shop'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $input = $request->except(['_token']);
        $input['user_id'] = Auth::user()->id;
        Brand::create($input);
    
        return redirect()->route('brands.index')
            ->with('success','Brand created successfully.');
    }

   
    public function show($id)
    {
        $post = Brand::find($id);

        return view('brands.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Brand::find($id);
        $shop = User::where(array('status' => 1,'type' => 'shop'))->pluck('name', 'id')->all();
        return view('brands.edit',compact('post','shop'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $post = Brand::find($id);
    
        $post->update($request->all());
    
        return redirect()->route('brands.index')
            ->with('success', 'Brand updated successfully.');
    }

    public function destroy($id)
    {
        Brand::find($id)->update(array('status' => 0,'delete_at'=>date('Y-m-d H:i:s')));
        return redirect()->route('brands.index')
            ->with('success', 'Brand deleted successfully.');
    }
}