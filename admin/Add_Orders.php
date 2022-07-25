<?php 
include('header.php');
include('action.php');
require_once('connect.php');

if (isset($_POST['add_Order'])) {
    $customer_name= $_POST['customer_name'];
    $product_name= $_POST['product_name'];
    $product_id= $_POST['product_id'];
    $product_price= $_POST['product_price'];
    $customer_id= $_POST['customer_id'];
    $status= "New";
    $quantity = $_POST['quantity'];

    $sql1 = "SELECT * FROM Products";
    $result1 = mysqli_query($conn, $sql1);
    $resultcheck1 = mysqli_num_rows($result1);
    $product_quantity;              
    if($resultcheck1>0) {
      while($row = mysqli_fetch_assoc($result1)) {
        $product_quantity= $row['product_quantity'];
      }
    }else{
      $product_quantity= Null;
    }
    if($quantity > $product_quantity){
      echo "<script>alert(\"The quantity you want of more than the products we have in Stock...!\")</script>";
      $res = $product_quantity;
      $sql2 = "UPDATE Products SET product_quantity='$res' WHERE product_id='$product_id' ;";
      mysqli_query($conn, $sql2);
    }else{
      $mysql= "INSERT INTO Orders(order_id, customer_id, customer_name, product_id, product_name, product_price, order_status, order_quantity) VALUES (NULL,'$customer_id','$customer_name','$product_id','$product_name','$product_price','$status','$quantity');";
    mysqli_query($conn, $mysql);
    
    $res = $product_quantity - $quantity;
    $sql2 = "UPDATE Products SET product_quantity='$res' WHERE product_id='$product_id' ;";
    mysqli_query($conn, $sql2);

    }


    
}
if (isset($_POST['update_Order'])) {
    $id=$_POST['id'];
    
    $status= "Delivered";
    $quantity = $_POST['quantity'];
    $sql = "UPDATE Orders SET order_status='$status', order_quantity='$quantity' WHERE order_id='$id' ;";
    mysqli_query($conn, $sql);
    echo "<script>alert(\"Order Successfully Updated...!\")</script>";
}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Orders Management
        <small>Master Orders</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Orders</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          
          <!-- /.box -->
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Add an Order</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="post" action="Add_Orders.php">
                <!-- text input -->
                <div class="form-group">
                  <label>Select Customer</label>
                  <select class="form-control" name="customer_name" required>
                <?php
                    $sql = "SELECT * FROM Customers";
                    $result = mysqli_query($conn, $sql);
                    $resultcheck = mysqli_num_rows($result);
                    $customer_id;              
                    if($resultcheck>0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo"<option>".$row['customer_name']."</option>";
                            $customer_id= $row['customer_id'];
                        }
                    }else{
                      $customer_id= Null;
                    }
                ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Select Product</label>
                  <select class="form-control" name="product_name" required>
                <?php
                    $sql = "SELECT * FROM Products";
                    $result = mysqli_query($conn, $sql);
                    $resultcheck = mysqli_num_rows($result);
                     $product_id;
                     $product_price;           
                    if($resultcheck>0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo"<option>".$row['product_name']."</option>";
                            $product_id=$row['product_id'];
                            $product_price=$row['product_price'];
                        }
                    }
                ?>
                  </select>

                </div>
                <input type="hidden" name="product_id" value=<?php echo $product_id;?>>
                <input type="hidden" name="product_price" value=<?php echo $product_price;?>>
                <?php 



                ?>
                <input type="hidden" name="customer_id" value=<?php echo $customer_id;?>>

                <div class="form-group">
                    <label for="exampleInputPassword1">Quantity</label>
                    <input type="number" name="quantity" class="form-control" id="exampleInputNumber" placeholder="Enter Quantity here" required>
                </div>

                <button type="submit" name="add_Order" class="btn-success b">Add Order</button><br> <br>

                </form>
                <!-- input states -->
                
                


                <!-- checkbox -->
                
                <!-- /.box -->
                </div>

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
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
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Product Name</th>
                        <th>Product Price(R)</th>
                        <th>Order Status</th>
                        <th>Order Arrival Date</th>
                        <th>Product Quantity</th>
                        <th>Edit</th>
                        <th>Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "SELECT * FROM Orders ";
                        $result = mysqli_query($conn, $sql);
                        $resultcheck = mysqli_num_rows($result);
                                        
                        if($resultcheck>0) {
                            while($row = mysqli_fetch_assoc($result)) {
                            
                            orders($row['order_id'],$row['customer_id'],$row['customer_name'],$row['product_id'],$row['product_name'], $row['product_price'], $row['order_status'], $row['order_arrival_date'], $row['order_quantity']);
                            }
                        }
                        ?>
                        </tbody>

                        <tfoot>
                        <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Product Name</th>
                        <th>Product Price(R)</th>
                        <th>Order Status</th>
                        <th>Order Arrival Date</th>
                        <th>Product Quantity</th>
                        <th>Edit</th>
                        <th>Remove</th>
                        </tr>
                        </tfoot>
                    </table>
                    </div>
                    <!-- /.box-body -->
                </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>



<?php 
include('Footer.php');
?>