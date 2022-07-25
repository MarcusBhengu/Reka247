<?php 
include('header.php');
include('action.php');
require_once('connect.php');
if(isset($_POST['add'])){
    //print_r($_POST['productid']);
    $id=$_POST['id'];
    $sql = "UPDATE Orders SET order_status='Processed' WHERE order_id='$id' ;";
    mysqli_query($conn, $sql);

    if(isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION['cart'], "id");
        
        if(in_array($_POST['id'], $item_array_id)){
			//echo "<script>window.location = 'products.php'</script>"; 
			
			$value = '<script>
			<div class="row-fluid">
				<div class="span12">
				<div class="alert alert-info">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Well done!</strong> Product is already in the cart.
		  </div></script>';
		  echo "<script>window.location = 'Process_Orders.php'</script>";
		  
        }
		else {
            $count =count($_SESSION['cart']);
            $item_array = array(
                'id' => $_POST['id']
            );
            $_SESSION['cart'][$count]= $item_array;
			//echo "<script>window.location = 'products.php'</script>";
            
		  $value = '';
		  echo "<script>window.location = 'Process_Orders.php'</script>";
		  
            
            }
        
    }else {
        $item_array = array(
        'id'=>$_POST['id']
        );
        
        $_SESSION['cart'][0] = $item_array;
		//echo "<script>window.location = 'products.php'</script>";
		
        $value = '<script><div class="row-fluid">
			<div class="span12">
			<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong></strong> You successfully added your product to cart.
		  </div></script>';
		  echo "<script>window.location = 'Process_Orders.php'</script>";
        
    }
    
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Processing Orders Management
        <small>Process Orders</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Orders</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
    
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    
                    <?php
                        $count = 0;
                        if (isset($_SESSION['cart'])) {
                            $count= count($_SESSION['cart']);
                        }
                    ?>
                    <h3 class="box-title"> <?php echo $count;?> Items Processed</h3>
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
                        <th>Add to Supplier</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "SELECT * FROM Orders WHERE order_status='New';";
                        $result = mysqli_query($conn, $sql);
                        $resultcheck = mysqli_num_rows($result);
                                        
                        if($resultcheck>0) {
                            while($row = mysqli_fetch_assoc($result)) {
                            
                             process_orders($row['order_id'],$row['customer_id'],$row['customer_name'],$row['product_id'],$row['product_name'], $row['product_price'], $row['order_status'], $row['order_arrival_date'], $row['order_quantity']);
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
                        <th>Add to Supplier</th>
                        
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <ul class="sidebar-menu" data-widget="tree">
                    <li >
                        <a href="Orders.php">
                             <i class="fa fa-dashboard text-green"></i> <span>Done Processing</span>
                        </a>
                    </li>
                </ul>
                    <!-- /.box-body -->
            </div>    
        <!--/.col (right) -->
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<?php 
include('Footer.php');
?>