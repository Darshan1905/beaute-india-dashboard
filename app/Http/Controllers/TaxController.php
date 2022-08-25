<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:taxes-list|taxes-create|taxes-edit|taxes-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:taxes-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:taxes-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:taxes-delete', ['only' => ['destroy']]);
    }

   
    public function index(Request $request)
    {
        return view('taxs.index');
    }

    public function taxsList() {
        $industry = Tax::get();
        return datatables()->of($industry)
                        ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
                        ->editColumn('status', function($row) {
                            return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>';
                        })
                        ->addColumn('action', function($row) {
                            $btn = '';
                            $btn .= '<div class="btn-group">';
                            $btn .= ' <a class="btn btn-primary" href="' . route('taxes.edit', [$row->id]) . '">Edit</a>';
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
        return view('taxs.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $input = $request->except(['_token']);
    
        Tax::create($input);
    
        return redirect()->route('taxes.index')
            ->with('success','TAX created successfully.');
    }

   
    public function show($id)
    {
        $post = Tax::find($id);

        return view('taxs.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Tax::find($id);

        return view('taxs.edit',compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $post = Tax::find($id);
    
        $post->update($request->all());
    
        return redirect()->route('taxes.index')
            ->with('success', 'TAX updated successfully.');
    }

    public function destroy($id)
    {
        Tax::find($id)->update(array('status' => 0));
        return redirect()->route('taxes.index')
            ->with('success', 'TAX deleted successfully.');
    }
}