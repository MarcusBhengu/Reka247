<?php 
include('header.php');
include('action.php');
require_once('connect.php');
if (!isset($_SESSION['cart']) or count($_SESSION['cart'])==0 ) {
  echo "<script>alert(\"No products Selected!\")</script>";
  echo "<script>window.location = 'Process_Orders.php'</script>";
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add an Order
        <small>#007612</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Order</li>
      </ol>
    </section>

    <div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Note:</h4>
        This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
      </div>
    </div>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Reka, 24/7.
            <small class="pull-right">Date: 04/04/2020</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
          <?php 
            $vat;
            $sql = "SELECT * FROM Company";
            $result = mysqli_query($conn, $sql);
            $resultcheck = mysqli_num_rows($result);
                                           
            if($resultcheck>0) {
              while($row = mysqli_fetch_assoc($result)) {
                  $name =$row['company_name'];
                  $address =$row['company_address'];
                  $phone =$row['company_phone'];
                  $email =$row['company_mail'];
                  $vat=$row['company_vat'];
                  echo"
                  <strong> Admin, ".$name."</strong><br>
                  ".$address."<br>
                  Phone: ".$phone."<br>
                  Email: ".$email."
                  
                  ";
              }
            }
            
            
            ?>
          </address>
        </div>
        <!-- /.col -->
        <?php
             $customer_name;
              foreach($_SESSION['cart'] as $key =>$values){
                  $id= $values['id'];
                  $sql = "SELECT * FROM Orders WHERE order_id='$id';";
                  $result = mysqli_query($conn, $sql);
                  $resultcheck = mysqli_num_rows($result);
                                                 
                  if($resultcheck>0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $customer_name =$row['customer_name'];
                    }
                  }
                  

              }
             ?>
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <?php 
            $sql = "SELECT * FROM Customers WHERE customer_name='$customer_name';";
            $result = mysqli_query($conn, $sql);
            $resultcheck = mysqli_num_rows($result);
                                           
            if($resultcheck>0) {
              while($row = mysqli_fetch_assoc($result)) {
                  $name =$row['customer_name'];
                  $address =$row['customer_address'];
                  $phone =$row['customer_phone'];
                  $email =$row['customer_mail'];
                  echo"
                  <strong>".$name."</strong><br>
                  ".$address."<br>
                  Phone: ".$phone."<br>
                  Email: ".$email."
                  
                  ";
              }
            }
            
            
            ?>
          
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice #007612</b><br>
          <br>
          <b>Order ID:</b> 4F3S8J<br>
          <b>Deliver By:</b> 2/04/2022<br>
          <b>Location:</b> Warehouse (Midstream)<br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Qty</th>
              <th>Product Name</th>
              <th>Product Price</th>
              <th>Description</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
             <?php
             $total = 0;
              foreach($_SESSION['cart'] as $key =>$values){
                  $id= $values['id'];
                  $sql = "SELECT * FROM Orders WHERE order_id='$id';";
                  $result = mysqli_query($conn, $sql);
                  $resultcheck = mysqli_num_rows($result);
                                                 
                  if($resultcheck>0) {
                    while($row = mysqli_fetch_assoc($result)) {
                      $sub = $row['order_quantity']*$row['product_price'];
                      $total = $total + $sub;
                      echo "
                      <tr>
                        <td>".$row['order_quantity']."</td>
                        <td>".$row['product_name']."</td>
                        <td>R".$row['product_price']." </td>
                        <td>".$row['order_arrival_date']."</td>
                        <td>R".$sub."</td>
                      </tr>
                      
                      ";
                    }
                  }
                  

              }
             ?>
            
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Your Payment Methods:</p>
          <img src="dist/img/credit/visa.png" alt="Visa">
          <img src="dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="dist/img/credit/american-express.png" alt="American Express">
          <img src="dist/img/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Easy, Secure & Reliable.
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Delivery Due 2/04/2022</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>R<?php echo $total?>.00</td>
              </tr>
              <tr>
                <th>Vat (<?php echo $vat?>.0)</th>
                <?php 
                 $v =($vat/100) * $total;
                
                
                ?>


                <td>R<?php echo $v?></td>
              </tr>
              <tr>
                <th>Shipping:</th>
                <td>R0.00</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>R<?php echo $v + $total?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.php" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
</div>



<?php 
include('Footer.php');
?>