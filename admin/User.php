<?php 
include('header.php');
include('action.php');
require_once('connect.php');
if (isset($_POST['add_User'])) {
  $name= $_POST['name'];
  $position= $_POST['position'];
  $phone= $_POST['phone'];
  $status= $_POST['status'];
  $email= $_POST['email'];
  $password= $_POST['password'];

  if($_FILES["image"]["error"] == 4){
    echo
    "<script> alert('Image Does Not Exist'); </script>"
    ;
  }
  else{
    $fileName = $_FILES["image"]["name"];
    $fileSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if ( !in_array($imageExtension, $validImageExtension) ){
      echo
      "
      <script>
        alert('Invalid Image Extension');
      </script>
      ";
    }
    else if($fileSize > 1000000){
      echo
      "
      <script>
        alert('Image Size Is Too Large');
      </script>
      ";
    }
    else{
      $newImageName = uniqid();
      $newImageName .= '.' . $imageExtension;

      move_uploaded_file($tmpName, 'img/' . $newImageName);

      $sql = "INSERT INTO Users (users_id, users_name, users_position, users_phone, users_status, users_email, users_password, users_immage) VALUES (NULL, '$name', '$position', '$phone', '$status', '$email', '$password', '$newImageName');";  
      mysqli_query($conn, $sql);
      
      echo "<script>alert(\"$name has been added Successfully...!\")</script>";
      echo "<script>window.location = 'User.php'</script>";
    }
  }

  
  
}

if (isset($_POST['edit_Supplier'])) {
    $id = $_POST['id'];
    $name= $_POST['name'];
    $position= $_POST['position'];
    $phone= $_POST['phone'];
    $status= $_POST['status'];
    $email= $_POST['email'];
    $sql = "UPDATE Users SET users_name='$name', users_position='$position', users_phone='$phone', users_status='$status', users_email='$email' WHERE users_id='$id' ;";
    mysqli_query($conn, $sql);
    echo "<script>alert(\"$name Successfully Updated...!\")</script>";
    echo "<script>window.location = 'User.php'</script>";
  }
  if (isset($_POST['delete_Supplier'])) {
    
    $id = $_POST['id'];
    $sql = "DELETE FROM Users WHERE users_id= '$id';";
    mysqli_query($conn, $sql);
  }
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users Management
        <small>new</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="callout callout-info">
        <h4>Reminder!</h4>
        Instructions for how to use this software are available on the
        <a href="#">Documentation</a>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-default">
            <div class="box-header with-border">
            </div>
            <div class="box-body">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                Add User
              </button>
            </div>
          </div>
        </div>
      </div>
        <!-- /.modal -->
        <div class="modal modal fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add User</h4>
              </div>
              <div class="modal-body">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">User's Details</Details></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                     <form role="form" action="User.php" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name & Surname :</label>

                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter User's Full Names & Surname">
                            </div>
                            <div class="form-group">
                                <label>Position :</label>
                                <select class="form-control select2" name="position"style="width: 100%;">
                                <option selected="selected">Administrator</option>
                                <option>Mananger</option>
                                <option>CEO</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>SA phone No :</label>

                                <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <input type="text" name="phone"class="form-control" data-inputmask='"mask": "(+27) 99 999-9999"' data-mask>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control select2" name="status" style="width: 100%;">
                                <option selected="selected">Offline</option>
                                <option>Online</option>
                                <option>Suspended</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password"class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="image">User image</label>
                                <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" value=""><br>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    
                    
                </div>
                <div class="modal-footer">
                <button type="button" class="btn-danger pull-left" data-dismiss="modal">Close</button>
                <button type="submit" name="add_User"class="btn-success b">Add User</button>
                </form>
            </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users Overview</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Image</th>
                  <th>User Name</th>
                  <th>Position</th>
                  <th>Phone Number</th>
                  <th>Status</th>
                  <th>Email</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $sql = "SELECT * FROM Users ";
                  $result = mysqli_query($conn, $sql);
                  $resultcheck = mysqli_num_rows($result);
                                  
                  if($resultcheck>0) {
                    while($row = mysqli_fetch_assoc($result)) {
                      
                      users($row['users_id'],$row['users_name'],$row['users_position'],$row['users_phone'],$row['users_status'], $row['users_email'], $row['users_password'], $row['users_immage']);
                    }
                  }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Image</th>
                  <th>User Name</th>
                  <th>Position</th>
                  <th>Phone Number</th>
                  <th>Status</th>
                  <th>Email</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </section>
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <!-- /.content -->
</div>
<?php 
include('Footer.php');
?>