@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
        
        <div class="card">
            <div class="card-header">Edit Cusotmer Master 
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
                    <a class="btn btn-primary" href="{{ route('customermaster.index') }}">Back</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::model($post, ['route' => ['customermaster.update', $post->id], 'method'=>'PATCH']) !!}
                <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','required' =>'required')) !!}
                    </div>
                </div>   
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Business Address:</strong>
                        {!! Form::text('business_address', null, array('placeholder' => 'Business Address:','class' => 'form-control','required' =>'required')) !!}
                    </div>
                </div>   
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Communication Address:</strong>
                        {!! Form::text('communication_address', null, array('placeholder' => 'Communication Address','class' => 'form-control','required' =>'required')) !!}
                    </div>
                </div>   
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Contact:</strong>
                        {!! Form::text('contact', null, array('placeholder' => 'Contact','class' => 'form-control','required' =>'required')) !!}
                    </div>
                </div>   
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control','required' =>'required')) !!}
                    </div>
                </div>   
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Gst (optional):</strong>
                        {!! Form::text('gst', null, array('placeholder' => 'Gst','class' => 'form-control')) !!}
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