<?php 
include('header.php');
include('action.php');
require_once('connect.php');


$sql2 = "SELECT * FROM Suppliers WHERE supplier_status='Inactive' ;";
  
$result = mysqli_query($conn, $sql2);
$resultcheck = mysqli_num_rows($result);                          
if($resultcheck>0) {
    while($row = mysqli_fetch_assoc($result)) {
      $supplier =$row['supplier_name'];
      
      $sql3 = "SELECT * FROM Products WHERE supplier_id='$supplier' ;";
      $result3=mysqli_query($conn, $sql3);
      $resultcheck = mysqli_num_rows($result3);
      while($row3 = mysqli_fetch_assoc($result3)){
        $product_name =$row3['product_name'];
        
        $new_status="Inactive";
        $sql4 = "UPDATE Products SET product_status='$new_status' WHERE product_name='$product_name' ;";
        mysqli_query($conn, $sql4);

      }
    
    }
  }
$s = "SELECT * FROM Suppliers WHERE supplier_status='Active' ;";
  
$res = mysqli_query($conn, $s);
$rescheck = mysqli_num_rows($res);                          
if($rescheck>0) {
    while($row = mysqli_fetch_assoc($res)) {
      $supp =$row['supplier_name'];
      $s3 = "SELECT * FROM Products WHERE supplier_id='$supp' ;";
      $res3=mysqli_query($conn, $s3);
      $resultcheck = mysqli_num_rows($res3);
      while($r3 = mysqli_fetch_assoc($res3)){
        $prod_name =$r3['product_name'];
        $new_stat="Active";
        $s4 = "UPDATE Products SET product_status='$new_stat' WHERE product_name='$prod_name' ;";
        mysqli_query($conn, $s4);

      }
    
    }
}




