@extends('layouts.admin')
@section('title', 'Inquiry List')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">warehouse list</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">warehouse list</li>
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
                            <div class="mb-3">
                                <a href="{{ route('admin.warehouse.add') }}" class="btn btn-primary float-right">
                                    Add warehouse
                                </a><br /><br />
                            </div>
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 20%;">ID</th>
                                        <th style="width: 80%;">Name</th>
                                        <th style="width: 45%;"> Action</th>
                                        <th style="width: 45%;"> View Packaging</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($warehouse as $ov)
                                        <tr>
                                            <td>{{ $ov->id }}</td>
                                            <td>{{ $ov->name }}</td>
                                            <td>
                                                <a href="edit/{{ $ov->id }}" class="btn btn-primary waves-effect waves-light">Edit</a>
                                                <a href="delete/{{ $ov->id }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger waves-effect waves-light">Delete</a>
                                            </td>
                                            <td>
                                                <a href="" class="text-primary waves-effect waves-light my-2">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>

@endsection