<?php 
include('header.php');
include('action.php');
require_once('connect.php');
if (isset($_POST['add_Company'])) {
  $name= $_POST['name'];
  $address= $_POST['address'];
  $phone= $_POST['phone'];
  $vat= $_POST['vat'];
  $mail= $_POST['mail'];
  $sql = "INSERT INTO Company (company_id, company_name, company_address, company_phone, company_vat, company_mail) VALUES (NULL, '$name', '$address', '$phone', '$vat', '$mail');";  
  mysqli_query($conn, $sql);
  
  echo "<script>alert(\"Company has been added Successfully...!\")</script>";
  
}
if (isset($_POST['edit_Company'])) {
    $id = $_POST['id'];
    $name= $_POST['name'];
    $address= $_POST['address'];
    $phone= $_POST['phone'];
    $vat= $_POST['vat'];
    $mail= $_POST['mail'];
    $sql = "UPDATE Company SET company_name='$name', company_address='$address', company_phone='$phone', company_vat='$vat', company_mail='$mail' WHERE company_id='$id' ;";
    mysqli_query($conn, $sql);
    echo "<script>alert(\"Company Successfully Updated...!\")</script>";
  }
  if (isset($_POST['delete_Company'])) {
    
    $id = $_POST['id'];
    $sql = "DELETE FROM Company WHERE company_id= '$id';";
    mysqli_query($conn, $sql);
  }

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Company Management
        <small>new</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Company</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="callout callout-warning">
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
                Add Company
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
                <h4 class="modal-title">Add Company</h4>
              </div>
              <div class="modal-body">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Company's Details</Details></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                     <form role="form" action="Company_Details.php" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputText1">Company Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputText1" placeholder="Enter Company's Full Name" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Company Address</label>
                                <input type="text" name="address"class="form-control" id="exampleInputPassword1" placeholder="Enter Company Address" required>
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
                                <label>Vat(%) :</label>
                                <input type="number" name="vat" style="width: 100%;" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address :</label>
                                <input type="email" name="mail" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                            </div>
                            
                        </div>
                    </div>
                    <!-- /.box-body -->
                    
                    
                </div>
                <div class="modal-footer">
                <button type="button" class="btn pull-left" data-dismiss="modal">Close</button>
                <button type="submit" name="add_Company" class="btn b">Add Company</button>
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
              <h3 class="box-title">Company Overview</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Image</th>
                  <th>Company Name</th>
                  <th>Company Address</th>
                  <th>Phone Number</th>
                  <th>VAT(%)</th>
                  <th>Email</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $sql = "SELECT * FROM Company ";
                  $result = mysqli_query($conn, $sql);
                  $resultcheck = mysqli_num_rows($result);
                                  
                  if($resultcheck>0) {
                    while($row = mysqli_fetch_assoc($result)) {
                      
                      company($row['company_id'],$row['company_name'],$row['company_address'],$row['company_phone'],$row['company_vat'], $row['company_mail']);
                    }
                  }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Image</th>
                  <th>Company Name</th>
                  <th>Company Address</th>
                  <th>Phone Number</th>
                  <th>VAT(%)</th>
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