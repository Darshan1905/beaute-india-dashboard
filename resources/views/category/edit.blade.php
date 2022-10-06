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
                    <a class="btn btn-primary" href="{{ route('categorys.index') }}">Back</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::model($post, ['route' => ['categorys.update', $post->id], 'method'=>'PATCH','enctype' => 'multipart/form-data']) !!}
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
                        {!! Form::file('image', array('placeholder' => 'image','id' => 'image','class' => 'form-control','accept' =>'image/*')) !!}
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