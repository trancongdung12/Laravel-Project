<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/home/login.css')}}">

    <title>Đăng Nhập</title>
</head>
<style>
    .alert{
        color :red;
    }
</style>
<body>
    <div class="container">
        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
              <div class="card-body">
                <h5 class="card-title text-center">Sign In</h5>
                <form class="form-signin" action="/home/login" method="post">
                    @csrf
                <p class="alert">{{Request::get('error')}}</p>
                @error('username')
                <div class="alert">{{$message}}</div>
                @enderror
                  <div class="form-label-group">

                    <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Email address" >
                    <label for="inputEmail">Username</label>
                  </div>
                  @error('password')
                  <div class="alert">{{$message}}</div>
                  @enderror
                  <div class="form-label-group">

                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" >
                    <label for="inputPassword">Password</label>
                  </div>

                  <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Remember password</label>
                  </div>
                  <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                  <hr class="my-4">
                  <a href="/home/register" class="btn btn-lg btn-google btn-block text-uppercase" type="submit">Or Sign up</a>
                  {{-- <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button> --}}
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>
