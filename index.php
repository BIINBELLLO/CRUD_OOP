<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CRUD_APP_OOP</title>
  <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
  <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#" style="color:blue;">O.O.P CRUD App</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
    <ul class="navbar-nav navbar-right">
      <li class="nav-item">
        <a class="nav-link" href="reg.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Log In</a>
      </li>
    </ul>
  </div>
</nav>

<main role="main" class="container">
<br><br><br><br>
<?php
  if (isset($_SESSION['Error'])) {
    echo 
    '
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error!</strong> '.$_SESSION['Error'].'
      </div>
    ';
    unset($_SESSION['Error']);
  }
  if (isset($_SESSION['Success'])) {
    echo 
    '
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Good!</strong> '.$_SESSION['Success'].'
      </div>
    ';
    unset($_SESSION['Success']);
  }
?>

  <div class="starter-template">
    <h1>CRUD App Using PHP Object Oriented Programming</h1>
    <p class="lead">This is a simple CRUD application developed completely using OOP PHP and mysqli.</p>
  </div>
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Select An Action</h4>
    <div class="row">
      <div class="col-md-2">
        <a href="reg.php"><button type="button" class="btn btn-outline-primary">Register</button></a>
      </div>
      <div class="col-md-2">
        <a href="login.php"><button type="button" class="btn btn-outline-secondary">Log In</button></a>
      </div>
      <div class="col-md-3">
      </div>
    </div>
  </div>
</div>



































</main><!-- /.container -->
<script type="text/javascript" src = "assets/bootstrap/js/bootstrap.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>
</html>