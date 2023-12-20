    <?php require_once("./admin/config/dbcon.php");
      ?>

    <div class="product-container">

        <div class="container">


            <!--
          - SIDEBAR
        -->

            <div class="sidebar  has-scrollbar" data-modal-overlay data-mobile-menu>

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
                                    <a href="./Products.php?id=<?=$sclo['id']?>&name=Clothes"
                                        class="sidebar-submenu-title">
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
                                    <img src="./assets/images/icons/shoes.svg" alt="footwear" class="menu-title-img"
                                        width="20" height="20">

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
                                    <a href="./Products.php?id=<?=$iteam['id']?>&name=Footwear"
                                        class="sidebar-submenu-title">
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
                                    <img src="./assets/images/icons/jewelry.svg" alt="clothes" class="menu-title-img"
                                        width="20" height="20">

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
                                    <a href="./Products.php?id=<?=$iteam['id']?>&name=Jewelry"
                                        class="sidebar-submenu-title">
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
                                    <img src="./assets/images/icons/perfume.svg" alt="perfume" class="menu-title-img"
                                        width="20" height="20">

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
                                    <a href="./Products.php?id=<?=$iteam['id']?>&name=Perfume"
                                        class="sidebar-submenu-title">
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
                                    <img src="./assets/images/icons/cosmetics.svg" alt="cosmetics"
                                        class="menu-title-img" width="20" height="20">

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
                                    <a href="./Products.php?id=<?=$iteam['id']?>&name=Cosmetics"
                                        class="sidebar-submenu-title">
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
                                    <img src="./assets/images/icons/glasses.svg" alt="glasses" class="menu-title-img"
                                        width="20" height="20">

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
                                    <a href="./Products.php?id=<?=$iteam['id']?>&name=Glasses"
                                        class="sidebar-submenu-title">
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
                                    <img src="./assets/images/icons/bag.svg" alt="bags" class="menu-title-img"
                                        width="20" height="20">

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
                                    <a href="./Products.php?id=<?=$iteam['id']?>&name=Bags"
                                        class="sidebar-submenu-title">
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
                                    <img src="./uploads/<?= $sale['img']; ?>" alt="<?= $sale['img']; ?>" width="75"
                                        height="75" class="showcase-img">
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



            <div class="product-box">

                <!--
            - PRODUCT MINIMAL
          -->

                <div class="product-minimal">

                    <div class="product-showcase">

                        <h2 class="title">New Arrivals</h2>

                        <div class="showcase-wrapper has-scrollbar">

                            <?php
                        $product = query("SELECT p.id, c.name as'cat_name' ,c.id as cat_id, p.name, p.orginal_price, p.selling_price ,p.img, p.status, p.trending  FROM `products` p ,category c WHERE p.cat_id = c.id AND p.status=1 ORDER BY p.created_at DESC LIMIT  12;");
                        $cols = ceil(count($product) / 4);
                        // Initialize a counter to keep track of the number of products displayed
                        $productCounter = 0;
                            for ($i = 0; $i < $cols; $i++) {
                            ?>
                            <div class="showcase-container">
                                <?php
                                // Loop through the products
                                for ($j = 0; $j < 4; $j++) {
                                    // Check if there are more products to display
                                    if ($productCounter < count($product)) {
                                        $pro = $product[$productCounter];
                                        ?>
                                <div class="showcase">

                                    <a href="#" class="showcase-img-box">
                                        <img src="./uploads/<?= $pro['img'] ?>" alt="<?= $pro['img'] ?>" width="70"
                                            class="showcase-img">
                                    </a>

                                    <div class="showcase-content">

                                        <a href="#">
                                            <h4 class="showcase-title"><?= $pro['name'] ?></h4>
                                        </a>

                                        <a href="./Products.php?id=<?=$pro['cat_id']?>&name=<?=$pro['cat_name'];?>"
                                            class="showcase-category"><?= $pro['cat_name'] ?></a>

                                        <div class="price-box">
                                            <p class="price">$<?= $pro['selling_price'].'.00' ?></p>
                                            <del><?=$pro['orginal_price'] ? '$'.$pro['orginal_price']. '.00' : '' ?></del>
                                        </div>

                                    </div>

                                </div>
                                <?php
                                    // Increment the product counter
                                     $productCounter++;
                                    }
                                }
                                ?>
                            </div>
                            <?php
}
?>
                        </div>

                    </div>

                    <div class="product-showcase">

                        <h2 class="title">Trending</h2>

                        <div class="showcase-wrapper  has-scrollbar">

                            <?php
                        $product = query("SELECT p.id, c.name as'cat_name',c.id as cat_id , p.name, p.orginal_price, p.selling_price ,p.img, p.status, p.trending  FROM `products` p ,category c WHERE p.cat_id = c.id AND p.status=1 AND p.trending=1 LIMIT  12;");
                        $cols = ceil(count($product) / 4);
                        // Initialize a counter to keep track of the number of products displayed
                        $productCounter = 0;
                            for ($i = 0; $i < $cols; $i++) {
                            ?>
                            <div class="showcase-container">
                                <?php
                                // Loop through the products
                                for ($j = 0; $j < 4; $j++) {
                                    // Check if there are more products to display
                                    if ($productCounter < count($product)) {
                                        $pro = $product[$productCounter];
                                        ?>
                                <div class="showcase">

                                    <a href="#" class="showcase-img-box">
                                        <img src="./uploads/<?= $pro['img'] ?>" alt="<?= $pro['img'] ?>" width="70"
                                            class="showcase-img">
                                    </a>

                                    <div class="showcase-content">

                                        <a href="#">
                                            <h4 class="showcase-title"><?= $pro['name'] ?></h4>
                                        </a>

                                        <a href="./Products.php?id=<?=$pro['cat_id']?>&name=<?=$pro['cat_name'];?>"
                                            class="showcase-category"><?= $pro['cat_name'] ?></a>

                                        <div class="price-box">
                                            <p class="price">$<?= $pro['selling_price'].'.00' ?></p>
                                            <del><?=$pro['orginal_price'] ? '$'.$pro['orginal_price']. '.00' : '' ?></del>
                                        </div>

                                    </div>

                                </div>
                                <?php
                                    // Increment the product counter
                                     $productCounter++;
                                    }
                                }
                                ?>
                            </div>
                            <?php
}
?>

                        </div>

                    </div>

                    <div class="product-showcase">

                        <h2 class="title">Top Rated</h2>

                        <div class="showcase-wrapper  has-scrollbar">

                            <?php
                        $product = query("SELECT p.id, c.name as'cat_name',c.id as cat_id , p.name, p.orginal_price, p.selling_price ,p.img, p.status, p.trending,p.sales  FROM `products` p ,category c WHERE p.cat_id = c.id AND p.status=1 ORDER BY p.Sales DESC LIMIT  12;");
                        $cols = ceil(count($product) / 4);
                        // Initialize a counter to keep track of the number of products displayed
                        $productCounter = 0;
                            for ($i = 0; $i < $cols; $i++) {
                            ?>
                            <div class="showcase-container">
                                <?php
                                // Loop through the products
                                for ($j = 0; $j < 4; $j++) {
                                    // Check if there are more products to display
                                    if ($productCounter < count($product)) {
                                        $pro = $product[$productCounter];
                                        ?>
                                <div class="showcase">

                                    <a href="#" class="showcase-img-box">
                                        <img src="./uploads/<?= $pro['img'] ?>" alt="<?= $pro['img'] ?>" width="70"
                                            class="showcase-img">
                                    </a>

                                    <div class="showcase-content">

                                        <a href="#">
                                            <h4 class="showcase-title"><?= $pro['name'] ?></h4>
                                        </a>

                                        <a href="./Products.php?id=<?=$pro['cat_id']?>&name=<?=$pro['cat_name'];?>"
                                            class="showcase-category"><?= $pro['cat_name'] ?></a>

                                        <div class="price-box">
                                            <p class="price">$<?= $pro['selling_price'].'.00' ?></p>
                                            <del><?=$pro['orginal_price'] ? '$'.$pro['orginal_price']. '.00' : '' ?></del>
                                        </div>

                                    </div>

                                </div>
                                <?php
                                    // Increment the product counter
                                     $productCounter++;
                                    }
                                }
                                ?>
                            </div>
                            <?php
}
?>

                        </div>

                    </div>

                </div>



                <!--
            - PRODUCT FEATURED
          -->

                <div class="product-featured" data-modal>

                    <h2 class="title">Deal of the day</h2>

                    <div class="showcase-wrapper has-scrollbar">

                        <div class="showcase-container">

                            <div class="showcase">

                                <div class="showcase-banner">
                                    <img src="./uploads/hat.png" alt="shampoo, conditioner & facewash packs"
                                        class="showcase-img">
                                </div>

                                <div class="showcase-content">

                                    <div class="showcase-rating">
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star-outline"></ion-icon>
                                        <ion-icon name="star-outline"></ion-icon>
                                    </div>

                                    <a href="#">
                                        <h3 class="showcase-title">BTS PURPLE LOGO BANGTAN BOYS</h3>
                                    </a>

                                    <p class="showcase-desc">
                                        Lorem ipsum dolor sit amet consectetur Lorem ipsum
                                        dolor dolor sit amet consectetur Lorem ipsum dolor
                                    </p>

                                    <div class="price-box">
                                        <p class="price">$9.00</p>

                                        <del>$30.00</del>
                                    </div>

                                    <button class="add-cart-btn">add to cart</button>

                                    <div class="showcase-status">
                                        <div class="wrapper">
                                            <p>
                                                already sold: <b>20</b>
                                            </p>

                                            <p class="available">
                                                available: <b>40</b>
                                            </p>
                                        </div>

                                        <div class="showcase-status-bar"></div>
                                    </div>

                                    <div class="countdown-box">

                                        <p class="countdown-desc">
                                            Hurry Up! Offer ends in:
                                        </p>

                                        <div class="countdown">

                                            <div class="countdown-content">

                                                <p class="display-number">360</p>

                                                <p class="display-text">Days</p>

                                            </div>

                                            <div class="countdown-content">
                                                <p class="display-number">24</p>
                                                <p class="display-text">Hours</p>
                                            </div>

                                            <div class="countdown-content">
                                                <p class="display-number">59</p>
                                                <p class="display-text">Min</p>
                                            </div>

                                            <div class="countdown-content">
                                                <p class="display-number">00</p>
                                                <p class="display-text">Sec</p>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="showcase-container">

                            <div class="showcase">

                                <div class="showcase-banner">
                                    <img src="./assets/images/products/jewellery-1.jpg" alt="Rose Gold diamonds Earring"
                                        class="showcase-img">
                                </div>

                                <div class="showcase-content">

                                    <div class="showcase-rating">
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star-outline"></ion-icon>
                                        <ion-icon name="star-outline"></ion-icon>
                                    </div>

                                    <h3 class="showcase-title">
                                        <a href="#" class="showcase-title">Rose Gold diamonds Earring</a>
                                    </h3>

                                    <p class="showcase-desc">
                                        Lorem ipsum dolor sit amet consectetur Lorem ipsum
                                        dolor dolor sit amet consectetur Lorem ipsum dolor
                                    </p>

                                    <div class="price-box">
                                        <p class="price">$1990.00</p>
                                        <del>$2000.00</del>
                                    </div>

                                    <button class="add-cart-btn">add to cart</button>

                                    <div class="showcase-status">
                                        <div class="wrapper">
                                            <p> already sold: <b>15</b> </p>

                                            <p> available: <b>40</b> </p>
                                        </div>

                                        <div class="showcase-status-bar"></div>
                                    </div>

                                    <div class="countdown-box">

                                        <p class="countdown-desc">Hurry Up! Offer ends in:</p>

                                        <div class="countdown">
                                            <div class="countdown-content">
                                                <p class="display-number">360</p>
                                                <p class="display-text">Days</p>
                                            </div>

                                            <div class="countdown-content">
                                                <p class="display-number">24</p>
                                                <p class="display-text">Hours</p>
                                            </div>

                                            <div class="countdown-content">
                                                <p class="display-number">59</p>
                                                <p class="display-text">Min</p>
                                            </div>

                                            <div class="countdown-content">
                                                <p class="display-number">00</p>
                                                <p class="display-text">Sec</p>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!--
            - PRODUCT GRID
          -->

                <div class="product-main">

                    <h2 class="title">New Products</h2>

                    <div class="product-grid">
                        <?php
                        $products = query("SELECT p.id, c.name as'cat_name',c.id as cat_id, p.name, p.orginal_price, p.selling_price ,p.img,p.second_img, p.status, p.trending,p.qty  FROM `products` p ,category c WHERE p.cat_id = c.id and p.status = 1 LIMIT 9;");
                        if(count($products))
                        {
                            foreach($products as $pro)
                            {
                                ?>
                        <div class="showcase">

                            <div class="showcase-banner">

                                <img src="./uploads/<?=$pro['img'];?>" alt="<?=$pro['img'];?>" width="300"
                                    class="product-img default">
                                <img src="./uploads/<?=$pro['second_img'] ? $pro['second_img'] : $pro['img'];?>"
                                    alt="<?=$pro['second_img'];?>"
                                    alt="<?=$pro['second_img'] ? $pro['second_img'] : $pro['img'];?>" width="300"
                                    class="product-img hover">

                                <?php
                                   if($pro['qty'] <=0)
                                   {
                                    ?>
                                <p class="showcase-badge angle black">sale</p>

                                <?php
                                   }
                                    ?>

                                <!-- <p class="showcase-badge">15%</p> -->
                                <?php
                                if(isset($_SESSION['auth']))
                                {
                                    ?>
                                <div class="showcase-actions">
                                    <?php
                                    $id = $pro['id'];
                                    $user_id = $_SESSION['auth_user']['user_id'];
                                    $check = query("SELECT * from myfavorites where pro_id = $id and user_id = $user_id ");
                                    if(count($check) ==0)
                                    {
                                        ?>
                                    <button class="btn-action" data-product-id="<?= $pro['id']; ?>"
                                        data-product-name="<?= $pro['name']; ?>"
                                        data-selling-price="<?= $pro['selling_price']; ?>"
                                        data-original-price="<?= $pro['orginal_price']; ?>">
                                        <ion-icon name="heart-outline"></ion-icon>
                                    </button>


                                    <?php
                                    }
                                    else{
                                        ?>
                                    <button class="btn-action btn_action" style="background-color: black; color: white;"
                                        id="btn_action" data-product-id="<?=$pro['id'];?>">
                                        <ion-icon name="heart-outline"></ion-icon>
                                    </button>
                                    <?php
                                    }
                                    ?>




                                    <a href="single_product.php?id=<?=$pro['id'];?>">
                                        <button class="btn-action">
                                            <ion-icon name="eye-outline"></ion-icon>
                                        </button>
                                    </a>

                                    <button class="btn-action">
                                        <ion-icon name="repeat-outline"></ion-icon>
                                    </button>

                                    <button class="btn-action addtocart" <?= $pro['qty'] <= 0 ? 'disabled' : '' ?>
                                        data-product-id="<?=$pro['id'];?>">
                                        <input type="hidden" class="exsit_qty" value="<?=$pro['qty'];?>"
                                            data-exsit_qty="<?=$pro['qty'];?>" name="">
                                        <ion-icon name="bag-add-outline"></ion-icon>
                                    </button>
                                </div>
                                <?php
                                }
                                else{
                                    ?>
                                <div class="showcase-actions">

                                    <a href="./login.php">
                                        <button class="btn-action">
                                            <ion-icon name="heart-outline"></ion-icon>
                                        </button>
                                        <button class="btn-action">
                                            <ion-icon name="eye-outline"></ion-icon>
                                        </button>

                                        <button class="btn-action">
                                            <ion-icon name="repeat-outline"></ion-icon>
                                        </button>

                                        <button class="btn-action">
                                            <ion-icon name="bag-add-outline"></ion-icon>
                                        </button>
                                    </a>

                                </div>
                                <?php
                                }
                                ?>
                            </div>

                            <div class="showcase-content">

                                <div style="display: flex; justify-content: space-between;">
                                    <a href="./Products.php?id=<?=$pro['cat_id']?>&name=<?=$pro['cat_name'];?>"
                                        class="showcase-category"><?=$pro['cat_name'];?></a>
                                    <h6 style="color: gray; font-size: 12px;">Qty =
                                        <?=$pro['qty'];?></h6>
                                </div>

                                <a href="single_product.php?id=<?=$pro['id'];?>">
                                    <h3 class="showcase-title" id="name"><?=$pro['name'];?></h3>
                                </a>

                                <div class="showcase-rating">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star-outline"></ion-icon>
                                    <ion-icon name="star-outline"></ion-icon>
                                </div>

                                <div class="price-box">
                                    <p id="selling_price" class="price">$<?=$pro['selling_price'].'.00';?></p>
                                    <del id="orginal_price"><?=$pro['orginal_price'] ? '$'.$pro['orginal_price']. '.00' : '' ?>
                                    </del>
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

    </div>
    <script>

    </script>