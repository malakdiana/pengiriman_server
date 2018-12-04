<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | JNE</title>

  <!-- Bootstrap -->
  <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
  <style>
    body {
      background-color:white;
    }
    .row {
      margin:10px auto;
      width:300px;
      text-align:center;
    }
    .login {
      background-color:#  ;
      padding:20px;
      margin-top:20px;
    }
    .navbar {
      background-color: crimson; 
      padding-top: 5px;
    }
    .btn {
      background-color: crimson;
      border:solid crimson;
    }
    .btn:hover {
      background: black;
    }
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-default navbar-static-top">
  <div class="container">
</div></nav>
<br><br>
<?php echo form_open('login/cekLogin') ?>
      <img src="<?php echo base_url(); ?>assets/images/iconuser.png" class="img-responsive center-block" width="100" height="100"></a>
    <div class = "container">
    <div class="row">
      <h1><b><font face = "century gothic" color = "crimson">Log In</font></b></h1>
      <div class="login">
        <form role="form" action="" method="post">
          <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus />
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required autofocus />
          </div>
          <div class="form-group">
            <input type="submit" name="login" class="btn btn-primary btn-block" value="Log me in" />
          </div>
        </form>
        <?php echo form_open('login/register') ?>
        <div class="form-group">
            <a href ="<?=site_url() ?>/Login/register"><input type="submit" name="create_function" class="btn btn-danger btn-block" value="Create Account" /></a>
          </div>
          <p>CopyRight@Aflah RM 1641720141</p>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
</body>
</html>