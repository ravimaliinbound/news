@include('admin.layout.headers')


    <div class="auth-main relative">
        <div class="auth-wrapper v1 flex items-center w-full h-full min-h-screen">
            <div class="auth-form flex items-center justify-center grow flex-col min-h-screen relative p-6 ">
                <div class="w-full max-w-[350px] relative">
                    <div class="auth-bg ">
                        <span
                            class="absolute top-[-100px] right-[-100px] w-[300px] h-[300px] block rounded-full bg-theme-bg-1 animate-[floating_7s_infinite]"></span>
                        <span
                            class="absolute top-[150px] right-[-150px] w-5 h-5 block rounded-full bg-primary-500 animate-[floating_9s_infinite]"></span>
                        <span
                            class="absolute left-[-150px] bottom-[150px] w-5 h-5 block rounded-full bg-theme-bg-1 animate-[floating_7s_infinite]"></span>
                        <span
                            class="absolute left-[-100px] bottom-[-100px] w-[300px] h-[300px] block rounded-full bg-theme-bg-2 animate-[floating_9s_infinite]"></span>
                    </div>
                    <div class="card sm:my-12  w-full shadow-none">
                        <div class="card-body !p-10">
                            <div class="text-center mb-8">
                                <!-- <img src="{{url('admin/images/logo-dark.svg')}}" alt="img" class="mx-auto auth-logo" /> -->
                            </div>
                            <h4 class="text-center font-medium mb-4">Admin Login</h4>
                            <form action="" method="post">
                                @csrf
                                <div class="mb-3">
                                    <input type="email" class="form-control" id="adm_email" name="email"
                                        value="{{old('email')}}" placeholder="Email Address" />
                                </div>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="mb-4">
                                    <input type="password" class="form-control" id="adm_password" name="password"
                                        value="{{old('password')}}" placeholder="Password" />
                                </div>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="flex mt-1 justify-between items-center flex-wrap">
                                    <div class="form-check">
                                        <input class="form-check-input input-primary" type="checkbox"
                                            id="customCheckc1" />
                                        <label class="form-check-label text-muted" for="customCheckc1">Remember
                                            me</label>
                                    </div>
                                    <h6 class="font-normal text-primary-500 mb-0">
                                        <!-- <a href="#"> Forgot Password? </a> -->
                                    </h6>
                                </div>
                                <div class="mt-4 text-center">
                                    <button type="submit" class="btn btn-primary mx-auto shadow-2xl">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
    @include('admin.layout.footer')