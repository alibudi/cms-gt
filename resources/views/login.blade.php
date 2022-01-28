
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name='robots' content='noindex' />
    <title>Login - HOPS CMS</title>
    <link rel="shortcut icon" href="https://assets.promediateknologi.com/promedia/network/294/desktop/images/favicon/favicon.ico" type="image/x-icon" />
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://editor.promediateknologi.com/assets/login/css/animate.css">
    <link rel="stylesheet" href="https://editor.promediateknologi.com/assets/plugins/sweetalert/css/sweetalert.css?">
    <link rel="stylesheet" href="https://editor.promediateknologi.com/assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://editor.promediateknologi.com/assets/dist/css/adminlte.custom.css">
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="https://assets.promediateknologi.com/promedia/network/294/desktop/images/logo.png?v=152" width="300">
    <!-- <a href="https://editor.promediateknologi.com/"><b>Editor</b> Promedia Teknologi</a> -->
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form id="form_data" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="g-recaptcha" ></div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <!-- <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label> -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="button" class="btn btn-primary btn-block btn-flat btn_action" data-idle="Sign In" data-process="Login..." data-form="#form_data" data-action="https://editor.promediateknologi.com/login/do_login" data-redirect="https://editor.promediateknologi.com/">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<script type="text/javascript" src="https://editor.promediateknologi.com/assets/plugins/sweetalert/js/sweetalert.min.js"></script>
<script type="text/javascript" src="https://editor.promediateknologi.com/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="https://editor.promediateknologi.com/assets/script/general.js?v=11"></script>

</body>
</html>
