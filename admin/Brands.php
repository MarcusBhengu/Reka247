<?php 
include('header.php');
include('action.php');
require_once('connect.php');
if (isset($_POST['add_Brand'])) {
  $supplier= $_POST['supplier'];
  $brand= $_POST['brand'];
  
  $sql = "INSERT INTO Brands (brand_id, brand_supplier, brand_name) VALUES (NULL, '$supplier', '$brand');";  
  mysqli_query($conn, $sql);
  
  echo "<script>alert(\"Brand has been added Successfully...!\")</script>";
  echo "<script>window.location = 'Brands.php'</script>";
  
}
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
  echo "<script>window.location = 'Brands.php'</script>";
  
}
if (isset($_POST['edit_Brand'])) {
    $id = $_POST['id'];
    $brand_supplier= $_POST['brand_supplier'];
    $brand_name= $_POST['brand_name'];
    $sql = "UPDATE Brands SET brand_supplier='$brand_supplier', brand_name='$brand_name' WHERE brand_id='$id' ;";
    mysqli_query($conn, $sql);
    echo "<script>alert(\"Brand Successfully Updated...!\")</script>";
  }
  if (isset($_POST['delete_Brand'])) {
    
    $id = $_POST['id'];
    $sql = "DELETE FROM Brands WHERE Brand_id= '$id';";
    mysqli_query($conn, $sql);
  }

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Brands
        <small>new</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Brands</li>
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
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                Add Brand
              </button>
            </div>
          </div>
        </div>
      </div>
        <!-- /.modal -->
        <div class="modal modal fade" id="modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Brand</h4>
              </div>
              <div class="modal-body">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Brand </h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                     <form role="form" action="Brands.php" method="post">
                        <div class="box-body">
                          <div class="form-group">
                          <label>Suppliers</label>
                          <select class="form-control select2" name="supplier" style="width: 100%;" required>
                          <?php
                            $sql = "SELECT * FROM Suppliers";
                            $result = mysqli_query($conn, $sql);
                            $resultcheck = mysqli_num_rows($result);
                                                  
                            if($resultcheck>0) {
                               while($row = mysqli_fetch_assoc($result)) {
                               if ($row['supplier_status']=="Active") {
                                  echo"<option>".$row['supplier_name']."</option>";
                                }
                              }
                            }
                            ?>
                           </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Brand</label>
                                <input type="text" name="brand"class="form-control" id="exampleInputText" placeholder="Enter Brand Name">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    
                    
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Close</button>
                <button type="submit" name="add_Brand" class="btn btn-success">Add Brand</button>
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
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Brand Logo</th>
                  <th>Brand Supplier Name</th>
                  <th>Brand Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $sql = "SELECT * FROM Brands ";
                  $result = mysqli_query($conn, $sql);
                  $resultcheck = mysqli_num_rows($result);
                                  
                  if($resultcheck>0) {
                    while($row = mysqli_fetch_assoc($result)) {
                      
                      brands($row['brand_id'],$row['brand_supplier'],$row['brand_name']);
                    }
                  }
                ?>
                </tbody>
                <tfoot>
                <tr>
                <th>Brand Logo</th>
                <th>Brand Supplier Name</th>
                <th>Brand Name</th>
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
