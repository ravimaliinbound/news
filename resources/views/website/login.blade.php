<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"
        integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/x-icon" href="{{url('website/img/logo.png')}}">
    <link href="{{url('website/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <form action="" class="login_form" method="post">
            @csrf
            <h2>Login Form</h2>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" value="{{old('email')}}" placeholder="Enter email"
                    name="email">
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" value="{{old('password')}}"
                    placeholder="Enter password" name="password">
            </div>
            <div class="checkbox">
                <!-- <label><input type="checkbox" name="remember" value="remember"> Remember me</label> -->
                <span class="pull-right">Don't have an account?
                    <a href="signup" style="margin-left: 20px">Signup</a>
                </span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>