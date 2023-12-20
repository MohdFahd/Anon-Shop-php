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

<div class="col-lg-9 col-md-8 col-12">
    <div class="py-6 p-md-6 p-lg-10">
        <!-- heading -->
        <h2 class="mb-6">My Orders</h2>

        <div class="table-responsive-xxl border-0">
            <!-- Table -->
            <table class="table order-table mb-0 text-nowrap table-centered ">
                <!-- Table Head -->
                <thead class="bg-light">
                    <tr>
                        <th>Product</th>
                        <th>Order</th>
                        <th>Date</th>
                        <th>Items</th>
                        <th>Status</th>
                        <th>Amount</th>
                        <th></th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                                $iteam = 0;
                                $user_id = $_SESSION['auth_user']['user_id'];
                                $order = query("SELECT * FROM orders WHERE user_id = $user_id ORDER BY created_at DESC");
                                if(count($order))
                                {
                                    foreach($order as $o)
                                    {
?>
                    <tr>
                        <td class="align-middle border-top-0">

                            <a href="#" class="fw-semi-bold text-inherit">
                                <h6 class="mb-0"><?=$o['id']?></h6>
                            </a>
                        </td>
                        <td class="align-middle border-top-0">
                            <a href="#" class="text-inherit">#<?=$o['tracking_no']?></a>

                        </td>
                        <td class="align-middle border-top-0">
                            <?=$o['created_at']?>
                        </td>
                        <td class="align-middle border-top-0">
                            <?php
                                        $order_id = $o['id'];
                                        $iteam = qselectf("SELECT COUNT(id) as iteam FROM `order_iteam` WHERE order_id = $order_id;");
                                        echo $iteam['iteam'];
                                        ?>
                        </td>
                        <td class="align-middle border-top-0">
                            <?php
                                        if($o['status'] == 0)
                                        {
                                        ?>
                            <span class="badge bg-warning">Processing</span>
                            <?php
                                        }
                                        
                                        else if($o['status'] == 1)
                                        {
                                        ?>
                            <span class="badge bg-success">Completed</span>
                            <?php
                                        }
                                        else if($o['status'] == 2)
                                        {
                                        ?>
                            <span class="badge bg-danger">Cancel</span>
                            <?php
                                        }
                                        
                                        ?>
                        </td>
                        <td class="align-middle border-top-0">
                            $<?=$o['total']?>.00
                        </td>
                        <td class="text-muted align-middle border-top-0">
                            <a href="OrderTracking.php?tracking_no=<?=$o['tracking_no']?>" class="text-inherit"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View">
                                <ion-icon name="eye-outline"></ion-icon>
                            </a>
                        </td>
                        <?php
                        if(!$o['tracking_mode'] >=1 )
                        {
                            ?>
                        <td class="text-muted">
                            <button type="submit" data-order-id="<?= $o['id'] ?>" id="cancel_order"
                                class="cancel_order"><i class="fa-solid fa-xmark"></i></button>
                        </td>
                        <?php
                        }
                        ?>
                    </tr>
                    <?php
                                    }
                                }
                                ?>
                    <!-- Table body -->

                </tbody>
            </table>
        </div>
    </div>
</div>
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