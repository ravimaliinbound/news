@extends('layouts.admin')
@section('title', 'Add User')
@section('content')
    <style>

    </style>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Add User</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.vendor.list') }}">All User
                                    </a></li>
                                <li class="breadcrumb-item active">Add User</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <form class="custom-validation" action="{{ route('admin.vendor.createPost') }}" method="post"
                id="vendorCategory" enctype="multipart/form-data">
                @csrf
                <div class="row" style="margin-bottom: 50px;">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <span style="color:red;float:right;" class="pull-right">* is mandatory</span>
                                </div>

                                <div class="form-group mb-3">
                                    <label>First Name<span class="mandatory">*</span></label>
                                    <input type="text" name="first_name" class="form-control" id="first-name"
                                        placeholder="First Name" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Last Name<span class="mandatory">*</span></label>
                                    <input type="text" name="last_name" class="form-control" id="first-name"
                                        placeholder="Last Name" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Email<span class="mandatory">*</span></label>
                                    <input type="text" name="email" class="form-control" id="email"
                                        placeholder="Email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="state" class="form-label">Category<span
                                            class="mandatory red">*</span></label>
                                    <select class="form-control" name="category_id" id="state" required>
                                        <option value="">Select Categories</option>
                                        @forelse(\App\Models\Category::where('is_delete', 0)->get() as $sk => $sv)
                                            <option value="{{ $sv->id }}">{{ $sv->name }}</option>
                                        @empty
                                            <option disabled>No categories available</option>
                                        @endforelse

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password<span class="mandatory red">*</span></label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Enter password" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Certificates <span class="mandatory">*</span></label>
                                    <input type="file" name="certificates[]" class="form-control" id="certificate"
                                           placeholder="Upload Certificates" multiple accept=".jpg,.jpeg,.pdf" required>
                                    <small class="text-muted">Only JPG and PDF formats are allowed.</small>
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
