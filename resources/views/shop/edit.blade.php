@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
        
        <div class="card">
            <div class="card-header">Edit Shop 
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
                    <a class="btn btn-primary" href="{{ route('shop.index') }}">Back</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::model($post, ['route' => ['shop.update', $post->id], 'method'=>'PATCH']) !!}
            <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Name:</strong>
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Email:</strong>
                                {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                            </div>
                        </div>   
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Contact:</strong>
                                {!! Form::number('contact', null, array('placeholder' => 'Contact','class' => 'form-control')) !!}
                            </div>
                        </div>   

                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Shop Name:</strong>
                                {!! Form::text('shopname', null, array('placeholder' => 'Shop Name','class' => 'form-control','required')) !!}
                            </div>
                        </div>   
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Address:</strong>
                                {!! Form::textarea('address', null, array('placeholder' => 'Address','class' => 'form-control','required' =>'required')) !!}
                
                            </div>
                        </div>    
                         <div class="col-md-3">
                            <div class="form-group">
                                <strong>Shop Banner Image:</strong>
                                {!! Form::file('image', null, array('placeholder' => 'image','id' => 'image','class' => 'form-control')) !!}
                            </div>
                        </div>  
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Password:</strong>
                                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                            </div>
                        </div>    
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Confirm Password:</strong>
                                {!! Form::password('password_confirmation', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
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
    $(document).ready(function () {


        getStateFn = function () {
            var country_id = $('#country').val();
            $.ajax({
                type: "get",
                contentType: 'application/json',
                "url": "{{ route('state-list') }}",
                data:{country_id: country_id},
                success: function (res) {
                    $('#state').html('');
                    if (res) {
                        var states = res;
                        $.each(states, function () {
                            $("#state").append('<option value="' + this.id + '">' + this.name + '</option>');
                        });
                    } else {
                        $("#state").append('<option value="">Select state</option>');
                    }
                    getCityFn();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }


        getCityFn = function () {
            var state_id = $('#state').val();
            $.ajax({
                type: "get",
                contentType: 'application/json',
                "url": "{{ route('city-list') }}",
                data:{state_id: state_id},
                success: function (res) {
                    $('#city').html('');
                    if (res) {
                        var cities = res;
                        $.each(cities, function () {
                            $("#city").append('<option value="' + this.id + '">' + this.name + '</option>');
                        });
                    } else {
                        $("#city").append('<option value="">Select city</option>');
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    });
</script>
@endsection

