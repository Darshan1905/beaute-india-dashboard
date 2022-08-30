<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use Auth;
class ColorController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:color-list|color-create|color-edit|color-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:color-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:color-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:color-delete', ['only' => ['destroy']]);
    }

   
    public function index(Request $request)
    {
        return view('color.index');
    }

    public function colorList() {
        $industry = Color::get();
        return datatables()->of($industry)
            ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
            ->editColumn('status', function($row) {
                            return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>';
                        })
            
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $btn = '';
                $btn .= '<div class="btn-group">';
                $btn .= ' <a class="btn btn-primary" href="' . route('color.edit', [$row->id]) . '">Edit</a>';
                return $btn;
            })
            ->rawColumns([
                'status' => 'status',
                'action' => 'action'
            ])
            ->make(true);
    }

    
    public function create()
    {   
        return view('color.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'color_code'=>'required',
        ]);
        $input = $request->except(['_token']);
        Color::create($input);
    
        return redirect()->route('color.index')
            ->with('success','Color created successfully.');
    }

   
    public function show($id)
    {
        $post = Color::find($id);

        return view('color.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Color::find($id);
        return view('color.edit',compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'color_code'=>'required',
        ]);

        $post = Color::find($id);
    
        $post->update($request->all());
    
        return redirect()->route('color.index')
            ->with('success', 'Color updated successfully.');
    }

    public function destroy($id)
    {
        Color::find($id)->update(array('status' => 0));
        return redirect()->route('color.index')
            ->with('success', 'Color deleted successfully.');
    }
}