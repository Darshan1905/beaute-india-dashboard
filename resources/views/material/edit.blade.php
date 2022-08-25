@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
        
        <div class="card">
            <div class="card-header">Edit Material
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
                    <a class="btn btn-primary" href="{{ route('material.index') }}">Back</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::model($post, ['route' => ['material.update', $post->id], 'method'=>'PATCH']) !!}
                <div class="row">
                
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Material Name:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','required' =>'required')) !!}
                    </div>
                </div>  

                
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Material Description:</strong>
                        {!! Form::text('description', null, array('placeholder' => 'Material Description:','class' => 'form-control','required' =>'required')) !!}
                    </div>
                </div>   
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Category:</strong>
                        {!! Form::select('category_id', $category,null, array('class' => 'form-control')) !!}
                    </div>
                </div>  
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Sub Category:</strong>
                        {!! Form::select('subcategory_id', $subcategorie,null, array('class' => 'form-control','id'=>'sub_category')) !!}
                    </div>
                </div>  
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Bussiness:</strong>
                        {!! Form::select('business_id', $bussiness,null, array('class' => 'form-control')) !!}
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Brand:</strong>
                        {!! Form::select('brand_id', $brand,null, array('class' => 'form-control','id'=>'brand')) !!}
                    </div>
                </div>   
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>UOM Name:</strong>
                        {!! Form::select('uom_id', $uom,null, array('class' => 'form-control')) !!}
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