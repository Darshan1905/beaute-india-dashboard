@extends('layouts.app')
@section('content')
<div class="container-fluid">
      <!-- Page Header -->
      <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Slider</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </div>
        
    </div>
    <!-- End Page Header -->

    <!-- Row-->
    <div class="row">
        <div class="col-sm-12 col-xl-12 col-lg-12">
            <div class="card custom-card">
           
            <div class="card-header">Create Slider
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
                    <a class="btn btn-primary" href="{{ route('sliders.index') }}">Back</a>
                </span>
            </div>
            <div class="card-body">
            {!! Form::open(array('route' => 'sliders.store', 'method'=>'POST','enctype' => 'multipart/form-data')) !!}
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <strong>Shop:</strong>
                        {!! Form::select('shop_id', $shop,null, array('id' => 'shop_id','class' => 'form-control','onchange' => "getVendorFn()")) !!}
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
    <!-- End Row -->

</div>
@endsection
@section('scripts')
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
@endsection