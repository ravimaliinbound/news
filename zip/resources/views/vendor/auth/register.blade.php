@extends('layouts.login')
@section('title','UserRegistration')
@section('content')
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-5">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Welcome Back!</h5>
                                    <p> .</p>
                                </div>
                            </div>
                            <div class="col-7 mt-5">
                                <img src="{{ asset('/') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0"> 
                        <div class="auth-logo">
                            <a href="{{ route('vendor.login') }}" class="auth-logo-dark">
                                <div class="avatar-md profile-user-wid">
                                    <!-- <span class="avatar-title rounded-circle bg-light">
                                        <img src="{{ asset('images//') }}" alt="" class="" height="60">
                                    </span> -->
                                </div>
                            </a>
                        </div>
                        <div class="p-2 mt-2">
                            <form class="form-horizontal" action="{{ route('vendor.postRegister') }}" id="vendorRegistration" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="recaptcha" id="recaptcha">
                                <div class="form-group">
                                    <span style="color:red;float:right;" class="pull-right">* is mandatory</span>
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">UserCompany Name<span class="mandatory red">*</span></label>
                                    <input type="text" class="form-control" name="company_name" id="name" placeholder="Enter Name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Address<span class="mandatory red">*</span></label>
                                    <textarea class="form-control" name="address" id="address" required placeholder="Address"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="city" class="form-label">City<span class="mandatory red">*</span></label>
                                    <input type="text" class="form-control" name="city" id="city" placeholder="City" required>
                                </div>

                                <div class="mb-3">
                                    <label for="state" class="form-label">State<span class="mandatory red">*</span></label>
                                    <select class="form-control" name="state_id" id="state" required>
                                        <option value="">Select State</option>
                                        @forelse(\App\Models\State::all() as $sk => $sv)
                                            <option value="{{ $sv->id }}">{{ $sv->name }} - {{ $sv->code }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="gstn" class="form-label">GSTN<span class="mandatory red">*</span></label>
                                    <input type="text" class="form-control" name="gstn" id="gstn" placeholder="GSTN" maxlength="15" minlength="15" required>
                                </div>

                                <div class="mb-3">
                                    <label for="pan" class="form-label">PAN<span class="mandatory red">*</span></label>
                                    <input type="text" class="form-control" name="pan" id="pan" placeholder="PAN" maxlength="10" minlength="10" required>
                                </div>

                                <div class="mb-3">
                                    <label for="contactPerson" class="form-label">Contact Person Name<span class="mandatory red">*</span></label>
                                    <input type="text" class="form-control" name="contact_person_name" id="contactPerson" placeholder="Contact Person Name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="mobileNumber" class="form-label">Contact Person Mobile Number<span class="mandatory red">*</span></label>
                                    <input type="text" class="form-control numeric" name="contact_person_mobile_number" id="mobileNumber" placeholder="Contact Person Mobile Number" required>
                                </div>

                                <div class="mb-3">
                                    <label for="contactPersonEmail" class="form-label">Contact Person Email<span class="mandatory red">*</span></label>
                                    <small style="color:red;float:right"><b>This email id will be used to login</b></small>
                                    <input type="email" class="form-control" name="contact_person_email" id="contactPersonEmail" placeholder="Contact Person Email" required>


                                </div>

                                <div class="mb-3">
                                    <label for="altContact" class="form-label">Alternate Contact Person Name<span class="mandatory red">*</span></label>
                                    <input type="text" class="form-control" name="alt_contact_person" id="altContact" placeholder="Alternate Contact Person Name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="altContactPerson" class="form-label">Alternate Contact Person Mobile Number<span class="mandatory red">*</span></label>
                                    <input type="text" class="form-control numeric" name="alt_contact_person_mobile_number" id="altContactPerson" placeholder="Alternate Contact Person Mobile Number" required>
                                </div>

                                <div class="mb-3">
                                    <label for="altContactPersonEmail" class="form-label">Alternate Contact Person Email<span class="mandatory red">*</span></label>
                                    <input type="email" class="form-control" name="alt_contact_person_email" id="altContactPersonEmail" placeholder="Enter Email" required>
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Category<span class="mandatory red">*</span></label>
                                    <select class="form-control select2" name="category[]" data-placeholder="Select Category" multiple required>
                                        @forelse(\App\Models\Service::where('is_active',1)->where('is_delete',0)->get() as $sk => $sv)
                                            <option value="{{ $sv->id }}">{{ $sv->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password<span class="mandatory red">*</span></label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Confirm Password<span class="mandatory red">*</span></label>
                                    <input type="password" class="form-control" name="confirm_password" id="userpassword" placeholder="Enter confirm password" required>
                                </div>

                                <div class="mt-3 d-grid">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Sign Up</button>
                                </div>
                            </form>
                            <div class="mt-4 text-center">
                                Already have account? <a href="{{ route('vendor.login') }}">Sign in</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection  