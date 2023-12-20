<?php require_once("./admin/config/dbcon.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anon - eCommerce Website</title>

    <!-- Alertify js && css -->

    <!-- JavaScript -->
    <script src="./assets/js/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="./assets/css/default.min.css" />


    <!--
    - favicon
  -->
    <link rel="shortcut icon" href="./assets/images/logo/favicon.ico" type="image/x-icon">

    <!--
    - custom css link
  -->
    <!-- <link rel="stylesheet" href="./assets/css/bootstrap.min.css"> -->
    <script src="./assets/js/jquery-3.7.0.min.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./assets/css/style-prefix.css">

    <!--
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <style>
    .my_btn {
        width: 80px;
        height: 40px;
    }

    .txt {
        font-size: 14px;
        color: gray;
    }

    a {
        text-decoration: none;
    }

    .mobile-only {
        display: none;
    }

    /* CSS for mobile screens */
    @media (max-width: 767px) {
        .desktop-only {
            display: none;
        }

        .mobile-only {
            display: block;
        }
    }
    </style>
</head>

<body>


    <div class="overlay" data-overlay></div>

    <!--
    - MODAL
  -->

    <?php
  if(!isset($_SESSION['auth']))
  {
    ?>
    <div class="modal" data-modal>

        <div class="modal-close-overlay" data-modal-overlay></div>

        <div class="modal-content">

            <button class="modal-close-btn" data-modal-close>
                <ion-icon name="close-outline"></ion-icon>
            </button>

            <div class="newsletter-img">
                <img src="./assets/images/newsletter.png" alt="subscribe newsletter" width="400" height="400">
            </div>

            <div class="newsletter">

                <form action="#">

                    <div class="newsletter-header">

                        <h3 class="newsletter-title">Subscribe Newsletter.</h3>

                        <p class="newsletter-desc">
                            Subscribe the <b>Anon</b> to get latest products and discount update.
                        </p>

                    </div>

                    <input type="email" name="email" class="email-field" placeholder="Email Address" required>

                    <button type="submit" class="btn-newsletter">Subscribe</button>

                </form>

            </div>

        </div>

    </div>

    <?php
  }
    ?>




    <!--
    - NOTIFICATION TOAST
  -->

    <div class="notification-toast" data-toast>

        <button class="toast-close-btn" data-toast-close>
            <ion-icon name="close-outline"></ion-icon>
        </button>

        <div class="toast-banner">
            <img src="./assets/images/products/jewellery-1.jpg" alt="Rose Gold Earrings" width="80" height="70">
        </div>

        <div class="toast-detail">

            <p class="toast-message">
                Someone in new just bought
            </p>

            <p class="toast-title">
                Rose Gold Earrings
            </p>

            <p class="toast-meta">
                <time datetime="PT2M">2 Minutes</time> ago
            </p>

        </div>

    </div>





    <!--
    - HEADER
  -->
    <div class="sidebar has-scrollbar mobile-only" data-mobile-menu>

        <div class="sidebar-category">

            <div class="sidebar-top">
                <h2 class="sidebar-title">Category</h2>

                <button class="sidebar-close-btn" data-mobile-menu-close-btn>
                    <ion-icon name="close-outline"></ion-icon>
                </button>
            </div>

            <ul class="sidebar-menu-category-list">

                <li class="sidebar-menu-category">

                    <button class="sidebar-accordion-menu" data-accordion-btn>

                        <div class="menu-title-flex">
                            <img src="./assets/images/icons/dress.svg" alt="clothes" width="20" height="20"
                                class="menu-title-img">

                            <p class="menu-title">Clothes</p>
                        </div>

                        <div>
                            <ion-icon name="add-outline" class="add-icon"></ion-icon>
                            <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                        </div>

                    </button>

                    <ul class="sidebar-submenu-category-list" data-accordion>

                        <?php
                                $clothes = query("SELECT id,name,slug FROM category WHERE SLUG = 'clothes'");
                                if (count($clothes))
                                {
                                     foreach ($clothes as $sclo)
                                     {
                                        ?>
                        <li class="sidebar-submenu-category">
                            <a href="./Products.php?id=<?=$sclo['id']?>&name=Clothes" class="sidebar-submenu-title">
                                <p class="product-name"><?= $sclo['name'] ?></p>
                                <?php
                                            $cat_id = $sclo['id'];
                                            $qty = query("SELECT * FROM products WHERE cat_id = $cat_id;") ?>
                                <data value="<?=count($qty)?>" class="stock"
                                    title="Available Stock"><?=count($qty)?></data>
                            </a>
                        </li>
                        <?php
                                     }    
                                }
                                ?>

                    </ul>

                </li>

                <li class="sidebar-menu-category">

                    <button class="sidebar-accordion-menu" data-accordion-btn>

                        <div class="menu-title-flex">
                            <img src="./assets/images/icons/shoes.svg" alt="footwear" class="menu-title-img" width="20"
                                height="20">

                            <p class="menu-title">Footwear</p>
                        </div>

                        <div>
                            <ion-icon name="add-outline" class="add-icon"></ion-icon>
                            <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                        </div>

                    </button>

                    <ul class="sidebar-submenu-category-list" data-accordion>
                        <?php
                                $Footwear = query("SELECT id,name,slug FROM category WHERE SLUG = 'Footwear'");
                                if (count($Footwear))
                                {
                                     foreach ($Footwear as $iteam)
                                     {
                                        ?>
                        <li class="sidebar-submenu-category">
                            <a href="./Products.php?id=<?=$iteam['id']?>&name=Footwear" class="sidebar-submenu-title">
                                <p class="product-name"><?= $iteam['name'] ?></p>
                                <?php
                                            $cat_id = $iteam['id'];
                                            $qty = query("SELECT * FROM products WHERE cat_id = $cat_id;") ?>
                                <data value="<?=count($qty)?>" class="stock"
                                    title="Available Stock"><?=count($qty)?></data>
                            </a>
                        </li>
                        <?php
                                     }    
                                }
                                ?>

                    </ul>

                </li>

                <li class="sidebar-menu-category">

                    <button class="sidebar-accordion-menu" data-accordion-btn>

                        <div class="menu-title-flex">
                            <img src="./assets/images/icons/jewelry.svg" alt="clothes" class="menu-title-img" width="20"
                                height="20">

                            <p class="menu-title">Jewelry</p>
                        </div>

                        <div>
                            <ion-icon name="add-outline" class="add-icon"></ion-icon>
                            <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                        </div>

                    </button>

                    <ul class="sidebar-submenu-category-list" data-accordion>

                        <?php
                                $Jewelry = query("SELECT id,name,slug FROM category WHERE SLUG = 'Jewelry'");
                                if (count($Jewelry))
                                {
                                     foreach ($Jewelry as $iteam)
                                     {
                                        ?>
                        <li class="sidebar-submenu-category">
                            <a href="./Products.php?id=<?=$iteam['id']?>&name=Jewelry" class="sidebar-submenu-title">
                                <p class="product-name"><?= $iteam['name'] ?></p>
                                <?php
                                            $cat_id = $iteam['id'];
                                            $qty = query("SELECT * FROM products WHERE cat_id = $cat_id;") ?>
                                <data value="<?=count($qty)?>" class="stock"
                                    title="Available Stock"><?=count($qty)?></data>
                            </a>
                        </li>
                        <?php
                                     }    
                                }
                                ?>
                    </ul>

                </li>

                <li class="sidebar-menu-category">

                    <button class="sidebar-accordion-menu" data-accordion-btn>

                        <div class="menu-title-flex">
                            <img src="./assets/images/icons/perfume.svg" alt="perfume" class="menu-title-img" width="20"
                                height="20">

                            <p class="menu-title">Perfume</p>
                        </div>

                        <div>
                            <ion-icon name="add-outline" class="add-icon"></ion-icon>
                            <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                        </div>

                    </button>

                    <ul class="sidebar-submenu-category-list" data-accordion>

                        <?php
                                $Perfume = query("SELECT id,name,slug FROM category WHERE SLUG = 'Perfume'");
                                if (count($Perfume))
                                {
                                     foreach ($Perfume as $iteam)
                                     {
                                        ?>
                        <li class="sidebar-submenu-category">
                            <a href="./Products.php?id=<?=$iteam['id']?>&name=Perfume" class="sidebar-submenu-title">
                                <p class="product-name"><?= $iteam['name'] ?></p>
                                <?php
                                            $cat_id = $iteam['id'];
                                            $qty = query("SELECT * FROM products WHERE cat_id = $cat_id;") ?>
                                <data value="<?=count($qty)?>" class="stock"
                                    title="Available Stock"><?=count($qty)?></data>
                            </a>
                        </li>
                        <?php
                                     }    
                                }
                                ?>
                    </ul>

                </li>

                <li class="sidebar-menu-category">

                    <button class="sidebar-accordion-menu" data-accordion-btn>

                        <div class="menu-title-flex">
                            <img src="./assets/images/icons/cosmetics.svg" alt="cosmetics" class="menu-title-img"
                                width="20" height="20">

                            <p class="menu-title">Cosmetics</p>
                        </div>

                        <div>
                            <ion-icon name="add-outline" class="add-icon"></ion-icon>
                            <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                        </div>

                    </button>

                    <ul class="sidebar-submenu-category-list" data-accordion>
                        <?php
                                $Cosmetics = query("SELECT id,name,slug FROM category WHERE SLUG = 'Cosmetics'");
                                if (count($Cosmetics))
                                {
                                     foreach ($Cosmetics as $iteam)
                                     {
                                        ?>
                        <li class="sidebar-submenu-category">
                            <a href="./Products.php?id=<?=$iteam['id']?>&name=Cosmetics" class="sidebar-submenu-title">
                                <p class="product-name"><?= $iteam['name'] ?></p>
                                <?php
                                            $cat_id = $iteam['id'];
                                            $qty = query("SELECT * FROM products WHERE cat_id = $cat_id;") ?>
                                <data value="<?=count($qty)?>" class="stock"
                                    title="Available Stock"><?=count($qty)?></data>
                            </a>
                        </li>
                        <?php
                                     }    
                                }
                                ?>
                    </ul>

                </li>

                <li class="sidebar-menu-category">

                    <button class="sidebar-accordion-menu" data-accordion-btn>

                        <div class="menu-title-flex">
                            <img src="./assets/images/icons/glasses.svg" alt="glasses" class="menu-title-img" width="20"
                                height="20">

                            <p class="menu-title">Glasses</p>
                        </div>

                        <div>
                            <ion-icon name="add-outline" class="add-icon"></ion-icon>
                            <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                        </div>

                    </button>

                    <ul class="sidebar-submenu-category-list" data-accordion>

                        <?php
                                $Glasses = query("SELECT id,name,slug FROM category WHERE SLUG = 'Glasses'");
                                if (count($Glasses))
                                {
                                     foreach ($Glasses as $iteam)
                                     {
                                        ?>
                        <li class="sidebar-submenu-category">
                            <a href="./Products.php?id=<?=$iteam['id']?>&name=Glasses" class="sidebar-submenu-title">
                                <p class="product-name"><?= $iteam['name'] ?></p>
                                <?php
                                            $cat_id = $iteam['id'];
                                            $qty = query("SELECT * FROM products WHERE cat_id = $cat_id;") ?>
                                <data value="<?=count($qty)?>" class="stock"
                                    title="Available Stock"><?=count($qty)?></data>
                            </a>
                        </li>
                        <?php
                                     }    
                                }
                                ?>

                    </ul>

                </li>

                <li class="sidebar-menu-category">

                    <button class="sidebar-accordion-menu" data-accordion-btn>

                        <div class="menu-title-flex">
                            <img src="./assets/images/icons/bag.svg" alt="bags" class="menu-title-img" width="20"
                                height="20">

                            <p class="menu-title">Bags</p>
                        </div>

                        <div>
                            <ion-icon name="add-outline" class="add-icon"></ion-icon>
                            <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                        </div>

                    </button>

                    <ul class="sidebar-submenu-category-list" data-accordion>

                        <?php
                                $Bags = query("SELECT id,name,slug FROM category WHERE SLUG = 'Bags'");
                                if (count($Bags))
                                {
                                     foreach ($Bags as $iteam)
                                     {
                                        ?>
                        <li class="sidebar-submenu-category">
                            <a href="./Products.php?id=<?=$iteam['id']?>&name=Bags" class="sidebar-submenu-title">
                                <p class="product-name"><?= $iteam['name'] ?></p>
                                <?php
                                            $cat_id = $iteam['id'];
                                            $qty = query("SELECT * FROM products WHERE cat_id = $cat_id;") ?>
                                <data value="<?=count($qty)?>" class="stock"
                                    title="Available Stock"><?=count($qty)?></data>
                            </a>
                        </li>
                        <?php
                                     }    
                                }
                                ?>

                    </ul>

                </li>

            </ul>

        </div>

        <div class="product-showcase">

            <h3 class="showcase-heading">best sellers</h3>

            <div class="showcase-wrapper">

                <div class="showcase-container">
                    <?php
                            $bestSales = query("SELECT * FROM products WHERE STATUS = 1 ORDER BY Sales DESC LIMIT 5;");
                            if(count($bestSales))
                            {
                                foreach($bestSales as $sale)
                                {
                                    ?>
                    <div class="showcase">

                        <a href="#" class="showcase-img-box">
                            <img src="./uploads/<?= $sale['img']; ?>" alt="<?= $sale['img']; ?>" width="75" height="75"
                                class="showcase-img">
                        </a>

                        <div class="showcase-content">

                            <a href="#">
                                <h4 class="showcase-title"><?= $sale['name']; ?></h4>
                            </a>

                            <div class="showcase-rating">
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                            </div>

                            <div class="price-box">
                                <del><?=$sale['orginal_price'] ? '$'.$sale['orginal_price']. '.00' : '' ?></del>
                                <p class="price">
                                    $<?=$sale['selling_price']?>.00</p>
                            </div>

                        </div>

                    </div>
                    <?php
                                }
                            }
                            ?>
                </div>

            </div>

        </div>

    </div>
    <header>

        <div class="header-top">

            <div class="container">

                <ul class="header-social-container">

                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-facebook"></ion-icon>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-twitter"></ion-icon>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-instagram"></ion-icon>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-linkedin"></ion-icon>
                        </a>
                    </li>

                </ul>

                <div class="header-alert-news">
                    <p>
                        <b>Free Shipping</b>
                        This Week Order Over - $55
                    </p>
                </div>

                <div class="header-top-actions">

                    <?php
                    if(!isset($_SESSION['auth']))
                    {
                        ?>
                    <a href="./login.php"><button type="button"
                            class="btn btn-outline-primary my_btn">Login</button></a>
                    <a href="./sign_up.php"><button type="button"
                            class="btn btn-outline-success my_btn">Register</button></a>
                    <?php
                    }
                    else{
                        ?>
                    <img src="./assets/icons/log-out-outline.svg" alt="" width="20px">
                    <form action="./functions/auth.php" method="post" class="d-flex">
                        <button class="txt" type="submit" name="signOutBtn">Sign out</button>
                    </form>
                    <?php
                    }
                    ?>
                </div>

            </div>

        </div>

        <div class="header-main">

            <div class="container">

                <a href="./index.php" class="header-logo">
                    <img src="./assets/img/logo.svg" alt="Anon's logo" width="120" height="36">
                </a>

                <div class="header-search-container">
                    <form action="./Products.php" method="post">

                        <input type="search" name="search" class="search-field"
                            placeholder="Enter your product name...">

                        <button class="search-btn" name="search-outline">
                            <ion-icon name="search-outline"></ion-icon>
                        </button>
                    </form>
                </div>

                <div class="header-user-actions count-heart">
                    <?php
                    if(isset($_SESSION['auth']))
                    {
                        ?>
                    <a href="./Account.php">
                        <button class="action-btn">
                            <img src="./assets/icons/person-outline.svg" alt="" width="35px">
                        </button>
                    </a>
                    <?php $user_id = $_SESSION['auth_user']['user_id'];
                    $favRows = qselectf("SELECT COUNT(pro_id) as 'row' from myfavorites where user_id = $user_id; ") ?>
                    <a href="myfavorite.php?name=Favorites">
                        <button class="action-btn">
                            <img src="./assets/icons/heart-outline.svg" alt="" width="35px">
                            <span class="count"><?=$favRows['row'];?></span>
                        </button>
                    </a>
                    <?php 
                    $cart = qselectf("SELECT COUNT(pro_id) as 'crow' from cart where user_id = $user_id; ") ?>
                    <a href="shop-single.php">
                        <button class="action-btn">

                            <img src="./assets/icons/bag-handle-outline.svg" alt="" width="35px">
                            <span class="count"><?=$cart['crow'];?></span>
                        </button>
                    </a>
                    <?php
                    }
                    else{
                           ?>
                    <a href="./login.php" style="display: flex;">
                        <button class="action-btn">
                            <ion-icon name="person-outline"></ion-icon>
                        </button>
                        <button class="action-btn">
                            <ion-icon name="heart-outline"></ion-icon>
                            <span class="count">0</span>
                        </button>

                        <button class="action-btn">
                            <ion-icon name="bag-handle-outline"></ion-icon>
                            <span class="count">0</span>
                        </button>
                    </a>
                    <?php
                    }
                    ?>
                </div>

            </div>

        </div>