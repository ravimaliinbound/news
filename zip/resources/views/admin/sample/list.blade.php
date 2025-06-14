@extends('layouts.admin')
@section('title', 'Sample List')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Sample List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Sample List</li>
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
                            <a href="{{ route('admin.sample.add') }}" class="btn btn-primary float-right">
                                Add Sample
                            </a><br /><br />

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 20%;">ID</th>
                                        <th style="width: 20%;">Name</th>
                                        <th style="width: 20%;">Quantity</th>
                                        <th style="width: 20%;">Quality</th>
                                        <th style="width: 20%;">Download</th>
                                        <th style="width: 45%;"> Action</th>
                                        <th style="width: 45%;"> View Packaging</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inward as $ov)
                                        <tr>
                                            <td>{{ $ov->id }}</td>
                                            <td>{{ $ov->name }}</td>
                                            <td>{{ $ov->quantity }}</td>
                                            <td>{{ $ov->quality }}</td>
                                            <td>
                                                <a href="{{ route('admin.sample.samplePass', base64_encode($ov->id)) }}">
                                                    <i style="font-size: 1.55rem;" class="mdi mdi-download"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="edit/{{ $ov->id     }}" class="btn btn-primary waves-effect waves-light">Edit</a>
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