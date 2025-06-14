@extends('layouts.admin')
@section('title', 'Edit User')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Edit User</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.vendor.list') }}">All User List</a>
                                </li>
                                <li class="breadcrumb-item active">Edit User</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <form class="custom-validation" action="{{ route('admin.saveEditedVendor') }}" method="post"
                id="editVendor" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $vendor->id }}" id="id" />
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <span style="color:red;float:right;" class="pull-right">* is mandatory</span>
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">First Name<span
                                            class="mandatory red">*</span></label>
                                    <input type="text" class="form-control" name="first_name" id="name"
                                        placeholder="Enter Name" value="{{ $vendor->first_name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Last Name<span
                                            class="mandatory red">*</span></label>
                                    <input type="text" class="form-control" name="last_name" id="name"
                                        placeholder="Enter Name" value="{{ $vendor->last_name }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="contactPersonEmail" class="form-label">Email<span
                                            class="mandatory red">*</span></label>
                                    <input type="email" class="form-control" name="email"
                                        id="contactPersonEmail" placeholder="Contact Person Email"
                                        value="{{ $vendor->email }}"  required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password<span class="mandatory red"></span></label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" >
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">
                                        Category<span class="mandatory red">*</span>
                                    </label>
                                    <select class="form-control select2" name="category_id" data-placeholder="Select Category" required>
                                        <option value="" disabled selected>Select Category</option> <!-- First option as 'Select Category' -->
                                        @forelse(\App\Models\Category::where('is_active', 1)->where('is_delete', 0)->get() as $sk => $sv)
                                            <option value="{{ $sv->id }}"
                                                {{-- Check if the vendor's category_id matches the current category --}}
                                                {{ isset($vendor) && $vendor->category_id == $sv->id ? 'selected' : '' }}>
                                                {{ $sv->name }}
                                            </option>
                                        @empty
                                            <option disabled>No categories available</option>
                                        @endforelse
                                    </select>
                                    
                                </div>
                                

                                <div class="button-items">
                                    <center>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1"
                                            name="btn_submit" value="save">
                                            Update
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
