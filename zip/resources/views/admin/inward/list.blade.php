@extends('layouts.admin')
@section('title', 'Partial Inward List')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Partial Inward List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Partial Inward List</li>
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
                            <a href="{{ route('admin.inward.add') }}" class="btn btn-primary float-right">
                                Add Partial Inward
                            </a><br /><br />

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">ID</th>
                                        <th style="width: 5%;">Bale Number</th>
                                        <th style="width: 25%;">Jobber Name</th>
                                        <th style="width: 25%;">Quality</th>
                                        <th style="width: 25%;">Gate Pass </th>
                                        <th style="width: 25%;">Ware House</th>
                                        <th style="width: 15%;">Total Quantity</th>
                                        <th style="width: 15%;">Inwarded Quantity</th>
                                        <th style="width: 15%;">Remaining Quantity</th>

                                        <th style="width: 10%;">Download</th>
                                        <th style="width: 45%;"> Action</th>
                                        <th style="width: 45%;"> View Packaging</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inward as $ov)
                                        @php
                                            // Ensure packagingSlip exists before accessing color
                                            $total_quantity = $ov->packagingSlip->total_quantity ?? 0;

                                            // Sum all inwarded quantities for this packaging_id
                                            $inwarded_quantity = \App\Models\InwardItem::where('packaging_id', $ov->packaging_id)->sum('inward_quantity');

                                            // Calculate remaining quantity
                                            $remaining_quantity = max(0, $total_quantity - $inwarded_quantity);
                                        @endphp

                                        <tr>
                                            <td>{{ $ov->id }}</td>
                                            <td>#{{ $ov->packaging_id }}</td>
                                            <td>{{ $ov->packagingSlip->jober_name ?? 'N/A' }}</td>
                                            <td>{{ $ov->packagingSlip->quality ?? 'N/A' }}</td>
                                            <td>{{ $ov->gatePass->id ?? 'N/A' }}</td>
                                            <td>{{ $ov->warehouse->name ?? 'N/A' }}</td>
                                            <td>{{ $ov->packagingSlip->total_quantity ?? '' }}</td>
                                            <td>{{ $ov->inward_quantity ?? 'N/A'  }}</td>
                                            <td>{{ $remaining_quantity }}</td>
                                            <td>
                                                <a href="{{ route('admin.inward.inwardPass', base64_encode($ov->id)) }}">
                                                    <i style="font-size: 1.55rem;" class="mdi mdi-download"></i>
                                                </a>
                                            </td>
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