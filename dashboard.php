<?php
  session_start();
  include('includes/db_connection.php');
  include('includes/user_class.php');
  include('includes/property_class.php');
  // $UserData = array();
  $logged_in_user = new User;
  $UserData = $logged_in_user->fetchUserDetails($_SESSION['user']);
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
        <a class="nav-link" href="dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
        </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><?=$_SESSION['user']?></a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
    <ul class="navbar-nav navbar-right">
      <li class="nav-item">
        <a class="nav-link" href="login.php">Log Out</a>
      </li>
    </ul>
  </div>
</nav>

<main role="main" class="container">
<br><br><br><br>
  <div class="starter-template">
    <h1>Your Profile Details</h1>
  </div>
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
    <h4 class="card-title">Below are the information you entered while registering</h4>
      <h4 style="color:purple;">Full Name: </h4>
      <i><?=$UserData['Full_Name']?></i>
      <h4 style="color:purple;">Registered Email: </h4>
      <i><?=$UserData['Email']?></i>
      <h4 style="color:purple;">Occupation: </h4>
      <i><?=$UserData['Occupation']?></i>
      </div>

      <div class="col-md-6">
      <h5><span id="header">Your List of Properties!</span> </h5>
      <div style="float: right;">
        <button onclick="addNewProperty()" id="add_property_original" class="btn btn-outline-success" id="add_property" >Add New Property</button>
        <button onclick="hideAddNewProperty()" id="view_property_2" style="display: none;" class="btn btn-outline-success" id="add_property" >View Property List</button>
      </div>
      <br>

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


      <!-- Property Add Div-->

        <div id="add_property" style="display: none;">
          <form action="includes/addProperty.php" method="POST">
            <div class="form-group">
              <label>Property Name:</label>
              <input type="text" name="name" class="form-control" required="">
            </div>
            <div class="form-group">
              <label>Property Color:</label>
              <input type="text" name="color" class="form-control" required="">
            </div>
            <div class="form-group">
              <label>Property Price:</label>
              <input type="text" name="price" class="form-control" required="">
            </div>
            <div class="form-group">
              <label>Date Purchased:</label>
              <input type="date" name="date" class="form-control" required="">
            </div>
            <button type="submit" name = "addNew" class="btn btn-outline-secondary" style="float: right;">Save New Property</button>
          </form>
        </div>

      <!--/ Property Add Div-->

      <!-- Property List Div-->
      <div id="property_list">
            <ol>
        <?php
          $user_properties = new Property;
          $userPropertiesFetched = $user_properties->fetchProducts($_SESSION['user']);
          if ($userPropertiesFetched == false) {
            # code...
            echo '<h6><i>No Properties Added Yet!</i></p>';
          }else{

            ?>
            <ol>
            <?php
          foreach ($userPropertiesFetched as $data) {
            # code...
            echo '<li>'.$data['Name'].'</li>';
          }
          ?>
          </ol>
          <a href="viewfull_property.php" class="btn btn-outline-info">View All Property Details</a>
          <?php
        }
          ?>
        
      </div>

      <!--/ Property List Div-->
      </div>
      </div>
    </div>
  </div>
</div>

</main><!-- /.container -->
<script type="text/javascript" src = "assets/bootstrap/js/bootstrap.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    function addNewProperty(){
      document.getElementById('property_list').style.display = "none";
      document.getElementById('view_property_2').style.display = "block";
      document.getElementById('add_property').style.display = "block";
      document.getElementById('add_property_original').style.display = "none";
      document.getElementById('header').innerHTML = "Add New Property";
    }
    function hideAddNewProperty(){
      document.getElementById('property_list').style.display = "block";
      document.getElementById('add_property_original').style.display = "block";
      document.getElementById('view_property_2').style.display = "none";
      document.getElementById('add_property').style.display = "none";
      document.getElementById('header').innerHTML = "Your List of Properties";
    }
  </script>

  <!-- Final Script To appear here -->

















































































   <!--/ Final Script To appear here -->

</body>
</html>