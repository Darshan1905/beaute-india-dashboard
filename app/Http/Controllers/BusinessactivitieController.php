<?php

namespace App\Http\Controllers;

use App\Models\Businessactivitie;
use Illuminate\Http\Request;

class BusinessactivitieController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:businessactivities-list|businessactivities-create|businessactivities-edit|businessactivities-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:businessactivities-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:businessactivities-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:businessactivities-delete', ['only' => ['destroy']]);
    }

   
    public function index(Request $request)
    {
        return view('businessactivities.index');
    }

    public function BusinessactivitieList() {
        $industry = Businessactivitie::get();
        return datatables()->of($industry)
                        ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
                        ->editColumn('status', function($row) {
                            return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>';
                        })
                        ->addColumn('action', function($row) {
                            $btn = '';
                            $btn .= '<div class="btn-group">';
                            $btn .= ' <a class="btn btn-primary" href="' . route('businessactivities.edit', [$row->id]) . '">Edit</a>';
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
        return view('businessactivities.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $input = $request->except(['_token']);
    
        Businessactivitie::create($input);
    
        return redirect()->route('businessactivities.index')
            ->with('success','Business Activity created successfully.');
    }

   
    public function show($id)
    {
        $post = Businessactivitie::find($id);

        return view('businessactivities.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Businessactivitie::find($id);

        return view('businessactivities.edit',compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $post = Businessactivitie::find($id);
    
        $post->update($request->all());
    
        return redirect()->route('businessactivities.index')
            ->with('success', 'Business Activity updated successfully.');
    }

    public function destroy($id)
    {
        Businessactivitie::find($id)->update(array('status' => 0));
        return redirect()->route('businessactivities.index')
            ->with('success', 'Business Activity deleted successfully.');
    }
}