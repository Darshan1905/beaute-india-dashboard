@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
        
        <div class="card">
            <div class="card-header">Edit Vendor 
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('product.index') }}">Back</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::model($post, ['route' => ['product.update', $post->id], 'method'=>'PATCH','enctype' => 'multipart/form-data']) !!}
                     <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <strong>Shop:</strong>
                    {!! Form::select('shop_id', $shop,null, array('id' => 'shop_id','class' => 'form-control','onchange' => "getVendorFn()")) !!}
                </div>   
            </div>   
            <div class="col-md-3">
                <div class="form-group">
                    <strong>Vendor:</strong>
                    {!! Form::select('vendor_id', $vendor,null, array('id'=>'vendor_id' ,'class' => 'form-control')) !!}
                </div>   
            </div>   
            <div class="col-md-3">
                <div class="form-group">
                    <strong>Category:</strong>
                    {!! Form::select('category_id', $category,null, array('class' => 'form-control')) !!}
                </div>
            </div>     
            <div class="col-md-3">
                <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('name', null, array('placeholder'=> 'Product Name','class' => 'form-control','required' =>'required')) !!}
                </div>
            </div>    
                
            <div class="col-md-3">
                    <div class="form-group">
                        <strong>MRP:</strong>
                        {!! Form::number('normal_price', null, array('placeholder'=> 'MRP','class' => 'form-control','required' =>'required')) !!}
                    </div>
                </div> 
                <div class="col-md-3">
                    <div class="form-group">
                        <strong>Sales Price:</strong>
                        {!! Form::number('sale_price', null, array('placeholder'=> 'Sales Price','class' => 'form-control','required' =>'required')) !!}
                    </div>
                </div> 
              
                <div class="col-md-3">
                    <div class="form-group">
                        <strong>Shipping Price:</strong>
                        {!! Form::number('shipping_price', null, array('placeholder'=> 'Product Size','class' => 'form-control','required' =>'required')) !!}
                    </div>
                </div> 
                <div class="col-md-3">
                    <div class="form-group">
                        <strong>Qty:</strong>
                        {!! Form::number('inventory_count', null, array('placeholder' => 'Qty','id' => 'inventory_count','class' => 'form-control','required' =>'required')) !!}
                    </div>
                </div>   
                  <div class="col-md-3">
                    <div class="form-group">
                        <strong>Size:</strong>
                        {!! Form::select('product_size', $size,null, array('class' => 'form-control')) !!}
                    </div>
                </div>     
               <div class="col-md-3">
                    <div class="form-group">
                        <strong>Color:</strong>
                        {!! Form::select('product_color', $color,null, array('class' => 'form-control')) !!}
                    </div>
                </div>     
                 <div class="col-md-3">
                    <div class="form-group">
                        <strong>Brand:</strong>
                        {!! Form::select('brand_id', $brand,null, array('id'=>'brand_id' ,'class' => 'form-control')) !!}
                    </div>   
                </div>     
                <div class="col-md-3">
                    <div class="form-group">
                        <strong>Image:</strong>
                        {!! Form::file('image', null, array('placeholder' => 'image','id' => 'image','class' => 'form-control','required' =>'required')) !!}
                    </div>
                </div>  
                <div class="col-md-3">
                    <div class="form-group">
                        <strong>Other Image:</strong>
                        {!! Form::file('other_img[]', array('placeholder' => 'image','id' => 'image','multiple' =>'multiple','accept' =>'image/*','class' => 'form-control')) !!}
                    </div>
                </div> 
                @if($images)
                @foreach($images as $value)
                
                <div class="col-md-2">
                
                <img src="{{URL::to('/')}}/{{$value['image']}}" style="width: 50%; height: 50%;">
                <a href="{{URL::to('/')}}/delete-image/{{$value['id']}}">Delete</a>
                </div> 
                @endforeach
                @endif
                       

                <div class="col-md-12">
                    <div class="form-group">
                        <strong>Short Description:</strong>
                        {!! Form::textarea('short_description', null, array('placeholder' => 'Short Description','id' => 'shor_description','class' => 'form-control','required' =>'required')) !!}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <strong>Long Description:</strong>
                         {!! Form::textarea('long_description', null, array('placeholder' => 'Short Description','id' => 'log_description','class' => 'form-control','required' =>'required')) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <strong>Status:</strong>
                        {!! Form::select('status', array(1=>'Active',0 => 'Disable'),null, array('class' => 'form-control')) !!}
                    </div>
                </div>   
            </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
<script>
        CKEDITOR.replace( 'short_description' );
        CKEDITOR.replace( 'long_description' );
</script>
<script>

function makeid(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * 
 charactersLength));
   }
   return result;
}
$('#code').val(makeid(2));
</script>

<script>
    $(document).ready(function () {

        getVendorFn = function () {
            var shop_id = $('#shop_id').val();
            $.ajax({
                type: "get",
                contentType: 'application/json',
                "url": "{{ route('fetch-vendor') }}",
                data:{shop_id: shop_id},
                success: function (res) {
                    $('#vendor_id').html('');
                    if (res != '') {
                        var states = res;
                        $.each(states, function () {
                            $("#vendor_id").append('<option value="' + this.id + '">' + this.name + '</option>');
                        });
                    } else {
                        $("#vendor_id").append('<option value="">Select Vendor</option>');
                    }
                    getCityFn();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

      
        
    });

    $(window).on('load',function(){

getVendorFn();
    })
</script>
@endsection