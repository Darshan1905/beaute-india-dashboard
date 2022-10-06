@extends('layouts.app')
@section('content')
<div class="container-fluid">
      <!-- Page Header -->
      <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Category</h2>
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
           
            <div class="card-header">Create Category
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
                    <a class="btn btn-primary" href="{{ route('categorys.index') }}">Back</a>
                </span>
            </div> 
            <div class="card-body">
            {!! Form::open(array('route' => 'categorys.store', 'method'=>'POST','enctype' => 'multipart/form-data')) !!}
            <div class="row">
            <div class="col-md-12">
                    <div class="form-group">
                        <strong>Category Name:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','required' =>'required')) !!}
                    </div>
                </div>    
                
                <div class="col-md-12">
                    <div class="form-group">
                        <strong>Category Description:</strong>
                        {!! Form::textarea('description', null, array('placeholder' => 'Category Description','class' => 'form-control','required' =>'required','value'=>'')) !!}
                    </div>
                </div>      
                <div class="col-md-3">
                    <div class="form-group">
                        <strong>Banner Image:</strong>
                        {!! Form::file('image', array('placeholder' => 'image','id' => 'image','class' => 'form-control','accept' =>'image/*','required' =>'required')) !!}
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