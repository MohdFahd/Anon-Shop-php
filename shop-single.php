<?php session_start(); include_once("includes/header.php") ?>
<?php require_once("admin/config/dbcon.php") ?>
<?php include_once("includes/navbars.php") ?>
<link rel="stylesheet" href="assets/css/tiny-slider.css">
<link rel="stylesheet" href="assets/css/theme.min.css">
<section class="mb-lg-14 mb-8 mt-8">
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <!-- card -->
                <div class="card py-1 border-0 mb-8">
                    <div>
                        <h1 class="fw-bold">Shop Cart</h1>
                        <p class="mb-0">Shopping in 382480</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row tablecart">
            <div class="col-lg-8 col-md-7">

                <div class="py-3">
                    <!-- alert -->
                    <div class="alert alert-danger p-2 d-flex" role="alert">
                        You’ve got FREE delivery. Start <a href="#!" class="alert-link mx-1"> checkout now!</a>
                    </div>
                    <ul class="list-group list-group-flush">
                        <!-- list group -->
                        <?php
            if(isset($_SESSION['auth']))
            {
                $total_selling = 0;
                $total_orginal = 0;
                $discount = 0;
                $user_id = $_SESSION['auth_user']['user_id'];
                $carts = query("SELECT p.id,p.name,p.selling_price,p.orginal_price,p.img,c.qty FROM `cart` c,products p,users WHERE p.id = c.pro_id and c.user_id = users.id and c.user_id = $user_id;");
                if(count($carts))
                {
                    foreach($carts as $cart)
                    {
                        $total_selling += ($cart['selling_price'] * $cart['qty']) ;
                        $total_orginal += ($cart['orginal_price'] * $cart['qty']);
                        if($cart['orginal_price'] != '0')
                        {
                            $discount = $total_orginal - $total_selling;
                        }
                        else{
                            $total_orginal += ($cart['selling_price'] * $cart['qty']);
                        }
                        ?>

                        <li class="list-group-item py-3 py-lg-0 px-0 border-top">
                            <!-- row -->
                            <div class="row align-items-center">
                                <div class="col-3 col-md-2 col-lg-2">
                                    <!-- img --> <img src="uploads/<?=$cart['img'];?>" alt="Ecommerce"
                                        class="img-fluid">
                                </div>
                                <div class="col-3 col-lg-5 col-md-3">
                                    <!-- title -->
                                    <a href="shop-single.html" class="text-inherit">
                                        <h6 class="mb-0"><?=$cart['name'];?></h6>
                                    </a>
                                    <span><small
                                            class="text-muted"><del>$<?=$cart['orginal_price']*$cart['qty'];?>.00</del></small></span>
                                    <span><small class="text-muted mx-2 ">Size: Xl</small></span>
                                    <!-- text -->
                                    <div class="mt-2 small lh-1"> <button
                                            class="text-decoration-none text-inherit removeiteam"
                                            data-product-id="<?=$cart['id'];?>">
                                            <span class=" me-1 align-text-bottom">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-trash-2 text-success">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path
                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                    </path>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                </svg></span><span class="text-muted">Remove</span></button></div>
                                </div>
                                <!-- input group -->
                                <div class="col-4 col-md-3 col-lg-3">
                                    <!-- input -->
                                    <div class="input-group input-spinner d-flex ">
                                        <input type="button" value="-" class="button-minus  btn  btn-sm "
                                            data-field="quantity">
                                        <input type="number" step="1" id="qty" max="20" value="<?=$cart['qty'];?>"
                                            name="quantity" class="quantity-field form-control-sm form-input">
                                        <input type="button" value="+" class="button-plus btn btn-sm "
                                            data-field="quantity">
                                    </div>


                                </div>
                                <!-- price -->
                                <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                                    <span class="fw-bold">$<?=$cart['selling_price']?>.00</span>

                                </div>
                            </div>

                        </li>
                        <?php
                    }
                }
                else{
                                echo "<h1>Your cart is empty!!</h1>";
                }
            }
            ?>

                    </ul>
                    <!-- btn -->
                    <div class="d-flex justify-content-between mt-4">
                        <a href="#!" class="btn btn-primary">Continue Shopping</a>
                        <button type="submit" class="btn btn-dark Update_Cart ">Update Cart</button>
                    </div>

                </div>
            </div>

            <!-- sidebar -->
            <div class="col-12 col-lg-4 col-md-5">
                <!-- card -->
                <div class="mb-5 card mt-6">
                    <div class="card-body p-6">
                        <!-- heading -->
                        <h2 class="h5 mb-4">Summary</h2>
                        <div class="card mb-2">
                            <!-- list group -->
                            <ul class="list-group list-group-flush">
                                <!-- list group item -->
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="me-auto">
                                        <div>Item Subtotal</div>

                                    </div>
                                    <span>$<?=$total_orginal?>.00</span>
                                </li>

                                <!-- list group item -->
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="me-auto">
                                        <div>Discount</div>

                                    </div>
                                    <span>$<?= $discount;?>.00</span>
                                </li>
                                <!-- list group item -->
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="me-auto">
                                        <div class="fw-bold">Subtotal</div>

                                    </div>
                                    <span class="fw-bold">$<?=$total_selling?>.00</span>
                                </li>
                            </ul>

                        </div>
                        <div class="d-grid mb-1 mt-4">
                            <a href=""></a>
                            <!-- btn -->
                            <a href="checkOut.php?total=<?=$total_selling?>"
                                class="btn btn-primary btn-lg d-flex justify-content-between align-items-center"
                                type="submit">
                                Go to Checkout <span class="fw-bold">$<?=$total_selling?>.00</span></a>
                        </div>
                        <!-- text -->
                        <p><small>By placing your order, you agree to be bound by the Freshcart <a href="#!">Terms of
                                    Service</a>
                                and <a href="#!">Privacy Policy.</a> </small></p>

                        <!-- heading -->
                        <div class="mt-8">
                            <h2 class="h5 mb-3">Add Promo or Gift Card</h2>
                            <form>
                                <div class="mb-2">
                                    <!-- input -->
                                    <label for="giftcard" class="form-label sr-only">Email address</label>
                                    <input type="text" class="form-control" id="giftcard"
                                        placeholder="Promo or Gift Card">

                                </div>
                                <!-- btn -->
                                <div class="d-grid"><button type="submit"
                                        class="btn btn-outline-dark mb-1">Redeem</button></div>
                                <p class="text-muted mb-0"> <small>Terms &amp; Conditions apply</small></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
