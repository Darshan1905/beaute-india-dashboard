<?php

namespace App\Http\Controllers;

use App\Models\Uom;
use Illuminate\Http\Request;

class UomController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:uoms-list|uoms-create|uoms-edit|uoms-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:uoms-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:uoms-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:uoms-delete', ['only' => ['destroy']]);
    }

   
    public function index(Request $request)
    {
        return view('uom.index');
    }

    public function uomsList() {
        $industry = Uom::get();
        return datatables()->of($industry)
                        ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
                        ->editColumn('status', function($row) {
                            return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>';
                        })
                        ->addColumn('action', function($row) {
                            $btn = '';
                            $btn .= '<div class="btn-group">';
                            $btn .= ' <a class="btn btn-primary" href="' . route('uoms.edit', [$row->id]) . '">Edit</a>';
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
        return view('uom.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $input = $request->except(['_token']);
    
        Uom::create($input);
    
        return redirect()->route('uoms.index')
            ->with('success','UOM created successfully.');
    }

   
    public function show($id)
    {
        $post = Uom::find($id);

        return view('uom.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Uom::find($id);

        return view('uom.edit',compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $post = Uom::find($id);
    
        $post->update($request->all());
    
        return redirect()->route('uoms.index')
            ->with('success', 'UOM updated successfully.');
    }

    public function destroy($id)
    {
        Uom::find($id)->update(array('status' => 0));
        return redirect()->route('uoms.index')
            ->with('success', 'UOM deleted successfully.');
    }
}