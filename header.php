<?php
  session_start();
  require_once 'cn.php';
?>
<!DOCTYPE html>
<html>

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Panther Finder</title>
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="">

    <!-- Custom Stylesheets -->
    <link rel="stylesheet" type="text/css" href="css/datatable.css">
    <link rel="stylesheet" type="text/css" href="css/pantherfinder.css">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom Scripts -->
    <script src="https://use.fontawesome.com/3de243fbf0.js"></script>
    <script src="./js/jquery-3.2.1.js"></script>
    <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.min.js"></script>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarToggle">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#page-top"><i class="fa fa-paw" aria-hidden="true"></i>Panther Finder</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbarToggle">
          <ul class="nav navbar-nav navbar-right">
            <li class="hidden">
                <a href="#page-top"></a>
            </li>
            <?php
  						if (isset($_SESSION['id'])) {
            		echo "<form action='includes/logout.inc.php' class='form-inline'>
  											<div class='form-group'>
              						<button type='submit' class='btn btn-default btn-sm' id='logoutButton'>Log Out</button>
  											</div>
            					</form>";
  						} else {
                echo "<form action='includes/login.inc.php' method='POST' class='form-inline'>
              					<div class='form-group'>
                					<label class='sr-only' for='inputUsername'>Username</label>
                					<input type='text' class='form-control input-sm' name='uid' id='inputUsername' placeholder='Username'>
              					</div>
              					<div class='form-group'>
                					<label class='sr-only' for='inputPassword'>Password</label>
                						<input type='password' class='form-control input-sm' name='pwd' id='inputPassword' placeholder='Password'>
              					</div>
              					<button type='submit' class='btn btn-default btn-sm' id='loginButton'>Log In</button>
            					</form>"; ?>
  										<?php
  						}
  					?>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>
