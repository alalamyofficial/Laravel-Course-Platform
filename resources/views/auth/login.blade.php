<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login</title>

    <style>
    
    .btn-color{
    background-color: #0e1c36;
    color: #fff;
    
    }

    .profile-image-pic{
    height: 200px;
    width: 200px;
    object-fit: cover;
    }



    .cardbody-color{
    background-color: #ebf2fa;
    }

    a{
    text-decoration: none;
    }
    
    </style>

</head>
<body>
    
<div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card my-5">

          <form method="POST" action="{{ route('login') }}" class="card-body cardbody-color p-lg-5">
            @csrf

            <div class="text-center">
              <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>

            <div class="mb-3">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                aria-describedby="emailHelp" value="{{ old('email') }}" required autocomplete="email" autofocus
                placeholder="Email" name="email"
              >

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
              <input type="password" class="form-control @error('password') is-invalid @enderror" 
                     id="password" placeholder="Password"
                     required autocomplete="current-password" name="password"
                     
              >

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror  
            </div>


            <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Login</button></div>
            <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
              Registered? <a href="#" class="text-dark fw-bold"> Create an
                Account</a>
            </div>
          </form>
        </div>

      </div>
    </div>
</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>