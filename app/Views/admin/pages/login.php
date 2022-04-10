<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="theme/sbadmin/assets/fontawesome-free/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="theme/sbadmin/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Login</title>
  </head>
  <body class="bg-gradient-info">
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-7">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0"> 
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Sign in!</h1>
                  </div>
                  <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                  <?php endif;?>
                  <form class="user" action="/login/auth" method="post">
                    <div class="form-group">
                      <input name="username" type="text" class="form-control form-control-user <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" aria-describedby="emailHelp" placeholder="Masukkan Username Anda..." value="<?= set_value('email') ?>">
                      <div class="invalid-feedback">
                        Username tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <input name="password" type="password" class="form-control form-control-user <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" placeholder="Password">
                      <div class="invalid-feedback">
                        Password tidak boleh kosong
                      </div>
                    </div>
                    
                    <p class="text-danger">
				              <?= session()->getFlashdata('alertPassword'); ?>
                    </p> 
                    <button type="submit" class="btn btn-user btn-block btn-primary">Login</button>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>                                                    

      <!-- <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                <div class="row">
                  <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                      <h1>Sign In</h1>
                        <?php if(session()->getFlashdata('msg')):?>
                          <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                        <?php endif;?>
                        <form class="user" action="/login/auth" method="post">
                            <div class="form-group">
                              <input type="text" name="username" placeholder="Masukkan Username!" class="form-control form-control-user" id="InputForEmail" value="<?= set_value('email') ?>">
                            </div>
                            <div class="form-group">
                              <input type="password" name="password" placeholder="Masukkan Password!" class="form-control form-control-user" id="InputForPassword">
                            </div>
                          <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  </body>
</html>
<!-- <div class="container"> -->

    <!-- Outer Row -->
    <!-- <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0"> -->
            <!-- Nested Row within Card Body -->
            <!-- <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" action="/Login/auth" method="post">
                    <div class="form-group">
                      <input name="username" type="email" class="form-control form-control-user" id="username" aria-describedby="emailHelp" placeholder="Enter Email Address..." value="<?= set_value('email') ?>">
                    </div>
                    <div class="form-group">
                      <input name="password" type="password" class="form-control form-control-user" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <hr>
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>                                                     -->
