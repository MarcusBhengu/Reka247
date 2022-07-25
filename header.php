<?php
session_start();
include ('connect.php');
if(isset($_POST['logout'])){
    unset($_SESSION['user']);

}
if (isset($_POST['Sign_Up'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO Customers(customer_id, customer_name, customer_address, customer_phone, customer_mail, customer_password) VALUES (NULL,'$name','$address','$phone','$email','$password');";
    mysqli_query($conn,$sql);
    echo "<script>alert(\"Account has been Successfuly Created...!!!\")</script>";
    echo "<script>window.location = 'index.php'</script>";
}
if(isset($_POST['Log_In'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sq = "SELECT * FROM Customers WHERE customer_mail='$email';";
    $res = mysqli_query($conn, $sq);
    $r=mysqli_fetch_assoc($res);
	$customer_id=$r['customer_id'];

    if(isset($_SESSION['user'])) {
        echo "<script>alert(\"Already Logged In...!\")</script>";
        echo "<script>window.location = 'index.php'</script>";
    }else {
        
        
        $_SESSION['user'][0] = $customer_id;
        echo "<script>alert(\"You have successfully logged in...!\")</script>";
        echo "<script>window.location = 'index.php'</script>";
        
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">


<!-- molla/index-13.html  22 Nov 2019 09:59:06 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reka 24/7</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="assets/images/icons/site.html">
    <link rel="mask-icon" href="assets/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="assets/images/icons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/skins/skin-demo-13.css">
    <link rel="stylesheet" href="assets/css/demos/demo-13.css">
</head>

<body>

    <div class="page-wrapper">
        <header class="header header-10 header-intro-clearance">

            <div class="header-top">
                <div class="container">
                <style>
                .whatsapp_float{
                position: fixed;
                bottom: 40px;
                right: 20px;
                display: flex;
                }
                </style>
                                    
                <div class="whatsapp_float">
                    <a href="https://wa.me/27767264117" target="_blank"><img src="assets/whatsapp.png" width="120" height="70" class="whatsapp_float_btn"></a>
                </div>
                    <div class="header-left">
                        <a href="tel:#"><i class="icon-phone"></i>Call: +27 72 727 6922</a>
                    </div><!-- End .header-left -->

                    <div class="header-right">

                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul>
                                    <li>
                                        <div class="header-dropdown">
                                            <a href="#">ZAR</a>
                                            <div class="header-menu">
                                                <ul>
                                                    <li><a href="#">ZAR</a></li>
                                                </ul>
                                            </div><!-- End .header-menu -->
                                        </div><!-- End .header-dropdown -->
                                    </li>
                                    <li>   
                                        <div class="header-dropdown">
                                            <a href="#">Engligh</a>
                                            <div class="header-menu">
                                                <ul>
                                                    <li><a href="#">English</a></li>
                                                </ul>
                                            </div><!-- End .header-menu -->
                                        </div><!-- End .header-dropdown -->
                                    </li>
                                    <li class="login">
                                        <?php
                                        if (isset($_SESSION['user'])) {
                                            $user_id = $_SESSION['user'][0];

                                            $sq = "SELECT * FROM Customers WHERE customer_id='$user_id';";
                                            $res = mysqli_query($conn, $sq);
                                            $r=mysqli_fetch_assoc($res);
                                            $customer_name=$r['customer_name'];
                                            echo'<label>Logged as '.$customer_name.'</label>';
                                            echo"<form method=\"post\" action=\"#\">";
                                            echo'<button type="submit" name="logout"class="btn btn-primary">Logout</button>';
                                            echo"</form>";
                                            
                                                
                                        }else {

                                            echo'<a href="#signin-modal" data-toggle="modal">Login</a>';

                                        }

                                        ?>
                                        
                                    </li>
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>
                        
                        <a href="index.php" class="logo">
                            <img src="assets/images/1.png" alt="REKA 24/7 Logo" width="125px" height="125px" >
                        </a>
                        
                    </div><!-- End .header-left -->
                    <!--<h6>The Home Of Valuable South African Brands<h6>-->
                    <div class="header-center">
                        <div class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="header.php" method="get">
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <div class="select-custom">
                                        <select id="cat" name="cat">
                                            <option value="">All Departments</option>
                                            <?php
                                                $sql = "SELECT * FROM Category;";
                                                $result = mysqli_query($conn, $sql);
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    echo('<option value='.$row['category_id'].'>'.$row['category_name'].'</option>');
                                                }	
                                            ?>
                                        </select>
                                    </div><!-- End .select-custom -->
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." required>
                                    <button class="btn btn-primary" type="submit" name="search"><i class="icon-search"></i></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div>

                    <div class="header-right">
                        <div class="header-dropdown-link">
                            <div class="dropdown compare-dropdown">
                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Compare Products" aria-label="Compare Products">
                                    <i class="icon-random"></i>
                                    <span class="compare-txt">Compare</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="compare-products">
                                        <li class="compare-product">
                                            <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                            <h4 class="compare-product-title"><a href="product.html">Blue Night Dress</a></h4>
                                        </li>
                                        <li class="compare-product">
                                            <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                            <h4 class="compare-product-title"><a href="product.html">White Long Skirt</a></h4>
                                        </li>
                                    </ul>

                                    <div class="compare-actions">
                                        <a href="#" class="action-link">Clear All</a>
                                        <a href="#" class="btn btn-outline-primary-2"><span>Compare</span><i class="icon-long-arrow-right"></i></a>
                                    </div>
                                </div><!-- End .dropdown-menu -->
                            </div><!-- End .compare-dropdown -->

                            <!--<a href="wishlist.html" class="wishlist-link">
                                <i class="icon-heart-o"></i>
                                <span class="wishlist-count">3</span>
                                <span class="wishlist-txt">Wishlist</span>
                            </a> -->

                            <div class="dropdown cart-dropdown">
                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                    <i class="icon-shopping-cart"></i>
                                    <?php
                                    $count;
                                    if (isset($_SESSION['cart'])) {
                                        $count = count($_SESSION['cart']);
                                    } else {
                                        $count = 0;
                                    }
                                    


                                    ?>
                                    <span class="cart-count"><?php echo $count; ?></span>
                                    <span class="cart-txt">Cart</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-cart-products">
                                        <?php

                                        if (isset($_SESSION['cart'])) {
                                            # code...
                                        
                                            $productid = array_column($_SESSION['cart'],'productid');
                                            $sql = "SELECT * FROM Products;";
                                            $result = mysqli_query($conn, $sql);
                                            $total = 0.0;
                                            while($row = mysqli_fetch_assoc($result)) {
                                                
                                                foreach ($productid as $id){
                                                    if($row['product_id']==$id) {
                                                                
                                                        $total = $total + $row['product_price']; ?>
                                                        <div class="product">
                                                            <div class="product-cart-details">
                                                                <h4 class="product-title">
                                                                    <a href="product.php?id=<?php echo $row['product_id']; ?>">Beige knitted elastic runner shoes</a>
                                                                </h4>

                                                                <span class="cart-product-info">
                                                                    <span class="cart-product-qty">1</span>
                                                                    x R <?php echo $row['product_price'];?>
                                                                </span>
                                                            </div><!-- End .product-cart-details -->

                                                            <figure class="product-image-container">
                                                                <a href="product.php" class="product-image">
                                                                    <img src="admin/img/<?php echo $row['product_image']; ?>" alt="product">
                                                                </a>
                                                            </figure>
                                                            <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                                        </div><!-- End .product -->        
                                                       
                                                <?php
                                                    }
                                                }
                                            }
                                        }else {
                                            $total=0;
                                            
                                            ?>
                                        
                                           <div class="product">
                                                <div class="product-cart-details">
                                                    <h4 class="product-title">
                                                         <a href="product.php">No Items on your Cart</a>
                                                    </h4>
                                                </div><!-- End .product-cart-details -->

                                            </div>              
                                                        
                                        
                                        <?php
                                        }	
                                        ?>
                                    </div><!-- End .cart-product -->

                                    <div class="dropdown-cart-total">
                                        <span>Total</span>

                                        <span class="cart-total-price">R<?php echo $total; ?></span>
                                    </div><!-- End .dropdown-cart-total -->

                                    <div class="dropdown-cart-action">
                                        <a href="cart.php" class="btn btn-primary">View Cart</a>
                                        <a href="checkout.php" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .dropdown-cart-total -->
                                </div><!-- End .dropdown-menu -->
                            </div><!-- End .cart-dropdown -->
                        </div>
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->

            <div class="header-bottom sticky-header">
                <div class="container">
                    <div class="header-left">
                        <div class="dropdown category-dropdown show is-on" data-visible="true">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
                                Browse Categories
                            </a>

                            <div class="dropdown-menu show">
                                <nav class="side-nav">
                                    <ul class="menu-vertical sf-arrows">
                                        <?php
                                            $sql = "SELECT * FROM Category;";
                                            $result = mysqli_query($conn, $sql);
                                            $total = 0.0;
                                            while($row = mysqli_fetch_assoc($result)) { 
                                                $c =$row['category_name'];
                                                ?>
                                                <li class="megamenu-container">
                                                    <a class="sf-with-ul" href="#"><?php echo $row['category_name']?></a>

                                                    <div class="megamenu">
                                                        <div class="row no-gutters">
                                                            <div class="col-md-8">
                                                                <div class="menu-col">
                                                                    <div class="row">
                                                                        
                                                                        <?php
                                                                        $sql1 = "SELECT * FROM Sub_Category WHERE category_name='$c';";
                                                                        $result1 = mysqli_query($conn, $sql1);
                                                                        $total1 = 0.0;
                                                                        while($row1 = mysqli_fetch_assoc($result1)) { 
                                                                            
                                                                            ?>

                                                                        <div class="col-md-6">
                                                                            <div class="menu-title"><a href="category.php?name=<?php echo $row1['category_name']?>"><?php echo $row1['sub_category_name']?></a></div><!-- End .menu-title -->
                                                                            <ul>
                                                                                <!--<li><a href="#">TVs</a></li>
                                                                                <li><a href="#">Home Audio Speakers</a></li>
                                                                                <li><a href="#">Projectors</a></li>
                                                                                <li><a href="#">Media Streaming Devices</a></li>-->
                                                                            </ul>

                                                                        </div><!-- End .col-md-6 -->
                                                                        <?php
                                                                            }	
                                                                        ?>
                                                                    </div><!-- End .row -->
                                                                </div><!-- End .menu-col -->
                                                            </div><!-- End .col-md-8 -->

                                                            <div class="col-md-4">
                                                                <div class="banner banner-overlay">
                                                                    <a href="category.html" class="banner banner-menu">
                                                                        <img src="assets/images/demos/demo-13/menu/banner-1.jpg" alt="Banner">
                                                                    </a>
                                                                </div><!-- End .banner banner-overlay -->
                                                            </div><!-- End .col-md-4 -->
                                                        </div><!-- End .row -->
                                                    </div><!-- End .megamenu -->
                                                </li>
                                            <?php
                                            }	
                                        ?>
                                        <li><a href="#">Home Appliances</a></li>
                                    
                                    </ul><!-- End .menu-vertical -->
                                </nav><!-- End .side-nav -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .category-dropdown -->
                    </div><!-- End .col-lg-3 -->
                    <div class="header-center">
                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <!--
                                <li>
                                    <a href="elements-list.html" class="sf-with-ul">Elements</a>

                                    <ul>
                                        <li><a href="elements-products.html">Products</a></li>
                                        <li><a href="elements-typography.html">Typography</a></li>
                                        <li><a href="elements-titles.html">Titles</a></li>
                                        <li><a href="elements-banners.html">Banners</a></li>
                                        <li><a href="elements-product-category.html">Product Category</a></li>
                                        <li><a href="elements-video-banners.html">Video Banners</a></li>
                                        <li><a href="elements-buttons.html">Buttons</a></li>
                                        <li><a href="elements-accordions.html">Accordions</a></li>
                                        <li><a href="elements-tabs.html">Tabs</a></li>
                                        <li><a href="elements-testimonials.html">Testimonials</a></li>
                                        <li><a href="elements-blog-posts.html">Blog Posts</a></li>
                                        <li><a href="elements-portfolio.html">Portfolio</a></li>
                                        <li><a href="elements-cta.html">Call to Action</a></li>
                                        <li><a href="elements-icon-boxes.html">Icon Boxes</a></li>
                                    </ul>
                                </li>-->
                                <li>
                                    <a href="" class="sf-with-ul">BRANDS</a>

                                    <ul>
                                        <?php
                                            $s ="SELECT * FROM Brands;";
                                            $re = mysqli_query($conn, $s);
                                            while($row = mysqli_fetch_assoc($re)) {
                                                echo('<li><a href="product.php?name='.$row['brand_name'].'">'.$row['brand_name'].'</a></li>');
                                            }

                                        ?>
                                        
                                    </ul>
                                </li>
                                <li>
                                    <a href="category-boxed.php" class="sf-with-ul">ALL PRODUCTS</a>
                                </li>

                                <li class="megamenu-container">
                                    <a href="about.php" class="sf-with-ul">ABOUT</a>
                                </li>   

                                <li>
                                    <a href="contact.php" class="sf-with-ul">CONTACT</a>

                                    
                                </li>    
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .col-lg-9 -->
                    
                    <div class="header-right">
                        <i class="la la-lightbulb-o"></i><p>Clearance Up to 30% Off</span></p>
                    </div>
                </div><!-- End .container -->
            </div><!-- End .header-bottom -->
        </header><!-- End .header -->
        