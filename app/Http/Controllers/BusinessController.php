<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Industrysegment;
use App\Models\Countries;
use App\Models\State;
use App\Models\Cities;
use Illuminate\Http\Request;

class BusinessController extends Controller{
    
    function __construct()
    {
         $this->middleware('permission:businesses-list|businesses-create|businesses-edit|businesses-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:businesses-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:businesses-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:businesses-delete', ['only' => ['destroy']]);
    }

   
    public function index(Request $request)
    {
        return view('businesses.index');
    }

    public function businessesList() {
        $industry = Business::get();
        return datatables()->of($industry)
                        ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
                        ->editColumn('industrysegment', function($row) {
                            return Industrysegment::where('id','=',$row->industrysegment_id)->first()->name; })

                       ->editColumn('status', function($row) {
                            return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>';
                        })
                        ->addColumn('action', function($row) {
                            $btn = '';
                            $btn .= '<div class="btn-group">';
                            $btn .= ' <a class="btn btn-primary" href="' . route('businesses.edit', [$row->id]) . '">Edit</a>';
                            return $btn;
                        })
                        ->rawColumns([
                            'industrysegment' => 'industrysegment',
                            'status' => 'status',
                            'action' => 'action'
                        ])
                        ->make(true);
    }

    
    public function create()
    {   
        $industrysegment = Industrysegment::where('status','=',1)->pluck('name', 'id')->all();
        $countries = Countries::pluck('name', 'id')->all();
        return view('businesses.create',compact('industrysegment','countries'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'industrysegment_id' => 'required',
            'name' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'logo' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city' => 'required',
        ]);

      
        $input = $request->except(['_token']);
        // echo "<pre>";
        // print_r($input); die;
        if (isset($input['logo']) && !empty($input['logo'])) {
            $imageName = time().'.'.$request->logo->extension();
            $request->logo->move('uploads/images', $imageName);
            $input['logo'] = 'uploads/images/'.$imageName;
        }
        Business::create($input);
    
        return redirect()->route('businesses.index')
            ->with('success','Business created successfully.');
    }

   
    public function show($id)
    {
        $post = Business::find($id);

        return view('businesses.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Business::find($id);
        $industrysegment = Industrysegment::where('status','=',1)->pluck('name', 'id')->all();
        $countries = Countries::pluck('name', 'id')->all();
        $state = State::where('country_id', $post->country_id)->pluck('name', 'id')->all();
        $city = Cities::where('state_id', $post->state_id)->pluck('name', 'id')->all();
        return view('businesses.edit',compact('post','industrysegment','countries','state','city'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'industrysegment_id' => 'required',
            'name' => 'required',
            'address' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'cin' => 'required',
            'gst' => 'required',
        ]);

        $post = Business::find($id);
        $input = $request->except(['_token']);
        if (isset($input['logo']) && !empty($input['logo'])) {
            $imageName = time().'.'.$request->logo->extension();
            $request->logo->move('uploads/images', $imageName);
            $input['logo'] = 'uploads/images/'.$imageName;
        }else{
            unset( $input['logo']);
        }
        $post->update($input);
    
        return redirect()->route('businesses.index')
            ->with('success', 'Business updated successfully.');
    }

    public function destroy($id)
    {
        Business::find($id)->update(array('status' => 0));
        return redirect()->route('businesses.index')
            ->with('success', 'Business deleted successfully.');
    }
}