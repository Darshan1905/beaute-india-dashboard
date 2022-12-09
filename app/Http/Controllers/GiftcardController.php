<?php

namespace App\Http\Controllers;

use App\Models\Giftcard;
use Illuminate\Http\Request;
use Auth;
use FORM;
use URL;
class GiftcardController extends Controller
{
    
    

   
    public function index(Request $request)
    {
        return view('giftcard.index');
    }

    public function giftcardList() {
        $industry = Giftcard::where('status',1)->get();
        return datatables()->of($industry)
            ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
            ->editColumn('start_date', '{{ date("d-m-Y", strtotime($start_date)) }}')
            ->editColumn('end_date', '{{ date("d-m-Y", strtotime($end_date)) }}')
            ->editColumn('image', function($row) {
                return '<img src="'.URL::to('/').'/'.$row->image.'" style="width: 50px; height:50px;">'; })
              ->editColumn('status', function($row) {
                            return $row->status == 1 ? '<span style="color:green">Active</span>' : '<span style="color:red">In-Active</span>';
                            })
            ->addColumn('action', function($row) {
                $btn = '';
                $btn .= '<div class="btn-group">';
                $btn .= ' <a style="margin-right: 5px" class="btn btn-primary" href="' . route('giftcard.edit', [$row->id]) . '">Edit</a>';
                $btn .= ' <a  class="btn btn-danger" href="' . route('giftcard.delete', [$row->id]) . '">Delete</a>';
                $btn .= '<div>';
                return $btn;
            })
            ->rawColumns([
                'start_date' => 'start_date',
                'end_date' => 'end_date',
                'status' => 'status',
                'image' => 'image',
                'action' => 'action'
            ])
            ->make(true);
    }

    
    public function create()
    {   
        return view('giftcard.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

         $input = $request->except(['_token']);
        if($request->file('image')){
            $file= $request->file('image');
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = date('YmdHi'). '_'. rand('0000','9999').'.'.$extension;
            $file->move(public_path('image/'), $filename);
            $input['image']= 'image/'.$filename;
        }
        
        $result = Giftcard::create($input);
        
        return redirect()->route('giftcard.index')
            ->with('success','Gift Card created successfully.');
    }

   
    public function show($id)
    {
        $post = Giftcard::find($id);
   
        return view('giftcard.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Giftcard::find($id);
         return view('giftcard.edit',compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

         $input = $request->except(['_token']);
        if($request->file('image')){
            $file= $request->file('image');
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = date('YmdHi'). '_'. rand('0000','9999').'.'.$extension;
            $file->move(public_path('image/'), $filename);
            $input['image']= 'image/'.$filename;
        }



        $post = Giftcard::find($id);
    
        $post->update($input);         
    
        return redirect()->route('giftcard.index')
            ->with('success', 'Gift Card updated successfully.');
    }

    public function destroy($id)
    {
        //Giftcard::where('id',$id)->delete();
     
       Giftcard::find($id)->update(array('status' => 0,'delete_at'=>date('Y-m-d H:i:s')));
             
       return redirect()->route('giftcard.index')
            ->with('success', 'Gift Card deleted successfully.');
    }

 
}