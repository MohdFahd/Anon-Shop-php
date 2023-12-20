<?php session_start(); if(!isset($_SESSION['auth']))
{
    die();
} ?>
<?php include_once("includes/header.php") ?>
<?php require_once("admin/config/dbcon.php") ?>
<?php include_once("includes/navbars.php") ?>
<link rel="stylesheet" href="assets/css/tiny-slider.css">
<link rel="stylesheet" href="assets/css/theme.min.css">
<?php include_once("includes/navuser.php")?>
<?php
if(!isset($_COOKIE["shopping_cart"]))
{
    echo "empty";
}
else{
    ?>
<div class="col-lg-9 col-md-8 col-12">
    <div class="py-6 p-md-6 p-lg-10">
        <!-- heading -->
        <h2 class="mb-6">My Orders</h2>
        <?php
            $total = 0;
    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
    $cart_data = json_decode($cookie_data, true);
    foreach($cart_data as $keys => $values)
    {
        ?>
        <div class="row align-items-center">
            <div class="col-3 col-md-2 col-lg-2">
                <!-- img --> <img src="uploads/1693922156shirt-1.jpg" alt="Ecommerce" class="img-fluid">
            </div>
            <div class="col-3 col-lg-5 col-md-3">
                <!-- title -->
                <a href="shop-single.html" class="text-inherit">
                    <h6 class="mb-0">
                        <?=$values['item_name']?>"
                    </h6>
                </a>
                <span><small class="text-muted"><del>$68.00</del></small></span>
                <span><small class="text-muted mx-2 ">Size: Xl</small></span>
            </div>
            <!-- input group -->
            <div class="col-4 col-md-3 col-lg-3">
                <!-- input -->
                <div class="input-group input-spinner d-flex ">
                    <span class="fw-bold">$49.00</span>

                </div>


            </div>
            <!-- price -->
            <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                <div class="mt-2 small lh-1"> <button class="text-decoration-none text-inherit removeiteam"
                        data-product-id="79">
                        <span class=" me-1 align-text-bottom">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-trash-2 text-success">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path
                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                </path>
                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                <line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg></span><span class="text-muted">Remove</span></button></div>
            </div>
        </div>
        <?php
    }

        ?>

    </div>
</div>
<?php
}
?>

</div>
</div>
</section>
<script>
// Get a reference to the button element
const menuButton = document.getElementById("menuButton");

// Get a reference to the div element you want to show/hide
const navuserDiv = document.querySelector(".col-lg-3.col-md-4.col-12.border-end.d-none.d-md-block");

// Add a click event listener to the button
menuButton.addEventListener("click", function() {
    // Toggle the d-none class on the div element
    navuserDiv.classList.toggle("d-none");
});
$(document).ready(function() {
    $(".cancel_order").on("click", function() {
        var order_id = $(this).data("order-id");
        console.log(order_id);
        //Send an AJAX request to update the database
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "functions/code.php",
                    data: {
                        'order_id': order_id,
                        'CancelOrder': true
                    },
                    success: function(response) {
                        if (response == 200) {
                            Swal.fire('Deleted!',
                                'Your Order has been Canceled.',
                                'success');
                            $(".order-table").load(location.href +
                                " .order-table > *");
                        } else {
                            console.error("Error:", response);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", error);
                    }
                });
            }
        });
    });
});
</script>
<?php include_once("includes/footer.php") ?>