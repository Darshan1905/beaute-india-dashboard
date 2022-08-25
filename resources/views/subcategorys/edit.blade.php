@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
        
        <div class="card">
            <div class="card-header">Edit Branch 
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
                    <a class="btn btn-primary" href="{{ route('subcategorys.index') }}">Back</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::model($post, ['route' => ['subcategorys.update', $post->id], 'method'=>'PATCH']) !!}
                <div class="row">
        
                <div class="col-md-3">
                    <div class="form-group">
                        <strong>Sub Category Name:</strong>
                        {!! Form::text('sub_category_name', null, array('placeholder' => 'Sub Category Name','class' => 'form-control','required' =>'required')) !!}
                    </div>
                </div>    
                <div class="col-md-3">
                    <div class="form-group">
                        <strong>Sub Category Code:</strong>
                    
                        {!! Form::text('sub_category_code', null, array('placeholder' => 'Sub category code','class' => 'form-control','required' =>'required')) !!}
                      
                    </div>
                </div> 
            <div class="col-md-3">
                    <div class="form-group">
                        <strong>Bussiness:</strong>
                        {!! Form::select('bussiness_id', $business,null, array('class' => 'form-control')) !!}
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