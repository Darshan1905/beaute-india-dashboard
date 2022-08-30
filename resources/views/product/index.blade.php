@extends('layouts.app')
@section('content')
<div class="container-fluid">
      <!-- Page Header -->
      <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Product</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product</li>
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
                   
                        <h6 class="card-title mb-1">Product</h6>
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ \Session::get('success') }}</p>
                            </div>
                        @endif
                        @can('role-create')
                            <span class="float-left">
                                <a class="btn btn-success" data-target="#modaldemo1" data-toggle="modal" href="javascript: void(0);">Import Bulk Products</a>
                            </span>
                            <span class="float-right">
                                <a class="btn btn-primary" href="{{ route('product.create') }}">Create Product</a>
                            </span>
                        @endcan
                    </div>
                    <div class="table-responsive">

                    <table id="exportexample1" class="table-bordered text-nowrap mb-0 table table-bordered border-t0 key-buttons text-nowrap w-100" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>SKU No.</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>MRP</th>
                                <th>Sale Price</th>
                                <th>QTY</th>
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
            processing: true,
            responsive: true,
            serverSide: true,
            ajax: {
                "url": "{{ route('product-list') }}",
                "type": "get",
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'sku_no', name: 'sku_no'},
                {data: 'image', name: 'image'},
                {data: 'category', name: 'category'},
                {data: 'name', name: 'name'},
                {data: 'normal_price', name: 'normal_price'},
                {data: 'sale_price', name: 'sale_price'},
                {data: 'inventory_count', name: 'inventory_count'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            "fnDrawCallback": function () {
            }
        });
    });


</script>
@endsection
