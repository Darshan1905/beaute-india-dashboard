@extends('layouts.app')
@section('content')
<div class="container-fluid">
      <!-- Page Header -->
      <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Vendor Brand</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Vendor Brand</li>
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
                   
                        <h6 class="card-title mb-1">Vendor Brand</h6>
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ \Session::get('success') }}</p>
                            </div>
                        @endif
                        @can('role-create')
                            <span class="float-right">
                                <a class="btn btn-primary" href="{{ route('vendorbrands.create') }}">Create Vendor Brand</a>
                            </span>
                        @endcan
                    </div>
                    <div class="table-responsive">
                    <table id="exportexample1" class="table-bordered text-nowrap mb-0 table table-bordered border-t0 key-buttons text-nowrap w-100" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Vendor</th>
                                <th>Brand</th>
                                <th>Status</th>
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
                "url": "{{ route('vendorbrands-list') }}",
                "type": "get",
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'vendor', name: 'vendor'},
                {data: 'brand', name: 'brand'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            "fnDrawCallback": function () {
            }
        });
    });


</script>
@endsection
