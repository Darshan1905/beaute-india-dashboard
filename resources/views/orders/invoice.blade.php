@extends('layouts.app2')
@section('content')
<div class="container-fluid">
                        <!-- Page Header -->
    <div class="page-header">
        <div>
           
        </div>
    </div>
    <!-- End Page Header -->
                        <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="d-lg-flex">
                        <h2 class="card-title mb-1">#INV00{{ $post->id }}</h2>
                        <div class="ml-auto">
                            <p class="mb-1"><span class="font-weight-bold">Invoice Date :</span> {{ date('d-M-Y',strtotime($post->created_at));  }}</p>
                            <!-- <p class="mb-0"><span class="font-weight-bold">Due Date :</span> 01 May  2020</p> -->
                        </div>
                    </div>
                    <hr class="mg-b-40">
                    <div class="row">
                        <div class="col-lg-6">
                            <p class="h3">Invoice Form:</p>
                            <address>
                                Street Address<br>
                                State, City<br>
                                Region, Postal Code<br>
                                yourdomain@example.com
                            </address>
                        </div>
                        <div class="col-lg-6 text-right">
                            <p class="h3">Invoice To:</p>
                            <address>
                                Street Address<br>
                                State, City<br>
                                Region, Postal Code<br>
                                ypurdomain@example.com
                            </address>
                        </div>
                    </div>
                    <div class="table-responsive mg-t-40">
                        <table class="table table-invoice table-bordered">
                            <thead>
                                <tr>
                                    <th class="wd-50p">Product</th>
                                    <!-- <th class="wd-40p">Description</th> -->
                                    <th class="tx-center">QNTY</th>
                                    <th class="tx-right">Unit</th>
                                    <th class="tx-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($product)
                                @foreach ($product as $key => $value)
                                <tr>
                                    <td>{{ $value['product_detail']->name }}</td>
                                    <!-- <td class="tx-12">Logo and business cards design</td> -->
                                    <td class="tx-center">{{ $value['order_quantity'] }}</td>
                                    <td class="tx-right">{{ number_format($value['unit_price'],2) }}</td>
                                    <td class="tx-right">{{ number_format($value['subtotal'],2)}}</td>
                                </tr>
                                @endforeach
                                @endif
                                
                                <tr>
                                    <td class="valign-middle" colspan="2" rowspan="4">
                                        <div class="invoice-notes"></div><!-- invoice-notes -->
                                    </td>
                                    <td class="tx-right">Sub-Total</td>
                                    <td class="tx-right" colspan="2">{{ number_format($post->amount) }}</td>
                                </tr>
                                <tr>
                                    <td class="tx-right">Sales Tax</td>
                                    <td class="tx-right" colspan="2">{{ number_format($post->sales_tax) }}</td>
                                </tr>
                                <tr>
                                    <td class="tx-right">Discount</td>
                                    <td class="tx-right" colspan="2">{{ number_format($post->discount) }}</td>
                                </tr>
                                <tr>
                                    <td class="tx-right tx-uppercase tx-bold tx-inverse">Total Due</td>
                                    <td class="tx-right" colspan="2">
                                        <h4 class="tx-bold">{{ number_format($post->total) }}</h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <!-- <button type="button" class="btn ripple btn-primary mb-1"><i class="fe fe-credit-card mr-1"></i> Pay Invoice</button> -->
                    <!-- <button type="button" class="btn ripple btn-secondary mb-1"><i class="fe fe-send mr-1"></i> Send Invoice</button> -->
                    <button type="button" class="btn ripple btn-info mb-1" onclick="javascript:window.print();"><i class="fe fe-printer mr-1"></i> Print Invoice</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

    </div>
    </div>
@endsection
@section('scripts')
<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
<script>
        CKEDITOR.replace( 'short_description' );
        CKEDITOR.replace( 'long_description' );
</script>
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
$('#code').val(makeid(2));
</script>

<script>
    $(document).ready(function () {

        getVendorFn = function () {
            var shop_id = $('#shop_id').val();
            $.ajax({
                type: "get",
                contentType: 'application/json',
                "url": "{{ route('fetch-vendor') }}",
                data:{shop_id: shop_id},
                success: function (res) {
                    $('#vendor_id').html('');
                    if (res != '') {
                        var states = res;
                        $.each(states, function () {
                            $("#vendor_id").append('<option value="' + this.id + '">' + this.name + '</option>');
                        });
                    } else {
                        $("#vendor_id").append('<option value="">Select Vendor</option>');
                    }
                    getCityFn();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

      
        
    });

    $(window).on('load',function(){

getVendorFn();
    })
</script>
@endsection