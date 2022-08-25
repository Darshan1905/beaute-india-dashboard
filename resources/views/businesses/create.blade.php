@extends('layouts.app')
@section('content')
<div class="container-fluid">
      <!-- Page Header -->
      <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Bussiness</h2>
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
           
            <div class="card-header">Create Bussiness
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
                    <a class="btn btn-primary" href="{{ route('businesses.index') }}">Back</a>
                </span>
            </div>
            <div class="card-body">
            {!! Form::open(array('route' => 'businesses.store', 'method'=>'POST','enctype' => 'multipart/form-data')) !!}
            <div class="row">
            <div class="col-md-6">
                    <div class="form-group">
                        <strong>Industry Segment:</strong>
                        {!! Form::select('industrysegment_id', $industrysegment,null, array('class' => 'form-control')) !!}
                    </div>
                </div>    
                
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','required' =>'required')) !!}
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
                        <strong>Country:</strong>
                        {!! Form::select('country_id', $countries,null, array('placeholder' => 'Select Country','id' => 'country','class' => 'form-control','required')) !!}
                    </div>   
                </div>  
                <div class="col-md-3">
                    <div class="form-group">
                        <strong>State:</strong>
                        {!! Form::select('state_id', [],null, array('placeholder' => 'Select State','id' => 'state','class' => 'form-control','required')) !!}
                    </div>   
                </div>   
                <div class="col-md-3">
                    <div class="form-group">
                        <strong>City:</strong>
                        {!! Form::select('city',[],null, array('placeholder' => 'Select City','id' => 'city','class' => 'form-control','required')) !!}
                    </div>   
                </div>   

                <div class="col-md-3">
                    <div class="form-group">
                        <strong>Contact:</strong>
                        {!! Form::number('contact', null, array('placeholder' => 'Contact','class' => 'form-control','required' =>'required')) !!}
                    </div>
                </div> 
                   

                <div class="col-md-3">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control','required' =>'required')) !!}
                    </div>
                </div> 
                   

                <div class="col-md-3">
                    <div class="form-group">
                        <strong>CIN:</strong>
                        {!! Form::number('cin', null, array('placeholder' => 'CIN','class' => 'form-control')) !!}
                    </div>
                </div> 
                   

                <div class="col-md-3">
                    <div class="form-group">
                        <strong>GST:</strong>
                        {!! Form::number('gst', null, array('placeholder' => 'GST','class' => 'form-control')) !!}
                    </div>
                </div> 
                   

                <div class="col-md-3">
                    <div class="form-group">
                        <strong>LOGO:</strong>
                        {!! Form::file('logo', null, array('placeholder' => 'LOGO','class' => 'form-control','required' =>'required')) !!}
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
$('#brandcode').val(makeid(3));
</script>

<script>
    $(document).on('change','#country',function(e){
        e.preventDefault();
        var country_id = $(this).val();
            $.ajax({
                type: "get",
                contentType: 'application/json',
                "url": "{{ route('state-list') }}",
                data:{country_id: country_id},
                success: function (res) {
                    console.log(res);
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
    })

    
    $(document).on('change','#state',function(e){
        var state_id = $(this).val();
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
    })

</script>
@endsection
