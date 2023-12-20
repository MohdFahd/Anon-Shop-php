<?php session_start(); include_once("includes/header.php") ?>
<?php require_once("admin/config/dbcon.php") ?>
<?php include_once("includes/navbars.php") ?>
<link rel="stylesheet" href="assets/css/tiny-slider.css">
<link rel="stylesheet" href="assets/css/theme.min.css">

<div class="container">
    <main>
        <section class="mt-8 my-5 ">
            <div class="container">
                <?php
                $proid = $_GET['id'];
                        $products = qselectf("SELECT c.name as'cat_name',c.id as cat_id, p.name, p.orginal_price, p.selling_price ,p.img,p.second_img,p.third_img,p.forth_img, p.status,p.qty as qty  FROM `products` p ,category c WHERE p.cat_id = c.id and p.status = 1 and p.id = $proid");
                  if (count($products)) {
                   
?>
                <div class="row">
                    <div class="col-md-6">
                        <!-- img slide -->
                        <div class="product" id="product">
                            <div class="" onmousemove="zoom(event)" style="
                    background-image: url(uploads/<?= $products['img'];?>);
                  ">
                                <!-- img --><img id="main-img" width="100%" src="uploads/<?= $products['img'];?>"
                                    alt="" />
                            </div>
                        </div>
                        <!-- product tools -->
                        <div class="product-tools">
                            <div class="thumbnails row g-3 " id="productThumbnails">
                                <div class="col-3">
                                    <div class="thumbnails-img">
                                        <!-- img -->
                                        <img src="uploads/<?= $products['img'];?>" class="small-img" alt="" />
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="thumbnails-img">
                                        <!-- img -->
                                        <img src="uploads/<?= $products['second_img'];?>" class="small-img" alt="" />
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="thumbnails-img">
                                        <!-- img -->
                                        <img src="uploads<?= $products['third_img'];?>" class="small-img" alt="" />
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="thumbnails-img">
                                        <!-- img -->
                                        <img src="uploads/<?= $products['forth_img'];?>" class="small-img" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="ps-lg-10 mt-6 mt-md-0">
                            <!-- content -->
                            <a href="#!" class="mb-4 d-block"><?= $products['cat_name'];?></a>
                            <!-- heading -->
                            <h1 class="mb-1"><?= $products['name'];?></h1>
                            <div class="mb-4">
                                <!-- rating -->
                                <!-- rating -->
                                <small class="text-warning d-flex ">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <a href="#" class="ms-2">(30 reviews)</a>
                                </small>
                            </div>
                            <div class="fs-4">
                                <!-- price --><span
                                    class="fw-bold text-dark">$<?=$products['selling_price'].'.00';?></span>
                                <span
                                    class="text-decoration-line-through text-muted"><?=$products['orginal_price'] ? '$'.$products['orginal_price']. '.00' : '' ?></span><span><small
                                        class="fs-6 ms-2 text-danger">26% Off</small></span>
                            </div>
                            <!-- hr -->
                            <hr class="my-6" />
                            <div class="mb-5">
                                <button type="button" class="btn btn-outline-secondary"
                                    onclick="toggleButtonColor(this)">
                                    XLL
                                </button>
                                <!-- btn -->
                                <button type="button" class="btn btn-outline-secondary"
                                    onclick="toggleButtonColor(this)">
                                    XL
                                </button>
                                <!-- btn -->
                                <button type="button" class="btn btn-outline-secondary"
                                    onclick="toggleButtonColor(this)">
                                    L
                                </button>
                                <button type="button" class="btn btn-outline-secondary"
                                    onclick="toggleButtonColor(this)">
                                    S
                                </button>
                            </div>

                            <div>
                                <!-- input -->
                                <div class="input-group input-spinner">
                                    <input type="button" value="-" class="button-minus btn btn-sm"
                                        data-field="quantity" />
                                    <input type="number" step="1" max="10" min="1" value="1" name="quantity"
                                        class="quantity-field form-control-sm form-input qty" />
                                    <input type="button" value="+" class="button-plus btn btn-sm"
                                        data-field="quantity" />
                                </div>
                            </div>
                            <div class="mt-3 row justify-content-start g-2 align-items-center">
                                <div class="col-xxl-4 col-lg-4 col-md-5 col-5 d-grid">
                                    <!-- button -->
                                    <!-- btn -->
                                    <button type="button" <?= $products['qty'] <= 0 ? 'disabled' : '' ?>
                                        class="btn btn-primary addtocart" data-product-id="<?=$proid?>">
                                        Add to
                                        cart
                                    </button>
                                </div>
                                <div class="col-md-4 col-4">
                                    <!-- btn -->
                                    <a class="btn btn-light" href="#" data-bs-toggle="tooltip" data-bs-html="true"
                                        aria-label="Compare">
                                        <ion-icon name="repeat-outline"></ion-icon>
                                    </a>
                                    <a class="btn btn-light btn-action " href="" data-bs-toggle="tooltip"
                                        data-bs-html="true" aria-label="Wishlist">
                                        <ion-icon name="heart-outline"></ion-icon>
                                    </a>
                                </div>
                            </div>
                            <!-- hr -->
                            <hr class="my-6" />
                            <div>
                                <!-- table -->
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        <tr>
                                            <td>Product Code:</td>
                                            <td>FBB00255</td>
                                        </tr>
                                        <tr>
                                            <td>Availability:</td>
                                            <td>In Stock</td>
                                        </tr>
                                        <tr>
                                            <td>Type:</td>
                                            <td>Fruits</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping:</td>
                                            <td>
                                                <small>01 day shipping.<span class="text-muted">( Free pickup
                                                        today)</span></small>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-8">
                                <!-- dropdown -->
                                <div class="dropdown">
                                    <a class="btn btn-outline-secondary d-flex w-50 justify-content-between " href="#"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Share <ion-icon name="share-social-outline"></ion-icon>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="#"><i
                                                    class="bi bi-facebook me-2"></i>Facebook</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#"><i
                                                    class="bi bi-twitter me-2"></i>Twitter</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#"><i
                                                    class="bi bi-instagram me-2"></i>Instagram</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                      }
                                ?>
            </div>
        </section>
    </main>

