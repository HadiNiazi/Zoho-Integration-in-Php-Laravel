@extends('layouts.auth')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/admin-assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css') }}">
<style>
#outer
{
    width: auto;
    text-align: center;
}
#inner
{
    display: inline-block;
}
</style>
@endsection

@section('content')
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Users
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> Users</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <a href="{{ route('customers.create') }}" class="btn btn-info">Add Customer</a>
                    </div>

                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover customers-dataTable">
                                <thead>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>

                                       @if (count($customers) > 0)
                                           @foreach ($customers as $customer)
                                           <tr>
                                               <td>{{ $customer['display_name'] }}</td>
                                               <td>{{ $customer['email'] }}</td>
                                               <td>{{ $customer['status'] }}</td>
                                               <td id="outer">
                                                   <a id="inner" href="{{ route('customers.show', $customer['customer_id']) }}"><i class="fa fa-eye"></i></a>
                                                   <a id="inner" href="{{ route('customers.edit', $customer['customer_id']) }}"><i class="fa fa-edit"></i></a>
                                                   <form id="inner" method="post" action="{{ route('customers.destroy', $customer['customer_id']) }}">
                                                    @method('DELETE')
                                                        <button><i style="color: red" class="fa fa-trash"></i></button>
                                                   </form>
                                               </td>
                                            </tr>
                                           @endforeach
                                       @endif

                                </tbody>
                            </table>
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
<script>
    $(document).ready(function() {
        $('#add_new_button').click(function() {
            // var path = "";
            // window.location.href = path;
        });
    });
</script>
@endsection
