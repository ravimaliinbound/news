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
                            <!-- <a href="#"><img src="../assets/images/logo-dark.svg" alt="img" class="mx-auto auth-logo"/></a> -->
                        </div>
                        <h4 class="text-center font-medium mb-4">Sign up</h4>
                        <form action="" class="login_form" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-2">
                                <input type="text" class="form-control" id="name" value="{{old('name')}}"
                                    placeholder="Enter name" name="name">
                            </div>
                            @error('name')
                                <div class="text-danger mb-2">{{ $message }}</div>
                            @enderror
                            <div class="form-group mb-2">
                                <input type="email" class="form-control" id="email" value="{{old('email')}}"
                                    placeholder="Enter email" name="email">
                            </div>
                            @error('email')
                                <div class="text-danger mb-2">{{ $message }}</div>
                            @enderror
                            <div class="form-group mb-2">
                                <input type="password" class="form-control" id="password" value="{{old('password')}}"
                                    placeholder="Enter password" name="password">
                            </div>
                            @error('password')
                                <div class="text-danger mb-2">{{ $message }}</div>
                            @enderror
                            <div class="form-group mb-2">
                                <input type="file" class="form-control mt-2" id="image" value="{{old('image')}}"
                                    name="image">
                            </div>
                            @error('image')
                                <div class="text-danger mb-2">{{ $message }}</div>
                            @enderror
                            <div class="checkbox mb-4">
                                <!-- <label><input type="checkbox" name="remember"> Remember me</label> -->

                            </div>
                            <div class="mt-4 text-center mb-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <span class="pull-right">Already have an account?
                                <a href="login" style="margin-left: 20px" class="text-primary-500">Login</a>
                            </span>
                            <br><br>
                            <a href="/index" class="text-primary-500">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
@include('admin.layout.footer')