$(document).ready(function() {
    // Use event delegation on a parent element that exists in the DOM when the page loads
    $(".tablecart").on("click", ".removeiteam", function() {
        var productId = $(this).data("product-id");
        console.log(productId);

        // Send an AJAX request to update the database
        $.ajax({
            type: "POST",
            url: "functions/code.php",
            data: {
                'pro_id': productId,
                'removeiteam': true
            },
            success: function(response) {
                if (response == 200) {
                    $(".tablecart").load(location.href + " .tablecart > *");
                } else if (response == 300) {
                    window.location.href = "./login.php";
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
            }
        });
    });
});
$(document).ready(function() {
    $(".Update_Cart").on("click", function() {
        let qty = document.getElementById("#qty");
        let qqty = qty[0].value;
        // var productId = $(this).data("product-id");
        // var exsitQty = $(this).find(".exsit_qty").data("exsit_qty");
        console.log(qqty);
        // console.log("Button clicked"); // Add this line for debugging
        // // Send an AJAX request to update the database
        // $.ajax({
        //     type: "POST",
        //     url: "./functions/code.php",
        //     data: {
        //         pro_id: productId,
        //         qty: 1,
        //         exsitQty: "exsitQty",
        //         addtocart: true,
        //     },
        //     success: function(response) {
        //         if (response == 200) {
        //             Swal.fire({
        //                 position: "center",
        //                 icon: "success",
        //                 title: "Your product has been saved",
        //                 showConfirmButton: false,
        //                 timer: 1500,
        //             });
        //         } else if (response == 300) {
        //             Swal.fire({
        //                 position: "center",
        //                 icon: "success",
        //                 title: "Your product has been updated",
        //                 showConfirmButton: false,
        //                 timer: 1500,
        //             });
        //         }
        //     },
        //     error: function(xhr, status, error) {
        //         console.error("AJAX Error:", error);
        //     },
        // });
    });
});
</script>
<?php include_once("includes/footer.php") ?>