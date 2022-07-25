<?php   
include('header.php');
include('connect.php');
$name= htmlspecialchars($_GET['name']);
if(isset($_POST['add'])){
    //print_r($_POST['productid']);
    if(isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION['cart'], "productid");
        
        if(in_array($_POST['productid'], $item_array_id)){
            echo "<script>alert(\"Product is already added in the cart...!\")</script>";
            echo "<script>window.location = 'product.php?name=".$name."'</script>";
        }else {
            $count =count($_SESSION['cart']);
            $item_array = array(
                'productid' => $_POST['productid']
            );
            $_SESSION['cart'][$count]= $item_array;
            echo "<script>alert(\"Product has been successfully added to the cart...!\")</script>";
            echo "<script>window.location = 'product.php?name=".$name."'</script>";
            }
        
    }else {
        $item_array = array(
        'productid'=>$_POST['productid']
        );
        
        $_SESSION['cart'][0] = $item_array;
        echo "<script>alert(\"Product has been successfully added to the cart...!\")</script>";
        echo "<script>window.location = 'product.php?name=".$name."'</script>";
        
    }
    
}

?>

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Products</li>
                    </ol>

                    <nav class="product-pager ml-auto" aria-label="Product">
                        <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                            <i class="icon-angle-left"></i>
                            <span>Prev</span>
                        </a>

                        <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                            <span>Next</span>
                            <i class="icon-angle-right"></i>
                        </a>
                    </nav><!-- End .pager-nav -->
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <?php
					
				$sql = "SELECT * FROM Products WHERE brand_id='$name';";
				$result = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_assoc($result)) {?>
						
					

            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                            <img id="product-zoom" src="admin/img/<?php echo $row['product_image'];?>" data-zoom-image="assets/images/products/single/1-big.jpg" alt="product image">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->

                                        <div id="product-zoom-gallery" class="product-image-gallery">
                                            <a class="product-gallery-item active" href="#" data-image="assets/images/products/single/1.jpg" data-zoom-image="assets/images/products/single/1-big.jpg">
                                                <img src="admin/img/<?php echo $row['product_image'];?>" alt="product side">
                                            </a>

                                            <a class="product-gallery-item" href="#" data-image="assets/images/products/single/2.jpg" data-zoom-image="assets/images/products/single/2-big.jpg">
                                                <img src="admin/img/<?php echo $row['product_image'];?>" alt="product cross">
                                            </a>

                                            <a class="product-gallery-item" href="#" data-image="assets/images/products/single/3.jpg" data-zoom-image="assets/images/products/single/3-big.jpg">
                                                <img src="admin/img/<?php echo $row['product_image'];?>" alt="product with model">
                                            </a>

                                            <a class="product-gallery-item" href="#" data-image="assets/images/products/single/4.jpg" data-zoom-image="assets/images/products/single/4-big.jpg">
                                                <img src="admin/img/<?php echo $row['product_image'];?>" alt="product back">
                                            </a>
                                        </div><!-- End .product-image-gallery -->
                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="product-details">
                                    <h1 class="product-title"><?php echo $row['product_name']; ?></h1><!-- End .product-title -->

                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <a class="ratings-text" href="#product-review-link" id="review-link">( 0 Reviews )</a>
                                    </div><!-- End .rating-container -->

                                    <div class="product-price">
                                        R <?php echo $row['product_price']; ?>
                                    </div><!-- End .product-price -->

                                    <div class="product-content">
                                        <p> <?php echo $row['product_description']; ?> .</p>
                                    </div><!-- End .product-content -->
                                    <div class="details-filter-row details-row-size">
                                        <label for="qty">Qty:</label>
                                        <div class="product-details-quantity">
                                            <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                        </div><!-- End .product-details-quantity -->
                                    </div><!-- End .details-filter-row -->
                                    <form action="product.php?name=<?php echo $row['brand_id'] ?>" method="post">
                                        <div class="product-details-action">
                                            <input type="hidden" name="productid" value="<?php echo $row['product_id'] ?>" >
                                            <button type="submit" name="add" class="btn-product btn-cart"><span>add to cart</span></button>

                                            <div class="details-action-wrapper">
                                                <a href="#" class="btn-product btn-compare" title="Compare"><span>Add to Compare</span></a>
                                            </div><!-- End .details-action-wrapper -->
                                        </div><!-- End .product-details-action -->
                                    </form>

                                    <div class="product-details-footer">
                                        <div class="product-cat">
                                            <span>Category:</span>
                                            <a href="#"><?php $row['product_main_category'] ?></a>
                                        </div><!-- End .product-cat -->
                                    </div><!-- End .product-details-footer -->
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
            <?php	
					}	
				?>
        </main><!-- End .main -->
<?php 
include('footer.php');
?>