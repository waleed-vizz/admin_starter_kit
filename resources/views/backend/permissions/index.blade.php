
@extends('layouts.backend.main')

@section('title')
permission Page - Admin Panel
@endsection

@section('styles')

@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Permissions</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>All Permissions</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('partials.backend.logout')
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left">Permissions List</h4>
                    <p class="float-right mb-2">
                        {{-- @if (Auth::guard('admin')->user()->can('permission.create')) --}}
                            <a class="btn btn-primary text-white" href="{{ route('admin.permissions.create') }}">Create New Permission</a>
                        {{-- @endif --}}
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        @include('partials.backend.messages')
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="5%">Sl</th>
                                    <th width="10%">Name</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($permissions as $permission)
                               <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        {{-- @if (Auth::guard('admin')->user()->can('admin.edit')) --}}
                                            <a class="btn btn-success text-white" href="{{ route('admin.permissions.update', $permission) }}">Edit</a>
                                        {{-- @endif --}}

                                        {{-- @if (Auth::guard('admin')->user()->can('admin.edit')) --}}
                                            <a class="btn btn-danger text-white" href="{{ route('admin.permissions.delete', $permission) }}">
                                                Delete
                                            </a>
                                        {{-- @endif --}}
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->

    </div>
</div>
@endsection


@section('scripts')
     <!-- Start datatable js -->
    

     <script>
         /*================================
        datatable active
        ==================================*/
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }

     </script>
@endsection