if (isset($_POST['add_Product'])) {
  $supplier= $_POST['supplier'];
  $brand= $_POST['brand'];
  $name= $_POST['name'];
  $description= $_POST['description'];
  $attributes= $_POST['attributes'];
  $price= $_POST['price'];
  $category= $_POST['category'];
  $status= $_POST['status'];
  $quantity = $_POST['quantity'];
  //image starts
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
    else if($fileSize > 100000000){
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

      $sql = "INSERT INTO Products (product_id, supplier_id, brand_id, product_name, product_description, attributes_id, product_price, product_main_category, product_status, product_quantity, product_image) VALUES (NULL, '$supplier', '$brand', '$name', '$description', '$attributes', '$price', '$category', '$status', '$quantity', '$newImageName');";  
      mysqli_query($conn, $sql);
      "
      <script>
        alert('Successfully Added');
        document.location.href = 'Products.php';
      </script>
      ";
    }
  }


  //immage end
  
  
  echo "<script>alert(\"Product has been added Successfully...!\")</script>";
  echo "<script>window.location = 'Products.php'</script>";
  
}
if (isset($_POST['edit_Product'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price=$_POST['price'];
  $status = $_POST['status'];
  $quantity=$_POST['quantity'];
  $sql = "UPDATE Products SET product_name='$name', product_description='$description', product_price='$price', product_status='$status', product_quantity='$quantity' WHERE product_id='$id' ;";
  mysqli_query($conn, $sql);
  echo "<script>alert(\"Product Successfully Updated...!\")</script>";
}
if (isset($_POST['delete_Product'])) {
  
  $id = $_POST['id'];
  $sql = "DELETE FROM Products WHERE product_id= '$id';";
  mysqli_query($conn, $sql);
}
  
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Products
        <small>new</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Products</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!--<div class="callout callout-info">
        <h4>Reminder!</h4>
        Instructions for how to use this software are available on the
        <a href="#">Documentation</a>
      </div>-->

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-default">
            <div class="box-header with-border">
            <div class="box-body">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal">
                Add Product
              </button>
            </div>
          </div>
        </div>
      </div> 
        
        <!-- /.modal -->
        <div class="modal modal fade" id="modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Product</h4>
              </div>
              <div class="modal-body">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Product's Details</Details></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                     <form role="form" action="Products.php" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Suppliers</label>
                                <select class="form-control select2" name="supplier" style="width: 100%;" required>
                                <?php
                                  $sql = "SELECT * FROM Suppliers";
                                  $result = mysqli_query($conn, $sql);
                                  $resultcheck = mysqli_num_rows($result);
                                  $supplier='';               
                                  if($resultcheck>0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                      if ($row['supplier_status']=="Active") {
                                        $supplier=$row['supplier_status'];
                                        echo"<option selected='selected'>".$row['supplier_name']."</option>";
                                      }
                                    }
                                  }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Brand</label>
                                <select class="form-control select2" name="brand"style="width: 100%;" required>
                                <?php
                                  $sql = "SELECT * FROM Brands";
                                  $result = mysqli_query($conn, $sql);
                                  $resultcheck = mysqli_num_rows($result);
                                                  
                                  if($resultcheck>0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                      
                                      echo"<option>".$row['brand_name']."</option>";
                                      
                                    }
                                  }
                                ?>
                                
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Product Name</label>
                                <input type="text" name="name"class="form-control" id="exampleInputText" placeholder="Enter Product Name" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Product Description</label>
                                <input type="text" name="description"class="form-control" id="exampleInputText" placeholder="Enter Product Description Name" required>
                            </div>
                            <div class="form-group">
                                <label>Attributes</label>
                                <select class="form-control select2" name="attributes" style="width: 100%;" required>
                                <?php
                                  $sql = "SELECT * FROM Attributes";
                                  $result = mysqli_query($conn, $sql);
                                  $resultcheck = mysqli_num_rows($result);
                                                  
                                  if($resultcheck>0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                      
                                      echo"<option>".$row['attribute_name']."</option>";
                                      
                                    }
                                  }
                                ?>
                                </select>
                            </div>
                            <label>Price</label>
                            <div class="input-group">
                              <span class="input-group-addon">R</span>
                              <input type="text" name="price" class="form-control">
                              <span class="input-group-addon">.00</span>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Product's Main Category</label>
                                <select class="form-control select2" name="category"style="width: 100%;" required>
                                <?php
                                  $sql = "SELECT * FROM Category";
                                  $result = mysqli_query($conn, $sql);
                                  $resultcheck = mysqli_num_rows($result);
                                                  
                                  if($resultcheck>0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                      
                                      echo"<option>".$row['category_name']."</option>";
                                      
                                    }
                                  }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control select2" name="status" style="width: 100%;" required>
                                <option selected="selected">Inactive</option>
                                <option>Active</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputPassword1">Quantity</label>
                                <input type="number" name="quantity" class="form-control" id="exampleInputNumber" placeholder="Enter Quantity here" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Product image</label>
                                <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" value=""><br>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->  
                </div>
                <div class="modal-footer">
                <button type="button" class="btn-danger pull-left" data-dismiss="modal">Close</button>
                <button type="submit" name="add_Product": class="btn-success b">Add Product</button>
                </form>
            </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div class="row">
          <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Products Overview</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Product Image</th>
                  <th>Product Supplier</th>
                  <th>Product Brand</th>
                  <th>Product Name</th>
                  <th>Product Price(R)</th>
                  <th>Product Category</th>
                  <th>Product Status</th>
                  <th>Product Arrival Date</th>
                  <th>Product Quantity</th>
                  <th>Edit</th>
                  <th>Remove</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $sql = "SELECT * FROM Products ";
                  $result = mysqli_query($conn, $sql);
                  $resultcheck = mysqli_num_rows($result);
                                  
                  if($resultcheck>0) {
                    while($row = mysqli_fetch_assoc($result)) {
                      
                      products($row['product_id'],$row['supplier_id'],$row['brand_id'],$row['product_name'],$row['product_description'], $row['attributes_id'], $row['product_price'], $row['product_main_category'], $row['product_status'], $row['product_arrival_date'], $row['product_quantity'], $row['product_image']);
                    }
                  }
                ?>
                </tbody>

                <tfoot>
                <tr>
                <th>Product Image</th>
                  <th>Product Supplier</th>
                  <th>Product Brand</th>
                  <th>Product Name</th>
                  <th>Product Price(R)</th>
                  <th>Product Category</th>
                  <th>Product Status</th>
                  <th>Product Arrival Date</th>
                  <th>Product Quantity</th>
                  <th>Edit</th>
                  <th>Remove</th>
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
    <!-- Content Header (Page header) -->

    <!-- Main content -->
   
      
    
    <!-- /.content -->
</div>

<?php 
include('Footer.php');
?>