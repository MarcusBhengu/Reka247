<?php   
include('header.php');
include('connect.php');

if (isset($_POST['Add_Order'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO Customers(customer_id, customer_name, customer_address, customer_phone, customer_mail, customer_password) VALUES (NULL,'$name','$address','$phone','$email','$password');";
    mysqli_query($conn,$sql);
	$productid = array_column($_SESSION['cart'],'productid');
    $sql = "SELECT * FROM Products;";
    $result = mysqli_query($conn, $sql);

	$sq = "SELECT * FROM Customers WHERE customer_mail='$email';";
    $res = mysqli_query($conn, $sq);
    $r=mysqli_fetch_assoc($res);
	$customer_id=$r['customer_id'];

    
    while($row = mysqli_fetch_assoc($result)) {
       foreach ($productid as $id){
            if($row['product_id']==$id){
				$prod_id=$row['product_id'];
				$prod_name=$row['product_name'];
				$prod_price=$row['product_price'];
				$sql1 = "INSERT INTO Orders(order_id, customer_id, customer_name, product_id, product_name, product_price, order_quantity) VALUES (NULL,'$customer_id','$name','$prod_id','$prod_name','$prod_price','1');";
				mysqli_query($conn,$sql1);
			}
		}
	}
	unset($_SESSION['cart']);
    echo "<script>alert(\"Order Sent Successfuly\")</script>";
    echo "<script>window.location = 'checkout.php'</script>";


}

?>
        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Checkout<span>Checkout</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="cart.php">Cart</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="checkout">
	                <div class="container">
            			<div class="checkout-discount">
            				<form action="#">
        						<input type="text" class="form-control" required id="checkout-discount-input">
            					<label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>
            				</form>
            			</div><!-- End .checkout-discount -->
            			<form action="checkout.php" method="post">
		                	<div class="row">
		                		<div class="col-lg-9">
		                			<h2 class="checkout-title">New Customer Details</h2><!-- End .checkout-title -->
		                				<div class="row">
		                					<div class="col-sm-6">
		                						<label>Name & Surname *</label>
		                						<input type="text" name="name" class="form-control" required>
		                					</div><!-- End .col-sm-6 -->

		                					<div class="col-sm-6">
		                						<label>Address *</label>
		                						<input type="text"  name="address" class="form-control" required>
		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->
	            						

		                				<div class="row">
		                					<div class="col-sm-6">
		                						<label>Phone *</label>
		                						<input type="tel" name="phone" class="form-control" required>
		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->

	                					<label>Email address *</label>
	        							<input type="email" name = "email" class="form-control" required>
										
										<label>Password *</label>
	        							<input type="password" name = "password" class="form-control" required>

	        							<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="checkout-create-acc">
											<label class="custom-control-label" for="checkout-create-acc">Create an account?</label>
										</div><!-- End .custom-checkbox -->

										

	                					<label>Order notes (optional)</label>
	        							<textarea class="form-control" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
		                		</div><!-- End .col-lg-9 -->
		                		<aside class="col-lg-3">
		                			<div class="summary">
		                				<h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

		                				<table class="table table-summary">
		                					<thead>
		                						<tr>
		                							<th>Product</th>
		                							<th>Total</th>
		                						</tr>
		                					</thead>

		                					<tbody>
											<?php
                                         
												$productid = array_column($_SESSION['cart'],'productid');
												$sql = "SELECT * FROM Products;";
												$result = mysqli_query($conn, $sql);
												$total = 0.0;
												while($row = mysqli_fetch_assoc($result)) {
													
													foreach ($productid as $id){
														if($row['product_id']==$id){
																$id = $row['product_id'];
																$total = $total + $row['product_price'];?>
		                						<tr>
		                							<td><a href="#"><?php echo $row['product_name']?></a></td>
		                							<td>R <?php echo $row['product_price']?>.00</td>
		                						</tr>
												<?php
														}
													}
												}	
												?>
		                						<tr class="summary-subtotal">
		                							<td>Subtotal:</td>
		                							<td>R <?php echo $total?>.00</td>
		                						</tr><!-- End .summary-subtotal -->
		                						<tr>
		                							<td>Shipping:</td>
		                							<td>Free shipping</td>
		                						</tr>
		                						<tr class="summary-total">
		                							<td>Total:</td>
		                							<td>R <?php echo $total?>.00</td>
		                						</tr><!-- End .summary-total -->
		                					</tbody>
		                				</table><!-- End .table table-summary -->

		                				<div class="accordion-summary" id="accordion-payment">
										    <div class="card">
										        <div class="card-header" id="heading-1">
										            <h2 class="card-title">
										                <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
										                    Direct bank transfer
										                </a>
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">
										            <div class="card-body">
										                Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
										            </div><!-- End .card-body -->
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->

										    <div class="card">
										        <div class="card-header" id="heading-2">
										            <h2 class="card-title">
										                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
										                    Check payments
										                </a>
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-payment">
										            <div class="card-body">
										                Ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. 
										            </div><!-- End .card-body -->
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->

										    <div class="card">
										        <div class="card-header" id="heading-3">
										            <h2 class="card-title">
										                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
										                    Cash on delivery
										                </a>
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">
										            <div class="card-body">Quisque volutpat mattis eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. 
										            </div><!-- End .card-body -->
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->

										    <div class="card">
										        <div class="card-header" id="heading-4">
										            <h2 class="card-title">
										                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
										                    PayPal <small class="float-right paypal-link">What is PayPal?</small>
										                </a>
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordion-payment">
										            <div class="card-body">
										                Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum.
										            </div><!-- End .card-body -->
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->

										    <div class="card">
										        <div class="card-header" id="heading-5">
										            <h2 class="card-title">
										                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
										                    Credit Card (Stripe)
										                    <img src="assets/images/payments-summary.png" alt="payments cards">
										                </a>
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion-payment">
										            <div class="card-body"> Donec nec justo eget felis facilisis fermentum.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Lorem ipsum dolor sit ame.
										            </div><!-- End .card-body -->
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->
										</div><!-- End .accordion -->

		                				<button type="submit" name="Add_Order" class="btn btn-outline-primary-2 btn-order btn-block">
		                					<span class="btn-text">Place Order</span>
		                					<span class="btn-hover-text">Proceed to Checkout</span>
		                				</button>
		                			</div><!-- End .summary -->
		                		</aside><!-- End .col-lg-3 -->
		                	</div><!-- End .row -->
            			</form>
	                </div><!-- End .container -->
                </div><!-- End .checkout -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

<?php 
include('footer.php');
?>