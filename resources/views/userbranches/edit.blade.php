@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
        
        <div class="card">
            <div class="card-header">Edit User Branch 
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
                    <a class="btn btn-primary" href="{{ route('userbranches.index') }}">Back</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::model($post, ['route' => ['userbranches.update', $post->id], 'method'=>'PATCH']) !!}
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                            <strong>Branch:</strong>
                            {!! Form::select('branch_id', $branch,null, array('class' => 'form-control')) !!}
                        </div>   
                </div>    
                <div class="col-md-6">
               
                    <div class="form-group">
                            <strong>User:</strong>
                            {!! Form::select('user_id', $user,null, array('class' => 'form-control')) !!}
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
                        {!! Form::select('state_id', $state,null, array('placeholder' => 'Select State','id' => 'state','class' => 'form-control','required','onchange' => "getCityFn()")) !!}
                    </div>   
                </div>   
                <div class="col-md-3">
                    <div class="form-group">
                        <strong>City:</strong>
                        {!! Form::select('city',$city,null, array('placeholder' => 'Select City','id' => 'city','class' => 'form-control','required')) !!}
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
