@extends('layouts.login')
@section('title','Client Registration')
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
                            <div class="col-7 mt-3">
                                <img src="{{ asset('/') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0"> 
                        <div class="auth-logo">
                            <a href="{{ route('exhibitor.login') }}" class="auth-logo-dark">
                                <div class="avatar-md profile-user-wid">
                                    <!-- <span class="avatar-title rounded-circle bg-light">
                                        <img src="{{ asset('images//') }}" alt="" class="" height="60">
                                    </span> -->
                                </div>
                            </a>
                        </div>
                        <div class="p-2 mt-2">
                            <form class="form-horizontal" action="{{ route('exhibitor.postRegister') }}" id="exhibitorRegistration" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="recaptcha" id="recaptcha">
                                <div class="form-group">
                                    <span style="color:red;float:right;" class="pull-right">* is mandatory</span>
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Company Name<span class="mandatory red">*</span></label>
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
                                    <label for="cin" class="form-label">Contact Person Name(For Plexpo 2024)<span class="mandatory red">*</span></label>
                                    <input type="text" class="form-control" name="contact_person" id="contactPerson" placeholder="Contact Person Name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="gstn" class="form-label">Contact Person Mobile Number(For Plexpo 2024)<span class="mandatory red">*</span></label>
                                    <input type="text" class="form-control numeric" name="mobile_number" id="mobileNumber" placeholder="Contact Person Mobile Number" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email<span class="mandatory red">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password<span class="mandatory red">*</span></label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Confirm Password<span class="mandatory red">*</span></label>
                                    <input type="password" class="form-control" name="confirm_password" id="userpassword" placeholder="Enter confirm password" required>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-check" name="accept_terms" required>
                                    <label class="form-check-label" for="remember-check">
                                        I have read and accepted <a href="https://plexpoindia.org/fact-sheet-and-conditions-for-participation" target="_blank">Participations Terms</a>
                                    </label>
                                    <span id="conditions"></span>
                                </div>

                                <div class="mt-3 d-grid">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Sign Up</button>
                                </div>
                            </form>
                            <div class="mt-4 text-center">
                                Already have account? <a href="{{ route('exhibitor.login') }}">Sign in</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection  