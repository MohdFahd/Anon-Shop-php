<?php session_start(); include_once("includes/header.php") ?>
<?php require_once("admin/config/dbcon.php") ?>
<?php include_once("includes/navbars.php")?>
<?php
    if(isset($_POST['search-outline']))
    {
        $name = "Search Result";
        $serach = trim($_POST['search']);
        $products = query("SELECT p.id, c.name as 'cat_name', c.id as cat_id, p.name, p.orginal_price, p.selling_price, p.img, p.second_img, p.status, p.trending, p.qty FROM products p JOIN category c ON p.cat_id = c.id WHERE p.status = 1 AND p.name LIKE '%$serach%';");
    }
    else{
    $cat_id = $_GET['id'];
    $name = $_GET['name'];
    $products = query("SELECT p.id, c.name as'cat_name',c.id as cat_id,  p.name, p.orginal_price, p.selling_price ,p.img,p.second_img, p.status, p.trending,p.qty  FROM `products` p ,category c WHERE p.cat_id = c.id and p.status = 1 AND p.cat_id = $cat_id ;");
    }
   
?>
<div class="container">
    <h2 class="title" style="margin: 30px;"><?=$name?></h2>
    <div class="container">
        <div class="container">
            <div class="product-main">
                <div class="product-grid">
                    <?php
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
                                    $check = query("SELECT * from myfavorites where pro_id = $id");
                                    if(count($check) ==0)
                                    {
                                        ?>
                                <button class="btn-action" data-product-id="<?=$pro['id'];?>">
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

                                <button class="btn-action addtocart" data-product-id="<?=$pro['id'];?>">
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
                                <h6 style="color: gray; font-size: 12px; ">Qty =
                                    <?=$pro['qty'];?></h6>
                            </div>

                            <a href="single_product.php?id=<?=$pro['id'];?>">
                                <h3 class="showcase-title"><?=$pro['name'];?></h3>
                            </a>

                            <div class="showcase-rating">
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star-outline"></ion-icon>
                                <ion-icon name="star-outline"></ion-icon>
                            </div>

                            <div class="price-box">
                                <p class="price">$<?=$pro['selling_price'].'.00';?></p>
                                <del><?=$pro['orginal_price'] ? '$'.$pro['orginal_price']. '.00' : '' ?>
                                </del>
                            </div>

                        </div>

                    </div>
                    <?php
                        }
                    }
                    else{
                        echo "<h1>NO ITEAMS ARE AVAILBLE.</h1>";
                    }
                    
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once("includes/footer.php") ?>