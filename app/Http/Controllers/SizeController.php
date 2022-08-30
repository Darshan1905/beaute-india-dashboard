<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;
use Auth;
class SizeController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:size-list|size-create|size-edit|size-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:size-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:size-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:size-delete', ['only' => ['destroy']]);
    }

   
    public function index(Request $request)
    {
        return view('size.index');
    }

    public function sizeList() {
        $industry = Size::get();
        return datatables()->of($industry)
            ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
            ->editColumn('status', function($row) {
                            return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>';
                        })
            
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $btn = '';
                $btn .= '<div class="btn-group">';
                $btn .= ' <a class="btn btn-primary" href="' . route('size.edit', [$row->id]) . '">Edit</a>';
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
        return view('size.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $input = $request->except(['_token']);
        Size::create($input);
    
        return redirect()->route('size.index')
            ->with('success','Size created successfully.');
    }

   
    public function show($id)
    {
        $post = Size::find($id);

        return view('size.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Size::find($id);
        return view('size.edit',compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $post = Size::find($id);
    
        $post->update($request->all());
    
        return redirect()->route('size.index')
            ->with('success', 'Size updated successfully.');
    }

    public function destroy($id)
    {
        Size::find($id)->update(array('status' => 0));
        return redirect()->route('size.index')
            ->with('success', 'Size deleted successfully.');
    }
}