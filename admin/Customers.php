<?php 
include('header.php');
include('action.php');
require_once('connect.php');

if (isset($_POST['add_Customer'])) {
    $name= $_POST['name'];
    $address= $_POST['address'];
    $phone= $_POST['phone'];
    $status= $_POST['status'];
    $mail= $_POST['mail'];
    $password= $_POST['password'];
    $sql = "INSERT INTO Customers (customer_id, customer_name, customer_address, customer_phone, customer_status, customer_mail, customer_password) VALUES (NULL, '$name', '$address', '$phone', '$status', '$mail', '$password');";  
    mysqli_query($conn, $sql);
    
    echo "<script>alert(\"Customer has been added Successfully...!\")</script>";
    echo "<script>window.location = 'Customers.php'</script>";
    
}
if (isset($_POST['edit_Customer'])) {
    $id = $_POST['id'];
    $name= $_POST['name'];
    $address= $_POST['address'];
    $phone= $_POST['phone'];
    $status= $_POST['status'];
    $mail= $_POST['mail'];
    $sql = "UPDATE Customers SET customer_name='$name', customer_address='$address', customer_phone='$phone', customer_status='$status', customer_mail='$mail' WHERE customer_id='$id' ;";
    mysqli_query($conn, $sql);
    echo "<script>alert(\"Customer Successfully Updated...!\")</script>";
    echo "<script>window.location = 'Customers.php'</script>";
  }
  if (isset($_POST['delete_Customer'])) {
    
    $id = $_POST['id'];
    $sql = "DELETE FROM Customers WHERE customer_id= '$id';";
    mysqli_query($conn, $sql);
  }


?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
            Customers Management
        <small>new</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Customers</li>
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
                Add Customers
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
                <h4 class="modal-title">Add Customer</h4>
              </div>
              <div class="modal-body">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Customer's Details</Details></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                     <form role="form" method="post" action="Customers.php">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputText1">Name & Surname</label>
                                <input type="text" name="name"class="form-control" id="exampleInputText1" placeholder="Enter Customer's Name & Surname" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Address</label>
                                <input type="text" name="address" class="form-control" id="exampleInputPassword1" placeholder="Enter Customer's Address" required>
                            </div>
                            <div class="form-group">
                                <label>SA phone no.:</label>

                                <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <input type="text" name="phone" class="form-control" data-inputmask='"mask": "(+27) 99 999-9999"' data-mask required>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control select2" name="status" style="width: 100%;" required>
                                <option selected="selected">Offline</option>
                                <option>Online</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="mail"class="form-control" id="exampleInputEmail1" placeholder="Enter Customer email" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" name="password"class="form-control" id="exampleInputEmail1" placeholder="Enter Customer Password" required>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    
                    
                </div>
                <div class="modal-footer">
                <button type="button" class="btn-danger pull-left" data-dismiss="modal">Close</button>
                <button type="submit" name="add_Customer" class="btn-success b">Add Customer</button>
                </form>
            </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </section>
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Customers Overview</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Customer Name</th>
                  <th>Customer Address</th>
                  <th>Phone Number</th>
                  <th>Status</th>
                  <th>Email</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $sql = "SELECT * FROM Customers ";
                  $result = mysqli_query($conn, $sql);
                  $resultcheck = mysqli_num_rows($result);
                                  
                  if($resultcheck>0) {
                    while($row = mysqli_fetch_assoc($result)) {
                      
                      customers($row['customer_id'],$row['customer_name'],$row['customer_address'],$row['customer_phone'],$row['customer_status'], $row['customer_mail'], $row['customer_password']);
                    }
                  }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Customer Name</th>
                  <th>Customer Address</th>
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
        <!-- /.col -->
    </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>




<?php 
include('Footer.php');
?>