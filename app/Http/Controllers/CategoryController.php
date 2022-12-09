<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Models\Businessactivitie;
use App\Models\Business;
use App\Models\Categorie; 
use App\Models\User;
use Auth;
use PhpOffice\PhpSpreadsheet\Calculation\Category;
use URL;
class CategoryController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:category-list|categorys-create|categorys-edit|categorys-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:categorys-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:categorys-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:categorys-delete', ['only' => ['destroy']]);
    }

   
    public function index(Request $request)
    {
        return view('category.index');
    }

    public function categoryList() {
        $industry = Categorie::get();
        return datatables()->of($industry)
            ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
             ->editColumn('image', function($row) {
                return '<img src="'.$row->image.'" style="width: 50px; height:50px;">'; })
           ->editColumn('shop', function($row) {
                          
                        if(isset(User::where('id','=',$row->shop_id)->first()->shopname)){ return User::where('id','=',$row->shop_id)->first()->shopname;} })

            ->addIndexColumn()
            ->editColumn('status', function($row) {
                            return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>';
                        })
            ->addColumn('action', function($row) {
                $btn = '';
                $btn .= '<div class="btn-group">';
               $btn .= ' <a class="btn btn-primary" href="' . route('categorys.edit', [$row->id]) . '">Edit</a>';
               
               $btn .= ' <a  class="btn btn-danger" href="' . route('categorys.delete', [$row->id]) . '">Delete</a>';
               
               $btn.= '</div>';
                return $btn;
            })
            ->rawColumns([
                'status' => 'status',
                'shop' => 'shop',
                'category_name' => 'category_name',
                'image' => 'image',
                'action' => 'action'
            ])
            ->make(true);
    }

    
    public function create()
    {   
        $shop = User::where(array('status' => 1,'type' => 'shop'))->pluck('name', 'id')->all();
        return view('category.create',compact('shop'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description'=>'required',
        ]);
        $input = $request->except(['_token']);
        $input['user_id'] = Auth::user()->id;
        if($request->file('image')){
            $file= $request->file('image');
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = date('YmdHi'). '_'. rand('0000','9999').'.'.$extension;
            $file->move(public_path('image/'), $filename);
            $input['image']= URL::to('/').'/image/'.$filename;
        }
        Categorie::create($input);
    
        return redirect()->route('categorys.index')
            ->with('success','Category created successfully.');
    }

   
    public function show($id)
    {
        $post = Categorie::find($id);

        return view('category.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Categorie::find($id);
        $shop = User::where(array('status' => 1,'type' => 'shop'))->pluck('name', 'id')->all();
        
        return view('category.edit',compact('post','shop'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        
        $input = $request->except(['_token']);
         if($request->file('image')){
            $file= $request->file('image');
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = date('YmdHi'). '_'. rand('0000','9999').'.'.$extension;
            $file->move(public_path('image/'), $filename);
            $input['image']= URL::to('/').'/image/'.$filename;
        }
        $post = Categorie::find($id);
    
        $post->update($input);
    
        return redirect()->route('categorys.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        
        Categorie::find($id)->update(array('status' => 0,'delete_at'=>date('Y-m-d H:i:s')));
      //  Branch::find($id)->update(array('status' => 0,'delete_at'=>date('Y-m-d H:i:s')));
        // return redirect()->route('branches.index')
        return redirect()->route('categorys.index')
            ->with('success', 'Category deleted successfully.');
    }
}