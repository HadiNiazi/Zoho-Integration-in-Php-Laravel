@extends('layouts.auth')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/admin-assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Create Plan
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> Plans</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <a class="btn btn-info" href="{{ url()->previous() }}">Go Back</a>
                    <div class="body">
                        <div class="table-responsive">
                            <b>Customer Name: </b> {{ $customer['display_name'] }} <br>
                            <b>Customer Email: </b> {{ $customer['email'] }} <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
    </div>
</section>
@endsection

@section('scripts')
{{-- <script src="{{ asset('assets/admin-assets/bundles/mainscripts.bundle.js') }}"></script><!-- Custom Js --> --}}
<script src="{{ asset('assets/admin-assets/bundles/datatablescripts.bundle.js') }}"></script>
<script>
    var table = $('.customers-dataTable').DataTable();
</script>
@endsection