</div>
<script>
function toggleButtonColor(button) {
    // Remove 'gray-bg' class from all buttons
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach((btn) => {
        btn.classList.remove('btn-secondary');
        btn.classList.remove('text-light');
    });

    // Toggle 'gray-bg' class for the clicked button
    button.classList.toggle('btn-secondary');
    button.classList.toggle('text-light');

}

var MainImg = document.getElementById("main-img");
var simg = document.getElementsByClassName("small-img");

simg[0].onclick = function() {
    MainImg.src = simg[0].src;
}
simg[1].onclick = function() {
    MainImg.src = simg[1].src;
}
simg[2].onclick = function() {
    MainImg.src = simg[2].src;
}
simg[3].onclick = function() {
    MainImg.src = simg[3].src;
}

let popup = document.getElementById("popup");
let shadow = document.getElementById("shadow");

function openfunction() {
    popup.classList.add("openpop");
    shadow.classList.add("shadow");
}

function closefunction() {
    popup.classList.remove("openpop");
    shadow.classList.remove("shadow");
}
$(document).ready(function() {

    $(".addtocart").on("click", function() {

        var productId = $(this).data("product-id");
        let qtye = document.getElementsByClassName('qty')[0];
        let qty = qtye.value;
        console.log(qty);
        // Send an AJAX request to update the database
        $.ajax({
            type: "POST",
            url: "functions/code.php",
            data: {
                'pro_id': productId,
                'qty': qty,
                'addtocart': true
            },
            success: function(response) {
                if (response == 200) {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Your product has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    })

                } else if (response == 300) {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Your product has been updated',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
            }
        });
    });
});
</script>
<?php include_once("includes/footer.php") ?>