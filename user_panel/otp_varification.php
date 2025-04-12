<?php
session_start();

if (isset($_POST['btn_submit'])) {

    $user_otp = $_POST['digit1'] . $_POST['digit2'] . $_POST['digit3'] . $_POST['digit4'] . $_POST['digit5'] . $_POST['digit6'];
    if ($user_otp == $_SESSION['otp']) {

        unset($_SESSION['otp']);
        header("location:change_password.php");
    } else {
        echo "<script>alert('OTP did not match please check it out')</script>";
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>OTP verification</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;400;500;700;900&amp;display=swap" />
    <link rel="shortcut icon" type="image/png" href="assets/images/fav.png" />
    <!--build:css assets/css/styles.min.css-->
    <link rel="stylesheet" href="assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../../../cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
    <link rel="stylesheet" href="assets/css/slick.min.css" />
    <link rel="stylesheet" href="assets/css/fontawesome.css" />
    <link rel="stylesheet" href="assets/css/jquery.modal.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-drawer.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <!--endbuild-->

    <style>
        .otp-textbox {
            height: 60px;
            width: 10px;
            margin-right: 3px;
            font-size: 20px;
            text-align: center;
            scrollbar-width: none;
        }
    </style>
</head>

<body>

    <!-- Menu -->
    <?php
    include "navbar.php";
    ?>
    <!-- / Menu -->

    <div id="content">
        <div class="breadcrumb">
            <div class="container">
                <h2>Forgot Password</h2>
                <ul>
                    <li>Home</li>
                    <li class="active">Verify OTP</li>
                </ul>
            </div>
        </div>
        <div class="shop">
            <div class="container">
                <div class="login-container" style="width: 50%;">

                    <div class="checkout">
                        <div class="container">
                            <form method="post" class="validated-form cta__form__detail">
                                <div class="checkout__form">
                                    <div class="checkout__form__contact">
                                        <div class="checkout__form__contact__title">
                                            <h5 class="checkout-title">Forgot Password? 🔒</h5>
                                            <p class="mb-4"><br />Enter your email and we'll send you instructions<br /> to reset your password</p>
                                        </div>
                                        <div class="input-validator">
                                            <div class="otp_input text-start mb-3 mt-4">
                                                <label for="digit">Type your 6 digit security code<span>*</span></label>
                                                <div class="d-flex align-items-center justify-content-between mt-4 mb-3">
                                                    <input type="text" maxlength="1" oninput="autofocusNext(this,'digit2')" name="digit1" class="form-control otp-textbox" autofocus>
                                                    <input type="text" maxlength="1" oninput="autofocusNext(this,'digit3')" name="digit2" class="form-control otp-textbox">
                                                    <input type="text" maxlength="1" oninput="autofocusNext(this,'digit4')" name="digit3" class="form-control otp-textbox">
                                                    <input type="text" maxlength="1" oninput="autofocusNext(this,'digit5')" name="digit4" class="form-control otp-textbox">
                                                    <input type="text" maxlength="1" oninput="autofocusNext(this,'digit6')" name="digit5" class="form-control otp-textbox">
                                                    <input type="text" maxlength="1" class="form-control otp-textbox" name="digit6">
                                                </div>
                                                <p id="timer" style="text-align:right">59 seconds remaining</p>
                                            </div>

                                        </div>
                                        <button type="submit" style="width: 100%;" name="btn_submit" class="btn -red">Submit</button>

                                        <div class="text-center text-muted mb-2 mt-4" style="display:none">
                                            Didn’t get the code ? <a style="color: #f26460; text-decoration:none; " href="sign_up.php">Resend</a>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
        <?php
        include "footer.php";
        ?>
        <!-- / footer -->
        <div class="drawer drawer-right slide" id="mobile-menu-drawer" tabindex="-1" role="dialog" aria-labelledby="drawer-demo-title" aria-hidden="true">
            <div class="drawer-content drawer-content-scrollable" role="document">
                <div class="drawer-body">
                    <div class="cart-sidebar">
                        <div class="cart-items__wrapper">
                            <div class="navigation-sidebar">
                                <div class="search-box">
                                    <form>
                                        <input type="text" placeholder="What are you looking for?" />
                                        <button><img src="assets/images/header/search-icon.png" alt="Search icon" /></button>
                                    </form>
                                </div>
                                <div class="navigator-mobile">
                                    <ul>
                                        <li class="relative"><a class="dropdown-menu-controller" href="#">Home<span class="dropable-icon"><i class="fas fa-angle-down"></i></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="homepages/homepage1.html/index.html">Beauty Salon</a></li>
                                                <li><a href="homepages/homepage2.html/index.html">Makeup Salon</a></li>
                                                <li><a href="homepages/homepage3.html/index.html">Natural Shop</a></li>
                                                <li><a href="homepages/homepage4.html/index.html">Spa Shop</a></li>
                                                <li><a href="homepages/homepage5.html/index.html">Mask Shop</a></li>
                                                <li><a href="homepages/homepage6.html/index.html">Skincare Shop</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="services.html">Services</a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a class="dropdown-menu-controller" href="#">Shop<span class="dropable-icon"><i class="fas fa-angle-down"></i></span></a>
                                            <ul class="dropdown-menu">
                                                <ul class="dropdown-menu__col">
                                                    <li><a href="shop-fullwidth-4col.html">Shop Fullwidth 4 Columns</a></li>
                                                    <li><a href="shop-fullwidth-5col.html">Shop Fullwidth 5 Columns</a></li>
                                                    <li><a href="shop-fullwidth-left-sidebar.html">Shop Fullwidth Left Sidebar</a></li>
                                                    <li><a href="shop-fullwidth-right-sidebar.html">Shop Fullwidth Right Sidebar</a></li>
                                                </ul>
                                                <ul class="dropdown-menu__col">
                                                    <li><a href="shop-grid-4col.html">Shop grid 4 Columns</a></li>
                                                    <li><a href="shop-grid-3col.html">Shop Grid 3 Columns</a></li>
                                                    <li><a href="shop-grid-sidebar.html">Shop Grid Sideber</a></li>
                                                    <li><a href="shop-list-sidebar.html">Shop List Sidebar</a></li>
                                                </ul>
                                                <ul class="dropdown-menu__col">
                                                    <li><a href="#">Product Detail</a></li>
                                                    <li><a href="cart.html">Shopping cart</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                    <li><a href="wishlist.html">Wish list</a></li>
                                                </ul>
                                                <ul class="dropdown-menu__col -banner"><a href="shop-fullwidth-4col.html"><img src="assets/images/header/dropdown-menu-banner.png" alt="New product banner.html" /></a>
                                                </ul>
                                            </ul>
                                        </li>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </div>
                                <div class="navigation-sidebar__footer">
                                    <select class="customed-select -borderless" name="currency">
                                        <option value="usd">USD</option>
                                        <option value="vnd">VND</option>
                                        <option value="yen">YEN</option>
                                    </select>
                                    <select class="customed-select -borderless" name="currency">
                                        <option value="en">EN</option>
                                        <option value="vi">VI</option>
                                        <option value="jp">JP</option>
                                    </select>
                                </div>
                                <div class="social-icons ">
                                    <ul>
                                        <li><a href="https://www.facebook.com/" style="color: undefined"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://twitter.com/" style="color: undefined"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="https://instagram.com/" style="color: undefined"><i class="fab fa-instagram"> </i></a>
                                        </li>
                                        <li><a href="https://www.youtube.com/" style="color: undefined"><i class="fab fa-youtube"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="quick-view-modal">
            <div class="product-quickview">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="product-detail__slide-one">
                            <div class="slider-wrapper">
                                <div class="slider-item"><img src="assets/images/product/1.png" alt="Product image" /></div>
                                <div class="slider-item"><img src="assets/images/product/2.png" alt="Product image" /></div>
                                <div class="slider-item"><img src="assets/images/product/3.png" alt="Product image" /></div>
                                <div class="slider-item"><img src="assets/images/product/4.png" alt="Product image" /></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="product-detail__content">
                            <div class="product-detail__content__header">
                                <h5>eyes</h5>
                                <h2>The expert mascaraa</h2>
                            </div>
                            <div class="product-detail__content__header__comment-block">
                                <div class="rate"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                                <p>03 review</p><a href="#">Write a reviews</a>
                            </div>
                            <h3>$35.00</h3>
                            <div class="divider"></div>
                            <div class="product-detail__content__footer">
                                <ul>
                                    <li>Brand:gucci
                                    </li>
                                    <li>Product code: PM 01
                                    </li>
                                    <li>Reward point: 30
                                    </li>
                                    <li>Availability: In Stock</li>
                                </ul>
                                <div class="product-detail__colors"><span>Color:</span>
                                    <div class="product-detail__colors__item" style="background-color: #8B0000"></div>
                                    <div class="product-detail__colors__item" style="background-color: #4169E1"></div>
                                </div>
                                <div class="product-detail__controller">
                                    <div class="quantity-controller -border -round">
                                        <div class="quantity-controller__btn -descrease">-</div>
                                        <div class="quantity-controller__number">2</div>
                                        <div class="quantity-controller__btn -increase">+</div>
                                    </div>
                                    <div class="add-to-cart -dark"><a class="btn -round -red" href="#"><i class="fas fa-shopping-bag"></i></a>
                                        <h5>Add to cart</h5>
                                    </div>
                                    <div class="product-detail__controler__actions"></div><a class="btn -round -white" href="#"><i class="fas fa-heart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--build:js assets/js/main.min.js-->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/parallax.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/jquery.modal.min.js"></script>
    <script src="assets/js/bootstrap-drawer.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <script src="assets/js/main.min.js"></script>
    <!--endbuild-->


    <!--time out-->
    <script>
        function autofocusNext(current, nextinput) {
            if (current.value.length === current.maxLength) {
                document.getElementsByName(nextinput)[0].focus();
            }
        }


        var count = 5;
        var timer = setInterval(function() {
            count--;
            if (count == 0) {
                clearInterval(timer);
                document.getElementById("timer").innerHTML = "Time's up!";
                document.querySelector(".text-muted").style.display = "block";
                document.querySelector("#timer").style.display = "none";
            } else {
                document.getElementById("timer").innerHTML = count + " seconds remaining";
            }
        }, 1000);
    </script>
</body>

</html>