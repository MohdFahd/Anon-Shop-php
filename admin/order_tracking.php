<?php include_once("pages/header.php");
require_once("config/dbcon.php") ?>
<?php
$order_id = $_GET['id'];
$order = qselect("orders", "id", $order_id);


?>
<main>
    <div class="col-md-12 my-4 ">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <span class="text fs-4">View Order</span>
                <a href="index.php" class="btn btn-warning text-light float-end"> <i
                        class="fa fa-reply text-white "></i> Back</a>
            </div>
            <div class="card-body shadow-sm">
                <ul class="list-group list-group-flush">
                    <!-- list group item -->
                    <?php
                    $total = 0; 
                    $order_iteam = query("SELECT p.name,p.img,p.orginal_price,p.selling_price,o.qty,o.price FROM `order_iteam` o,products p WHERE p.id = o.pro_id  and order_id= $order_id;");
                    if(count($order_iteam))
                    {
                        foreach($order_iteam as $iteams)
                        {
                            $total += $iteams['price'] * $iteams['qty'];
?>
                    <li class="list-group-item px-4 p-2">
                        <div class="row align-items-center" style="padding-right: 12px;">
                            <div class="col-2 col-md-2">
                                <img src="../uploads/<?=$iteams['img']?>" alt="<?=$iteams['img']?>" class="img-fluid">
                            </div>
                            <div class="col-5 col-md-5">
                                <h6 class="mb-0"><?=$iteams['name']?></h6>
                                <span><small class="text-muted">.98 / lb</small></span>

                            </div>
                            <div class="col-2 col-md-2 text-center text-muted">
                                <span><?=$iteams['qty']?></span>

                            </div>
                            <div class="col-3 text-lg-end text-start text-md-end col-md-3">
                                <span class="fw-bold"><?=$iteams['price']?></span>

                            </div>
                        </div>

                    </li>
                    <?php
                        }
                    }
                    ?>
                    <!-- list group item -->
                    <li class="list-group-item px-4 py-3">
                        <div class="d-flex align-items-center justify-content-between fw-bold">
                            <div>
                                Total:
                            </div>
                            <div class="text-danger">
                                $<?= $total?>.00
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row my-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h4>Delivey View</h4>
                            <p class="text-sm mb-0">
                                <svg class="svg-inline--fa fa-check text-info" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z">
                                    </path>
                                </svg>
                                <!-- <i class="fa fa-check text-info" aria-hidden="true"></i> Font Awesome fontawesome.com -->
                                <span class="font-weight-bold ms-1">30 done</span> this month
                            </p>
                        </div>
                        <div class="col-lg-6 col-5 my-auto text-end">
                            <div class="dropdown float-lg-end pe-4">
                                <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <svg class="svg-inline--fa fa-ellipsis-vertical text-secondary" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="ellipsis-vertical" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M64 360c30.9 0 56 25.1 56 56s-25.1 56-56 56s-56-25.1-56-56s25.1-56 56-56zm0-160c30.9 0 56 25.1 56 56s-25.1 56-56 56s-56-25.1-56-56s25.1-56 56-56zM120 96c0 30.9-25.1 56-56 56S8 126.9 8 96S33.1 40 64 40s56 25.1 56 56z">
                                        </path>
                                    </svg>
                                    <!-- <i class="fa fa-ellipsis-v text-secondary" aria-hidden="true"></i> Font Awesome fontawesome.com -->
                                </a>
                                <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a>
                                    </li>
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Another
                                            action</a></li>
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Something
                                            else here</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-2 pb-2">
                    <div class="col-md-12">
                        <label class="fw-bold" for="">Name</label>
                        <div class="border rounded p-2">
                            <?=$order['name']; ?> </div>
                    </div>
                    <div class="col-md-12">
                        <label class="fw-bold" for="">Address</label>
                        <div class="border  rounded p-2">
                            <?=$order['Address']; ?> </div>
                    </div>
                    <div class="col-md-12">
                        <label class="fw-bold" for="">Phone</label>
                        <div class="border  rounded p-2">
                            <?=$order['phone']; ?> </div>
                    </div>
                    <div class="col-md-12">
                        <label class="fw-bold" for="">tracking_no</label>
                        <div class="border  rounded p-2">
                            <?=$order['tracking_no']; ?> </div>
                    </div>

                    <div class="col-md-12">
                        <label class="fw-bold" for="">Date</label>
                        <div class="border  rounded p-2">
                            <?=$order['created_at']; ?> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <h6>Orders overview</h6>
                    <p class="text-sm">
                        <svg class="svg-inline--fa fa-arrow-up text-success" aria-hidden="true" focusable="false"
                            data-prefix="fas" data-icon="arrow-up" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 384 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z">
                            </path>
                        </svg>
                        <!-- <i class="fa fa-arrow-up text-success" aria-hidden="true"></i> Font Awesome fontawesome.com -->
                        <span class="font-weight-bold">24%</span> this month
                    </p>
                </div>
                <div class="card-body p-3">
                    <form action="config/code.php" method="post">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between ">
                                <label for="">Select Category</label>
                                <label for="">sad</label>
                            </div>
                            <select name="status" class="form-select form-label p-2" aria-label="Default select example"
                                aria-placeholder="sdadasd" require>
                                <?php 
                                        // Define an array to map status values to labels
                                        $statusLabels = [
                                            0 => 'Under Processing',
                                            1 => 'Completed',
                                            2 => 'Canceled',
                                        ];

                                        // Loop through the status labels array and generate options
                                        foreach ($statusLabels as $value => $label) {
                                            // Check if the current status value matches $order['status']
                                            $selected = ($order['status'] == $value) ? 'selected' : '';

                                            // Generate the option tag
                                            echo '<option value="' . $value . '" ' . $selected . '>' . $label . '</option>';
                                        }
                                        ?>
                            </select>

                        </div>
                        <div class="col-md-12">
                            <label for="">Select Category</label>
                            <select name="tracking_mode" class="form-select form-label p-2"
                                aria-label="Default select example" aria-placeholder="sdadasd" require>
                                <?php 
    // Define an array to map tracking_mode values to labels
    $trackingModeLabels = [
        0 => "Select The next step",
        1 => 'Confirmed',
        2 => 'Picked by courier',
        3 => 'On the way',
        4 => 'Ready for pickup',
        5 => 'Delivered',
    ];

    // Loop through the tracking_mode labels array and generate options
    foreach ($trackingModeLabels as $value => $label) {
        // Check if the current tracking_mode value matches $order['tracking_mode']
        $selected = ($order['tracking_mode'] == $value) ? 'selected' : '';

        // Generate the option tag
        echo '<option value="' . $value . '" ' . $selected . '>' . $label . '</option>';
    }
    ?>
                            </select>

                        </div>
                        <div class="col-md-12 col-lg-12">
                            <input type="hidden" name="order_id" value="<?=$order_id?>">
                            <button class="btn btn-primary w-100 p-3" data-order-id="<?=$order['tracking_mode'] ?>"
                                type="submit" name="EditOrder">Save
                                Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include_once("pages/footer.php") ?>