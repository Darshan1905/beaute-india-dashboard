<?php

namespace App\Http\Controllers;

use App\Models\Industrysegment;
use Illuminate\Http\Request;

class IndustrysegmentController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:industrysegments-list|industrysegments-create|industrysegments-edit|industrysegment-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:industrysegments-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:industrysegments-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:industrysegments-delete', ['only' => ['destroy']]);
    }

   
    public function index(Request $request)
    {
        return view('industrysegment.index');
    }

    public function IndustrysegmentList() {
        $industry = Industrysegment::get();
        return datatables()->of($industry)
                        ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
                        ->editColumn('status', function($row) {
                            return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>';
                        })
                        ->addColumn('action', function($row) {
                            $btn = '';
                            $btn .= '<div class="btn-group">';
                            $btn .= ' <a class="btn btn-primary" href="' . route('industrysegments.edit', [$row->id]) . '">Edit</a>';
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
        return view('industrysegment.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $input = $request->except(['_token']);
    
        Industrysegment::create($input);
    
        return redirect()->route('industrysegments.index')
            ->with('success','Industry Segment created successfully.');
    }

   
    public function show($id)
    {
        $post = Industrysegment::find($id);

        return view('industrysegment.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Industrysegment::find($id);

        return view('industrysegment.edit',compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $post = Industrysegment::find($id);
    
        $post->update($request->all());
    
        return redirect()->route('industrysegments.index')
            ->with('success', 'Industry Segment updated successfully.');
    }

    public function destroy($id)
    {
        Industrysegment::find($id)->update(array('status' => 0));
        return redirect()->route('industrysegments.index')
            ->with('success', 'Industry Segment deleted successfully.');
    }
}