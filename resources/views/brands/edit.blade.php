@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
        
        <div class="card">
            <div class="card-header">Edit Brand 
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
                    <a class="btn btn-primary" href="{{ route('users.index') }}">Back</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::model($post, ['route' => ['brands.update', $post->id], 'method'=>'PATCH']) !!}
                <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                            <strong>Business:</strong>
                            {!! Form::select('business', $business,null, array('class' => 'form-control')) !!}
                        </div>   
                </div>   
                <div class="col-md-3">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','required' =>'required')) !!}
                    </div>
                </div>     
                <div class="col-md-3">
                    <div class="form-group">
                        <strong>Company Name:</strong>
                        {!! Form::text('companyname', null, array('placeholder' => 'Company Name','class' => 'form-control','required' =>'required')) !!}
                    </div>
                </div>    
                <div class="col-md-3">
                    <div class="form-group">
                        <strong>Brand Code:</strong>
                        {!! Form::text('brandcode', null, array('placeholder' => 'Brand Code','id' => 'brandcode','class' => 'form-control','required' =>'required')) !!}
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