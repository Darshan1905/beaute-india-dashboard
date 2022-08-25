<?php

namespace App\Http\Controllers;

use App\Models\Customermaster;
use App\Models\Industrysegment;
use Illuminate\Http\Request;

class CustomermasterController extends Controller{
    
    function __construct(){
         $this->middleware('permission:customermaster-list|customermaster-create|customermaster-edit|customermaster-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:customermaster-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:customermaster-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:customermaster-delete', ['only' => ['destroy']]);
    }

   
    public function index(Request $request)
    {
        return view('customermaster.index');
    }

    public function customermasterList() {
        $customermaster = Customermaster::get();
        return datatables()->of($customermaster)
                        ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
                        
                       ->editColumn('status', function($row) {
                            return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>';
                        })
                        ->addColumn('action', function($row) {
                            $btn = '';
                            $btn .= '<div class="btn-group">';
                            $btn .= ' <a class="btn btn-primary" href="' . route('customermaster.edit', [$row->id]) . '">Edit</a>';
                            return $btn;
                        })
                        ->rawColumns([
                            'id' => 'id',
                            'name' => 'name',
                            'business_address' => 'business_address',
                            'communication_address' => 'communication_address',
                            'contact' => 'contact',
                            'email' => 'email',
                            'gst' => 'gst',
                            'status' => 'status',
                            'created_at' => 'created_at',
                            'action' => 'action'
                        ])
                        ->make(true);
    }

    
    public function create(){
        $customermster = Customermaster::where('status','=',1)->pluck('name', 'id')->all();
        return view('customermaster.create',compact('customermster'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'business_address' => 'required',
            'communication_address' => 'required',
            'contact' => 'required',
            'email' => 'required',
        ]);

        $input = $request->except(['_token']);
      
        Customermaster::create($input);
    
        return redirect()->route('customermaster.index')
            ->with('success','Customer Master created successfully.');
    }

   
    public function show($id){
        $post = Customermaster::find($id);

        return view('customermaster.show', compact('post'));
    }

    public function edit($id){
        $post = Customermaster::find($id);
        $customermaster = Customermaster::where('status','=',1)->pluck('name', 'id')->all();
        return view('customermaster.edit',compact('post','customermaster'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'name' => 'required',
            'business_address' => 'required',
            'communication_address' => 'required',
            'contact' => 'required',
            'email' => 'required',
        ]);

        $post = customermaster::find($id);
        $input = $request->except(['_token']);
        $post->update($input);
    
        return redirect()->route('customermaster.index')
            ->with('success', 'Customer Master updated successfully.');
    }

    public function destroy($id){
        Business::find($id)->update(array('status' => 0));
        return redirect()->route('businesses.index')
            ->with('success', 'Customer Master deleted successfully.');
    }
}