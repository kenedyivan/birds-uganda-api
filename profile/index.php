<?php
include '../allfx.php';
$dbclass = new allfx();

if($dbclass->isLoggedIn()){
    header("Location: ../");
}

$db = $dbclass->db_properties();
if(isset($_POST['login_btn'])){
    $u_pw = $db->real_escape_string($_POST['u_pw']);
    $u_email = $db->real_escape_string($_POST['u_email']);
    
    $u_pw = md5($u_pw);
    
    $qry = $db->query("select * from admin where email='".$u_email."' and password='".$u_pw."'");
    
    if($qry->num_rows>0){
        
        $array = $qry->fetch_array();
        $name = $array['name'];
        if($array['u_type']==$dbclass->admin){
            
            $_SESSION['u_number'] = $array['u_number'];
            $_SESSION['u_token'] = $u_pw;
            
            if(isset($_POST['remember_me'])){
            $expire = time()+ 60*60*24*30;
            setcookie("u_number", $array['u_number'],$expire);
            setcookie("u_token", $u_pw, $expire);
            }
            
            header("Location: ../");
            
        } else {
          ?> <script> alert('Hello <?php print $name; ?>, kindly use the mobile app'); </script> <?php  
        }
        
    } else {
    
    ?> <script> alert('Wrong user name or password'); </script> <?php
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bird Uganda Safaris | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Bird</b> Uganda</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form method="post">
      <div class="form-group has-feedback">
          <input type="email" required class="form-control" name="u_email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input type="password" class="form-control" required name="u_pw" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
                <input type="checkbox" name="remember_me" value="Remember-me"/> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
            <button type="submit" name="login_btn" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-twitter btn-flat"><i class="fa fa-twitter"></i> Sign in using
        Twitter</a>
    </div>
    <!-- /.social-auth-links -->
    
    <p class="login-box-msg">If you forgot your password, reset from the mobile app</p>
    
    <p class="login-box-msg">If you have no account, download <b>Bird Uganda mobile app</b></p>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
