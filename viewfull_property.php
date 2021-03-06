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
    <h1>Your Properties Full Details</h1>
  </div>
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
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
        <table class="table table-dark table-striped">
          <thead>
          <span id="result" style="color: green; font-weight: bolder; margin-bottom: 20px;"></span>
            <tr>
              <th>S/No</th>
              <th>Property Name</th>
              <th>Color</th>
              <th>Price</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- <tr>
              <td>John</td>
              <td>Doe</td>
              <td>john@example.com</td>
            </tr>
            <tr>
              <td>Mary</td>
              <td>Moe</td>
              <td>mary@example.com</td>
            </tr>
            <tr>
              <td>July</td>
              <td>Dooley</td>
              <td>july@example.com</td>
            </tr> -->
            <?php
              $total = 0;
              $user_properties = new Property;
              $userPropertiesFetched = $user_properties->fetchProducts($_SESSION['user']);
              foreach ($userPropertiesFetched as $data) 
              { 
                $total++;
                ?>
                <!-- // echo '<li>'.$data['Name'].'</li>'; -->
                <tr>
                  <td>
                    <?=$total;?>
                  </td>
                  <td>
                  <span  id = "<?='nameColumn'.$data['id']?>"> <?=$data['Name'];?></span> 
                    <form id="<?='editForm'.$data['id']?>" action = "includes/updateProperty.php" method = "POST">
                      <input type="hidden" id = "dataID" name="id" value="<?=$data['id'];?>">
                      <input type="hidden" id = "<?='dataColor'.$data['id']?>" name="color" >
                      <input type="hidden" id = "<?='dataPrice'.$data['id']?>" name="price" >
                      <input type="text" name="name" id = "<?='name'.$data['id']?>" value = "<?=$data['Name'];?>" style = "display: none;">
                  </td>
                  <td>
                  <span  id = "<?='colorColumn'.$data['id']?>">  <?=$data['Color'];?> </span> 
                      <input type="text" name="color" id = "<?='color'.$data['id']?>" value = "<?=$data['Color'];?>" style = "display: none;">
                  </td>
                  <td>
                  <span  id = "<?='priceColumn'.$data['id']?>">   <?=$data['Price'];?> </span> 
                  <input type="text" name="price" id = "<?='price'.$data['id']?>" value = "<?=$data['Price'];?>" style = "display: none;">
                  </td>
                  <td>
                    <?=$data['Date'];?>
                  </td>
                  <td>
                    <div>
                      <button class="btn btn-outline-success" id = "<?='update'.$data['id']?>" style = "display: none;" onclick= "saveNewData(<?=$data['id'];?>)"
                      >Save</button>
                      
                    </form>
                    <!-- <form action="" method="POST"> -->
                      <!-- <input type="hidden" name="property_id"> -->
                      <div id="<?='edit_delete_btn'.$data['id']?>">
                      <button class="btn btn-outline-warning" id="<?='edit'.$data['id']?>" 
                          onclick = "showEditInputs(<?=$data['id']?>)">Edit</button>
                      <input type="hidden" id="hidden_ID" name="id" value="<?=$data['id'];?>">
                      <button name="delete" class="btn btn-outline-danger" id="<?='delete'.$data['id']?>" data-toggle="modal" data-target="#myModal" 
                      onclick = "getID(<?php echo $data['id'];?>);">Delete</button>
                    <!-- </form> -->
                      </div>
                    </div>
                  </td>
                </tr>
              <?php
              }
            ?>
            <p id = "total" style="display: none;"><?=$total?></p>
          </tbody>
        </table>
      </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal For Deleting Items -->

 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete Property?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete this property called '<span id="prop"></span>'? <br>Note! This Cannot Be undone!</p>
          <form action="includes/deleteProperty.php" method="POST">
            <input type="hidden" name="id" id="modal_ID">
            <button class="btn btn-outline-danger" type="submit" name = "yesDelete">Yes, Delete it!</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-success" data-dismiss="modal">No! Cancel</button>
        </div>
      </div>
      
    </div>
  </div>

<!--/ Modal For Deleting Items -->  

</main><!-- /.container -->
<script type="text/javascript" src = "assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src = "assets/my_js/jquery.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    function showEditInputs(id){
      // alert('You are Editing Item Number: '+ id);
      document.getElementById('name'+ id).style.display = "block";
      document.getElementById('color'+ id).style.display = "block";
      document.getElementById('price'+ id).style.display = "block";
      document.getElementById('update'+ id).style.display = "block";
      document.getElementById('nameColumn'+ id).style.display = "none";
      document.getElementById('colorColumn'+ id).style.display = "none";
      document.getElementById('priceColumn'+ id).style.display = "none";
      document.getElementById('edit_delete_btn'+ id).style.display = "none";
    }
    function showNewData(id){
    document.getElementById('nameColumn'+id).innerHTML = document.getElementById('name'+id).value;
    document.getElementById('colorColumn'+id).innerHTML = document.getElementById('dataColor'+id).value;
    document.getElementById('priceColumn'+id).innerHTML = document.getElementById('dataPrice'+id).value;
  }

    function showOriginalData(id){
      // alert('You are Editing Item Number: '+ id);
      document.getElementById('name'+ id).style.display = "none";
      document.getElementById('color'+ id).style.display = "none";
      document.getElementById('price'+ id).style.display = "none";
      document.getElementById('update'+ id).style.display = "none";
      document.getElementById('nameColumn'+ id).style.display = "block";
      document.getElementById('colorColumn'+ id).style.display = "block";
      document.getElementById('priceColumn'+ id).style.display = "block";
      document.getElementById('edit_delete_btn'+ id).style.display = "block";
      showNewData(id);
    }
    function getID(id){
      document.getElementById('modal_ID').value = id;
      document.getElementById('prop').innerHTML = document.getElementById('name'+id).value;
    }
    function getNAME(names){
      document.getElementById('prop').innerHTML = names;
    }
  </script>

<!-- Working Ajax Script -->

<script type="text/javascript">
// var total = document.getElementById('total').innerHTML;
 function saveNewData(id){
    // var id = document.getElementById('dataID').value;
$("#update"+id).click( function() {
var color = document.getElementById('color'+id).value;
var price = document.getElementById('price'+id).value;
document.getElementById('dataColor'+id).value = color;
document.getElementById('dataPrice'+id).value = price;
 $.post( $("#editForm"+id).attr("action"), 
         $("#editForm"+id+" :input").serializeArray(), 
         function(info){ $("#result").html(info); 
   });
showOriginalData(id);
});
$("#editForm"+id).submit( function() {
  return false; 
});
 }
// var id = document.getElementById('dataID').value;
// $("#update"+id).click( function() {
// var color = document.getElementById('color'+id).value;
// var price = document.getElementById('price'+id).value;
// document.getElementById('dataColor'+id).value = color;
// document.getElementById('dataPrice'+id).value = price;
//  $.post( $("#editForm"+id).attr("action"), 
//          $("#editForm"+id+" :input").serializeArray(), 
//          function(info){ $("#result").html(info); 
//    });
// showOriginalData(id);
// });
 

 
function clearInput() {
  $("#editForm"+id+" :input").each( function() {
     $(this).val('');
  });
}


</script>

<!-- Working Ajax Script Ends Here -->
</body>
</html>