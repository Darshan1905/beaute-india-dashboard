@extends('layouts.app')
@section('content')
<div class="container-fluid">
      <!-- Page Header -->
      <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Orders</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Orders</li>
            </ol>
        </div>
        
    </div>
    <!-- End Page Header -->

    <!-- Row-->
    <div class="row">
        <div class="col-sm-12 col-xl-12 col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                   
                        <h6 class="card-title mb-1">Orders</h6>
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ \Session::get('success') }}</p>
                            </div>
                        @endif
                        
                    </div>
                    <div class="table-responsive">

                    <table id="exportexample1" class="table-bordered text-nowrap mb-0 table table-bordered border-t0 key-buttons text-nowrap w-100" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order No.</th>
                                <th>Date</th>
                                <th>Store</th>
                                <th>Shipping Charges</th>
                                <th>Discount</th>
                                <th>Total Amount</th>
                                <th>Coupon Code</th>
                                <th>Payment Method</th>
                                <th>Billing Address</th>
                                <th>Shipping Address</th>
                                <th>Status</th>
                                <th>brands</th>
                                <th>Product_name</th>
                                <th>Product quantity</th>
                                <th>sku_no</th>
                                <th>Sales Price</th>
                                <th>product</th>
                                <th>cutomer_name</th>
                                <th>cutomer_email</th>
                                <th>cutomer_contact</th>
                                <th>shipping_charges</th>
                                <th>address</th>
                                <th>states</th>
                                <th>cites</th>
                                <th>discount</th>
                                <th>coupon_code</th>
                                <th>Payment type</th>
                                <th>unit_price</th>
                               
                                <th>Address Pincode</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                        
                        </tbody>
                    </table>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

    </div>
	
    <!-- Excel Import modal -->
    <div class="modal" id="modaldemo1">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <form enctype="multipart/form-data" action="{{ route('import') }}" id="importfile" method="POST">
                @csrf
                <div class="modal-header">
                    <h6 class="modal-title">Product Excel Import</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row row-sm">
                        <div class="col-lg">
                            <select class="form-control" name="category_id" required>
                                @if($category)
                                @foreach ($category as $key => $value)
                                     <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-lg">
                            <input class="form-control" name="file" placeholder="Input box" type="file">
                            <a href="{{ URL::to('/') }}/public/products.xlsx" download="">Example Product Excel File</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary" type="submit">Import</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                </div>
               </form>
               
            </div>
        </div>
    </div>
    <!-- End  Excel Import modal -->

@endsection


@section('scripts')
<!-- Data Table js -->
<script src="{{ URL::to('/') }}/assets/plugins/datatable/jquery.dataTables.min.js"></script>
<script src="{{ URL::to('/') }}/assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
<script src="{{ URL::to('/') }}/assets/js/table-data.js"></script>
<script src="{{ URL::to('/') }}/assets/plugins/datatable/dataTables.responsive.min.js"></script>
<script src="{{ URL::to('/') }}/assets/plugins/datatable/fileexport/dataTables.buttons.min.js"></script>
<script src="{{ URL::to('/') }}/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js"></script>
<script src="{{ URL::to('/') }}/assets/plugins/datatable/fileexport/jszip.min.js"></script>
<script src="{{ URL::to('/') }}/assets/plugins/datatable/fileexport/pdfmake.min.js"></script>
<script src="{{ URL::to('/') }}/assets/plugins/datatable/fileexport/vfs_fonts.js"></script>
<script src="{{ URL::to('/') }}/assets/plugins/datatable/fileexport/buttons.html5.min.js"></script>
<script src="{{ URL::to('/') }}/assets/plugins/datatable/fileexport/buttons.print.min.js"></script>
<script src="{{ URL::to('/') }}/assets/plugins/datatable/fileexport/buttons.colVis.min.js"></script>

 <script>
    var table = '';
    $(document).ready(function () {

        table = $('#exportexample1').DataTable({
            dom: 'lBrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],

            lengthMenu: [[25, 100, -1], [25, 100, "All"]],
            processing: true,
            responsive: true,
            serverSide: true,
            ajax: {
                "url": "{{ route('orders-list') }}",
                "type": "get",
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'id', name: 'id'},
                {data: 'created_at', name: 'created_at'},
                {data: 'shop_id', name: 'shop_id'},
                {data: 'sales_tax', name: 'sales_tax'},
                {data: 'discount', name: 'discount'},
                {data: 'total', name: 'total'},
                {data: 'coupon_id', name: 'coupon_id'},
                {data: 'payment_gateway', name: 'payment_gateway'},
                {data: 'shipping_address', name: 'shipping_address'},
                {data: 'billing_address', name: 'billing_address'},
                {data: 'brands', name: 'brands'},
                {data: 'status', name: 'status'},
                // {data: 'product_name', name: 'product_name'},
                {data: 'product_quantity', name: 'product_quantity'},
                {data: 'sku_no', name: 'sku_no'},
                {data: 'sale_price', name: 'sale_price'},
                {data: 'product', name: 'product'}, 
                {data: 'customer_name', name: 'customer_name'},
                {data: 'customer_email', name: 'customer_email'},
                {data: 'customer_contact', name: 'customer_contact'}, 
                {data: 'shipping_charges', name: 'shipping_charges'}, 
                {data: 'address', name: 'address'}, 
                {data: 'state', name: 'state'}, 
                {data: 'cities', name: 'cities'}, 
                {data: 'discount', name: 'discount'}, 
                {data: 'coupon_code', name: 'coupon_code'}, 
                {data: 'price mrp', name: 'normal_price'}, 
                {data: 'payment method', name: 'type'}, 
                {data: 'order_product', name: 'order_product'}, 
                {data: 'action', name: 'action', orderable: false, searchable: false},
                
            
            ],
            "fnDrawCallback": function () {
            }
        });
    });


</script>

@endsection
