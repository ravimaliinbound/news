@extends('layouts.admin')
@section('title', 'All UserCategories')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">All UserCategories</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">All UserCategories</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('admin.service.create') }}" class="btn btn-primary float-right">Add Vendor
                                Category</a><br /><br /><br />
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sr. No</th>
                                        <th>Name</th>
                                        <th>units</th>
                                        <th class='notexport'>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!is_null($service))
                                        @foreach ($service as $ok => $ov)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $ov->name }}</td>
                                                <td>{{ $ov->applicable_unit }}</td>

                                                <td>
                                                    <a class="btn btn-primary waves-effect waves-light"
                                                        href="{{ route('admin.service.edit', base64_encode($ov->id)) }}"
                                                        role="button">
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger waves-effect waves-light"
                                                        href="{{ route('admin.service.delete', base64_encode($ov->id)) }}"
                                                        role="button"
                                                        onclick="return confirm('Do you want to delete this Usercategory?');">
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
@endsection
