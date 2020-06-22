<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/home/login.css')}}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
              <div class="card-body">
                <h5 class="card-title text-center">Sign Up</h5>
                <form class="form-signin" action="/home/register" method="post">
                    @csrf
                <p style="color: red">{{Request::get('error')}}</p>
                <div class="form-label-group">
                    <input type="text" id="inputName" name="name" class="form-control" placeholder="Email address" required >
                    <label for="inputName">Full Name</label>
                  </div>
                  <div class="form-label-group">
                    <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Email address" required >
                    <label for="inputEmail">Username</label>
                  </div>

                  <div class="form-label-group">
                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                    <label for="inputPassword">Password</label>
                  </div>


                  <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign Up</button>
                  <hr class="my-4">
                  <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><a style="color: white" href="home/login">Or Sign In</a></button>
                  <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>
