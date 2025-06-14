@extends('layouts.admin')
@section('title','Add Inquiry')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Add Inquiry</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Inquiry</li>
                        </ol>
                    </div>
                    
                </div>
            </div>
        </div>     
        <!-- end page title -->

        <!-- end row -->
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <span style="color:red;float:right;" class="pull-right">* is mandatory</span><br />
                        </div>
                        <form class="custom-validation" action="{{ route('admin.postExhibitorInquiry') }}" method="post" id="addExhibitorInquiry" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="mb-3">
                                <label>Company Name<span class="mandatory">*</span></label>
                                <input type="text" class="form-control" name="company_name" id="name" placeholder="Enter Name" required>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Country<span class="mandatory red">*</span></label>
                                <select class="form-control select2" name="country_id" required>
                                    <option value="">Select Country</option>
                                    @forelse(\App\Models\Country::all() as $ck => $cv)
                                        <option value="{{ $cv->id }}" {{ $cv->id == 99 ? 'selected' : '' }}>{{ $cv->nicename }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Contact Person Name(For Plexpo 2024)<span class="mandatory">*</span></label>
                                <input type="text" class="form-control" name="contact_person" id="contactPerson" placeholder="Contact Person Name" required>
                            </div>

                            <div class="mb-3">
                                <label>Contact Person Mobile Number(For Plexpo 2024)<span class="mandatory">*</span></label>
                                <input type="text" class="form-control numeric" name="mobile_number" id="mobileNumber" placeholder="Contact Person Mobile Number" required>
                            </div>

                            <div class="mb-3">
                                <label>Email<span class="mandatory">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off" required/>
                            </div>

                            <div class="mb-3">
                                <label>Exhibitor Type<span class="mandatory">*</span></label>
                                <select class="form-select" name="exhibitor_type" required>
                                    <option value="">Select Exhibitor Type</option>
                                    <option value="EXHIBITOR">Normal Exhibitor</option>
                                    <option value="ASSOCIATION">Association</option>
                                    <option value="MEDIA">Media</option>
                                    <option value="SPONSOR">Sponsor</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Reference by</label>
                                <input type="text" class="form-control" name="reference_by" placeholder="Reference by" >
                            </div>

                            <div class="mb-3">
                                <label>Remarks</label>
                                <textarea class="form-control" name="remarks" placeholder="Remarks"></textarea>
                            </div>

                            <div class="button-items">
                                <center>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1" name="btn_submit" value="save">
                                        Submit
                                    </button>
                                    <a href="" class="btn btn-danger waves-effect">
                                        Cancel
                                    </a>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
