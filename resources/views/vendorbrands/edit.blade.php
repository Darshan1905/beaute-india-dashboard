@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
        
        <div class="card">
            <div class="card-header">Edit Vendor Brand
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
                    <a class="btn btn-primary" href="{{ route('vendorbrands.index') }}">Back</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::model($post, ['route' => ['vendorbrands.update', $post->id], 'method'=>'PATCH']) !!}
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                            <strong>Vendor:</strong>
                            {!! Form::select('vendor_id', $vendor,null, array('class' => 'form-control','required')) !!}
                        </div>   
                </div>    
                <div class="col-md-6">
               
                    <div class="form-group">
                            <strong>Brand:</strong>
                            {!! Form::select('brand_id', $brand,null, array('class' => 'form-control','required')) !!}
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