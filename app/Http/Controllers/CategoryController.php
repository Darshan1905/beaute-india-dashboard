<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Models\Businessactivitie;
use App\Models\Business;
use App\Models\Categorie;
use Auth;
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
            ->addColumn('action', function($row) {
                $btn = '';
                $btn .= '<div class="btn-group">';
                $btn .= ' <a class="btn btn-primary" href="' . route('categorys.edit', [$row->id]) . '">Edit</a>';
                return $btn;
            })
            ->rawColumns([
                'category_name' => 'category_name',
                'bussiness' => 'bussiness',
                'category_code' => 'category_code',
                'action' => 'action'
            ])
            ->make(true);
    }

    
    public function create()
    {   
        return view('category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description'=>'required',
        ]);
        $input = $request->except(['_token']);
        $input['user_id'] = Auth::user()->id;
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
        return view('category.edit',compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description'=>'required',
        ]);

        $post = Categorie::find($id);
    
        $post->update($request->all());
    
        return redirect()->route('categorys.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        Branch::find($id)->update(array('status' => 0));
        return redirect()->route('branches.index')
            ->with('success', 'Category deleted successfully.');
    }
}