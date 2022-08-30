@extends('layouts.app')
@section('content')
<div class="container-fluid">
      <!-- Page Header -->
      <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Vendor</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Vendor</li>
            </ol>
        </div>
        
    </div>
    <!-- End Page Header -->

    <!-- Row-->
    <div class="row">
        <div class="col-sm-12 col-xl-12 col-lg-12">
            <div class="card custom-card">
           
            <div class="card-header">Create Vendor
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
                    <a class="btn btn-primary" href="{{ route('vendors.index') }}">Back</a>
                </span>
            </div>
            <div class="card-body">
            {!! Form::open(array('route' => 'vendors.store', 'method'=>'POST','enctype' => 'multipart/form-data')) !!}
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <strong>Shop:</strong>
                        {!! Form::select('shop_id', $shop,null, array('class' => 'form-control')) !!}
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
                
                <div class="col-md-12">
                    <div class="form-group">
                        <strong>Address:</strong>
                        {!! Form::textarea('address', null, array('placeholder' => 'Address','class' => 'form-control','required' =>'required')) !!}
                    </div>
                </div>
                  
                <div class="col-md-3">
                    <div class="form-group">
                        <strong>Country:</strong>
                        {!! Form::select('country_id', $countries,null, array('placeholder' => 'Select Country','id' => 'country','class' => 'form-control','required', 'onchange' => "getStateFn()")) !!}
                     </div>   
                </div>  
                <div class="col-md-3">
                    <div class="form-group">
                        <strong>State:</strong>
                        {!! Form::select('state_id', [],null, array('placeholder' => 'Select State','id' => 'state','class' => 'form-control','required','onchange' => "getCityFn()")) !!}
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
                        <strong>Pincode:</strong>
                        {!! Form::number('pincode', null, array('placeholder' => 'Pincode','class' => 'form-control','required' =>'required')) !!}
                    </div>
                </div>  
                <div class="col-md-3">
                    <div class="form-group">
                        <strong>PDF:</strong>
                        {!! Form::file('pdf', null, array('class' => 'form-control','required' =>'required')) !!}
                    </div>
                </div>    
                <div class="col-md-3">
                    <div class="form-group">
                        <strong>PAN:</strong>
                        {!! Form::text('pan', null, array('placeholder' => 'PAN','class' => 'form-control')) !!}
                    </div>
                </div>   
                
                <div class="col-md-3">
                    <div class="form-group">
                        <strong>GST:</strong>
                        {!! Form::text('gst', null, array('placeholder' => 'GST','class' => 'form-control')) !!}
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
