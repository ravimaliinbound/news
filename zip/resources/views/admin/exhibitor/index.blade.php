@extends('layouts.admin')
@section('title','Inquiry List')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Inquiry List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Inquiry List</li>
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
                        <a href="{{ route('admin.generateExhibitorList') }}" class="btn btn-primary">Generate Excel</a>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Company Name</th>
                                    <th>Contact Person Name</th>
                                    <th>Contact Person Mobile</th>
                                    <th>Email</th>
                                    <th>Country</th>
                                    <th>Reference By</th>
                                    <th>User IP</th>
                                    <th>Remarks</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(!is_null($exhibitor))
                                @foreach($exhibitor as $ok => $ov)
                                    <tr>
                                        <td>{{ $ov->id }}</td>
                                        <td>{{ $ov->company_name }}</td>
                                        <td>{{ $ov->contact_person_name }}</td>
                                        <td>{{ $ov->contact_person_mobile }}</td>
                                        <td>{{ $ov->email }}</td>
                                        <td>{{ !is_null($ov->country) ? $ov->country->name : '--' }}</td>
                                        <td>{{ $ov->reference }}</td>
                                        <td>{{ $ov->user_ip ?? '--' }}</td>
                                        <td>{{ $ov->remarks }}</td>
                                        <td>
                                            <a href="{{ route('admin.deleteInquiry',base64_encode($ov->id)) }}" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this inquiry?')">Delete Inquiry</a>
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