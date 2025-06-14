@extends('layouts.admin')
@section('title', 'Add Vendor Category')
@section('content')
    <style>

    </style>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row" >
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Add Vendor Category</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">All Vendor
                                        Categories</a></li>
                                <li class="breadcrumb-item active">Add Vendor Category</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <form class="custom-validation" action="{{ route('admin.service.store') }}" method="post" id="vendorCategory"
                enctype="multipart/form-data">
                @csrf
                <div class="row" style="margin-bottom: 50px;">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <span style="color:red;float:right;" class="pull-right">* is mandatory</span>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Name<span class="mandatory">*</span></label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Name" required>
                                </div>
                                {{-- <div class="form-group mb-3">
                                    <label>Applicable Unit(s)<span class="mandatory">*</span></label>
                                    <select class="form-control select2" name="unit_ids[]" multiple="multiple" required>
                                        <option value="">Select Units</option>
                                        @forelse(\App\Models\Unit::all() as $ck => $cv)
                                            <option value="{{ $cv->id }}">{{ $cv->name }}</option>
                                        @empty
                                            <option value="">No units available</option>
                                        @endforelse
                                    </select>
                                    
                                </div> --}}
                                <div class="form-group mb-3">
                                    <label>Applicable Unit(s)<span class="mandatory">*</span></label>
                                    <div class="container" style="padding-right:0px;padding-left:0px;">
                                        <div class="custom-dropdown">
                                            <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton"
                                                style="border:1px solid #ced4da;" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                All
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <div class="px-3 py-2">
                                                    <input type="text" class="dropdown-search form-control mb-2"
                                                        id="dropdownSearch" placeholder="Search...">
                                                    <div id="checkboxContainer">
                                                        <!-- Dynamically populated checkboxes -->
                                                        @foreach ($units as $unit)
                                                            <label class="dropdown-item">
                                                                <input type="checkbox" name= units[] value="{{ $unit->id }}">
                                                                {{ $unit->name }}
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    
                                    <div class="button-items">
                                        <center>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1"
                                                name="btn_submit" value="save">
                                                Save
                                            </button>
                                            <a href="{{ url()->previous() }}" class="btn btn-danger waves-effect">
                                                Cancel
                                            </a>
                                        </center>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>

@endsection
