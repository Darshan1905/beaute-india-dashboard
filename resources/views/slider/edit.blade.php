@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
        
        <div class="card">
            <div class="card-header">Edit Slider 
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
                {!! Form::model($post, ['route' => ['sliders.update', $post->id], 'method'=>'PATCH']) !!}
                  <div class="row">
                     <div class="col-md-3">
                        <div class="form-group">
                            <strong>Image:</strong>
                            {!! Form::file('image', null, array('placeholder' => 'image','id' => 'image','class' => 'form-control')) !!}
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