<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use URL;
class SliderController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:sliders-list|sliders-create|sliders-edit|sliders-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:sliders-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:sliders-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:sliders-delete', ['only' => ['destroy']]);
    }

   
    public function index(Request $request)
    {
        return view('slider.index');
    }

    public function sliderList() {
        $industry = Slider::get();
        return datatables()->of($industry)
            ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
            ->editColumn('image', function($row) {
                return '<img src="'.URL::to('/').'/'.$row->image.'" style="width: 50px; height:50px;">'; })
            ->editColumn('shop', function($row) {
                          
                        if(isset(User::where('id','=',$row->shop_id)->first()->shopname)){ return User::where('id','=',$row->shop_id)->first()->shopname;} })

            ->editColumn('status', function($row) {
                            return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>';
                        })
            
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $btn = '';
                $btn .= '<div class="btn-group">';
                $btn .= ' <a class="btn btn-primary" href="' . route('sliders.edit', [$row->id]) . '">Edit</a>';
                $btn .= ' <a class="btn btn-primary" href="' . route('sliders.delete', [$row->id]) . '">Delete</a>';
                $btn .= '</div>';
                return $btn;
            })
            ->rawColumns([
                'status' => 'status',
                'shop' => 'shop',
                'image' => 'image',
                'action' => 'action'
            ])
            ->make(true);
    }

    
    public function create()
    {   
        $shop = User::where(array('status' => 1,'type' => 'shop'))->pluck('name', 'id')->all();
        return view('slider.create',compact('shop'));
    }

    public function store(Request $request)
    {
        
        $input = $request->except(['_token']);
        if($request->file('image')){
            $file= $request->file('image');
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = date('YmdHi'). '_'. rand('0000','9999').'.'.$extension;
            $file->move(public_path('image/'), $filename);
            $input['image']= 'image/'.$filename;
        }
        Slider::create($input);
    
        return redirect()->route('sliders.index')
            ->with('success','Size created successfully.');
    }

   
    public function show($id)
    {
        $post = Slider::find($id);

        return view('slider.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Slider::find($id);
        $shop = User::where(array('status' => 1,'type' => 'shop'))->pluck('name', 'id')->all();
        return view('slider.edit',compact('post','shop'));
    }

    public function update(Request $request, $id)
    {
        $post = Slider::find($id);
        $input = $request->except(['_token']);
        if($request->file('image')){
            $file= $request->file('image');
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = date('YmdHi'). '_'. rand('0000','9999').'.'.$extension;
            $file->move(public_path('image/'), $filename);
            $input['image']= 'image/'.$filename;
        }else{
            unset($input['image']);
        }
        $post->update($input);
    
        return redirect()->route('sliders.index')
            ->with('success', 'Size updated successfully.');
    }

    public function destroy($id)
    {
        Slider::find($id)->update(array('status' => 0,'delete_at'=>date('Y-m-d H:i:s')));
        return redirect()->route('sliders.index')
            ->with('success', 'Size deleted successfully.');
    }
}