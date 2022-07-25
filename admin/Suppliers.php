<?php 
include('header.php');
include('action.php');
require_once('connect.php');
if (isset($_POST['add_Supplier'])) {
  $name= $_POST['name'];
  $company_name= $_POST['company_name'];
  $phone= $_POST['phone'];
  $status= $_POST['status'];
  $mail= $_POST['mail'];
  $password= $_POST['password'];
  $sql = "INSERT INTO Suppliers (supplier_id, supplier_name, supplier_company_name, supplier_phone, supplier_status, supplier_mail, supplier_password) VALUES (NULL, '$name', '$company_name', '$phone', '$status', '$mail', '$password');";  
  mysqli_query($conn, $sql);
  
  echo "<script>alert(\"Supplier has been added Successfully...!\")</script>";
  echo "<script>window.location = 'Suppliers.php'</script>";
  
}
if (isset($_POST['edit_Supplier'])) {
    $id = $_POST['id'];
    $name= $_POST['name'];
    $company_name= $_POST['company_name'];
    $phone= $_POST['phone'];
    $status= $_POST['status'];
    $mail= $_POST['mail'];
    $sql = "UPDATE Suppliers SET supplier_name='$name', supplier_company_name='$company_name', supplier_phone='$phone', supplier_status='$status', supplier_mail='$mail' WHERE supplier_id='$id' ;";
    mysqli_query($conn, $sql);
    
    echo "<script>alert(\"Supplier Successfully Updated...!\")</script>";
  }
  if (isset($_POST['delete_Supplier'])) {
    
    $id = $_POST['id'];
    $sql = "DELETE FROM Suppliers WHERE supplier_id= '$id';";
    mysqli_query($conn, $sql);
  }

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Suppliers Management
        <small>new</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Products</li>
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
                Add Supplier
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
                <h4 class="modal-title">Add Supplier</h4>
              </div>
              <div class="modal-body">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Supplier's Details</Details></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                     <form role="form" action="Suppliers.php" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputText1">Full Name & Surname</label>
                                <input type="text" name="name" class="form-control" id="exampleInputText1" placeholder="Enter Supplier's Full Name & Surname" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Company Name</label>
                                <input type="text" name="company_name"class="form-control" id="exampleInputPassword1" placeholder="Enter Company Name" required>
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
                                <option selected="selected">Inactive</option>
                                <option>Active</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="mail" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    
                    
                </div>
                <div class="modal-footer">
                <button type="button" class="btn pull-left" data-dismiss="modal">Close</button>
                <button type="submit" name="add_Supplier" class="btn b">Add Supplier</button>
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
              <h3 class="box-title">Suppliers Overview</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Image</th>
                  <th>Supplier Name</th>
                  <th>Supplier Company</th>
                  <th>Phone Number</th>
                  <th>Status</th>
                  <th>Email</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $sql = "SELECT * FROM Suppliers ";
                  $result = mysqli_query($conn, $sql);
                  $resultcheck = mysqli_num_rows($result);
                                  
                  if($resultcheck>0) {
                    while($row = mysqli_fetch_assoc($result)) {
                      
                      suppliers($row['supplier_id'],$row['supplier_name'],$row['supplier_company_name'],$row['supplier_phone'],$row['supplier_status'], $row['supplier_mail'], $row['supplier_password']);
                    }
                  }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Image</th>
                  <th>Supplier Name</th>
                  <th>Supplier Company</th>
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
    
    </section>
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>




<?php 
include('Footer.php');
?>