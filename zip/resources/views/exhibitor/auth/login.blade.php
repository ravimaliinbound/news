@extends('layouts.login')
@section('title',' Login')
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
                            <a href="{{ route('exhibitor.login') }}" class="auth-logo-dark">
                                <div class="avatar-md profile-user-wid">
                                   <!--  <span class="avatar-title rounded-circle bg-light">
                                        <img src="{{ asset('/') }}" alt="" class="" height="60">
                                    </span> -->
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            <form class="form-horizontal" action="{{ route('exhibitor.postlogin') }}" id="loginForm" method="post">
                                @csrf
                                
                                <div class="form-group">
                                    <span style="color:red;float:right;" class="pull-right">* is mandatory</span>
                                </div>

                                <div class="mb-3">
                                    <label for="username" class="form-label">Email<span class="mandatory red">*</span></label>
                                    <input type="text" class="form-control" name="email" id="username" placeholder="Enter email" required>
                                </div>
        
                                <div class="mb-3">
                                    <label class="form-label">Password<span class="mandatory red">*</span></label>
                                    <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password" required>
                                </div>

                                <div class="mt-3 d-grid">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                </div>
                                <div class="mt-4 text-center">
                                    <a href="{{ route('exhibitor.auth.password.reset') }}" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a> <br /><br />
                                    Don't have account? <a href="">Sign up</a>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection  