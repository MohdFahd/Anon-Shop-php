<?php session_start(); include_once("includes/header.php") ?>
<?php require_once("admin/config/dbcon.php") ?>
<?php include_once("includes/navbars.php") ?>
<link rel="stylesheet" href="assets/css/tiny-slider.css">
<link rel="stylesheet" href="assets/css/theme.min.css">
<link rel="stylesheet" href="assets/css/tiny-slider.css">
<style>
.track {
    position: relative;
    background-color: #ddd;
    height: 7px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-bottom: 60px;
    margin-top: 50px;
}

.track .step {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    width: 25%;
    margin-top: -18px;
    text-align: center;
    position: relative;
}

.track .step.active:before {
    background: #ff5722;
}

.track .step::before {
    height: 7px;
    position: absolute;
    content: "";
    width: 100%;
    left: 0;
    top: 18px;
}

.track .step.active .icon {
    background: #ee5435;
    color: #fff;
}

.step {
    position: relative;
}

.track .icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    position: relative;
    border-radius: 100%;
    background: #ddd;
}

.track .step.active .text {
    font-weight: 400;
    color: #000;
}



.track .text {
    display: block;
    margin-top: 7px;
}

.itemside {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    width: 100%;
}

.tooltip {
    position: absolute;
    background-color: rgba(0, 0, 0, 0.7);
    color: #fff;
    padding: 5px;
    border-radius: 5px;
    display: none;
    z-index: 1;
}

.step:hover .tooltip {
    display: block;
}
</style>
<div class="container my-2 ">
    <?php
    $tracking_no = $_GET['tracking_no'];
    $text = "";
    $order = qselect("orders",'tracking_no',$tracking_no);
    if($order['status'] == 0)
        $text = "Under Processing"; 
    else if($order['status'] == 1)
        $text = "Completed"; 
    else if($order['status'] == 2)
        $text = "Cancel"; 



   if(isset($_SESSION['auth']))
   {
    ?>
    <main>
        <?php
        if($order['status'] == 1 )
        {
            ?>
        <div class="alert alert-warning" role="alert">
            Yapiiiiiiii! 🎉 Your order has been delivered and is now in your hands.
        </div>
        <?php
        }
        else if($order['status'] == 2 )
        {
            ?>
        <div class="alert alert-dark" role="alert">
            We're sorry 😟 to hear that you've decided to cancel your order.
        </div>
        <?php
        }
        ?>
        <div class="row justify-content-between">
            <div class="card text-center mx-1 col ">
                <img class="card-img-top" src="holder.js/100px180/" alt="">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Tracking:<span
                            class="text-primary">#<?=$order['tracking_no']?></span> </h5>
                </div>
            </div>
            <div class="card text-center mx-1 col">
                <img class="card-img-top" src="holder.js/100px180/" alt="">
                <div class="card-body">
                    <h5 class="card-title fw-bold ">Status: <span
                            class="text-<?=$order['status'] == 2 ? 'danger' : 'primary'  ?>"><?=$text?></span>
                    </h5>
                </div>
            </div>
            <div class="card text-center mx-1 col">
                <img class="card-img-top" src="holder.js/100px180/" alt="">
                <div class="card-body">
                    <h5 class="card-title fw-bold ">Expected date: <span class="text-primary">October 15, 2019</span>
                    </h5>
                </div>
            </div>
        </div>
        <div class="track">
            <div class="step  <?= $order['tracking_mode'] >= 1 ? 'active' : '' ?>" data-bs-toggle="tooltip"
                data-bs-placement="top" data-bs-title="View">
                <span class="icon"><i class="fa-solid fa-check  fa-1x"></i></span>
                <span class="text my-3">Order confirmed</span>
                <div class="tooltip">Order confirmed on [date]</div>
            </div>
            <div class="step <?= $order['tracking_mode'] >= 2 ? 'active' : '' ?> ">
                <span class="icon"> <i class="fa fa-user"></i>
                </span>
                <span class="text my-3"> Picked by courier</span>
                <div class="tooltip">Order confirmed on [date]</div>
            </div>
            <div class="step <?= $order['tracking_mode'] >= 3 ? 'active' : '' ?>">
                <span class="icon"> <i class="fa fa-truck"></i>
                </span>
                <span class="text my-3"> On the way </span>
            </div>
            <div class="step <?= $order['tracking_mode'] >= 4 ? 'active' : '' ?>">
                <span class="icon"> <i class="fa fa-box"></i>
                </span>
                <span class="text my-3 ">Ready for pickup</span>
            </div>
            <div class="step <?= $order['tracking_mode'] >= 5 ? 'active' : '' ?>">
                <span class="icon"><i class="fa-solid fa-face-smile"></i></span>
                <span class="text my-3 ">Delivered</span>
            </div>
        </div>
        <div class="row">
            <div class=" col-md-12 ">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <span class="text fs-4">View Order</span>
                        <a href="Myorders.php" class="btn btn-warning text-light float-end"> <i
                                class="fa fa-reply text-white "></i> Back</a>
                    </div>
                    <div class="card-body shadow-sm">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Delivey View</h4>
                                <hr>
                                <?php if(count($order))
                                {
                                    ?>
                                <div class="col-md-12">
                                    <label class="fw-bold" for="">Name</label>
                                    <div class="border rounded p-2">
                                        <?=$order['name']?> </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="fw-bold" for="">Address</label>
                                    <div class="border  rounded p-2">
                                        <?=$order['Address']?> </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="fw-bold" for="">Phone</label>
                                    <div class="border  rounded p-2">
                                        <?=$order['phone']?> </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="fw-bold" for="">tracking_no</label>
                                    <div class="border  rounded p-2">
                                        <?=$order['tracking_no']?> </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="fw-bold" for="">Date</label>
                                    <div class="border  rounded p-2">
                                        <?=$order['created_at']?> </div>
                                </div>
                                <?php
                                } ?>

                            </div>
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <hr>
                                <!-- <h5 class="px-6 py-4 bg-transparent mb-0">Order Details</h5> -->
                                <div class="card shadow-sm">
                                    <ul class="list-group list-group-flush">
                                        <!-- list group item -->
                                        <?php
                                        $total_orginal = $total_selling = 0;
                                        $order_id = $order['id'];
                                        $user_id = $_SESSION['auth_user']['user_id'];
                                        $iteams = query("SELECT p.name,p.img,p.orginal_price,p.selling_price,o.qty,o.price FROM `order_iteam` o,products p WHERE p.id = o.pro_id and user_id = $user_id  and order_id= $order_id;");
                                        if(count($iteams))
                                        {
                                            foreach($iteams as $iteam)
                                            {
                                                $total_selling += $iteam['selling_price'] * $iteam['qty'];
                                                $total_orginal += $iteam['orginal_price']* $iteam['qty'];
                                                ?>

                                        <li class="list-group-item px-4 p-2">
                                            <div class="row align-items-center" style="padding-right: 12px;">
                                                <div class="col-2 col-md-2">
                                                    <img src="uploads/<?=$iteam['img']?>" alt="16939335803.jpg"
                                                        class="img-fluid">
                                                </div>
                                                <div class="col-5 col-md-5">
                                                    <h6 class="mb-0"><?=$iteam['name']?></h6>
                                                    <span><small class="text-muted">.98 / lb</small></span>

                                                </div>
                                                <div class="col-2 col-md-2 text-center text-muted">
                                                    <span><?=$iteam['qty']?></span>

                                                </div>
                                                <div class="col-3 text-lg-end text-start text-md-end col-md-3">
                                                    <span class="fw-bold">$<?=$iteam['price']?>.00</span>

                                                </div>
                                            </div>

                                        </li>
                                        <?php
                                            }
                                        }
                                        ?>



                                        <!-- list group item -->
                                        <li class="list-group-item px-4 py-3">
                                            <div class="d-flex align-items-center justify-content-between   mb-2">
                                                <div>
                                                    Item Subtotal

                                                </div>
                                                <div class="fw-bold">
                                                    $<?=$total_orginal?>.00
                                                </div>

                                            </div>
                                            <div class="d-flex align-items-center justify-content-between  ">
                                                <div>
                                                    Discount <i class="feather-icon icon-info text-muted"
                                                        data-bs-toggle="tooltip" aria-label="Default tooltip"
                                                        data-bs-original-title="Default tooltip"></i>

                                                </div>
                                                <div class="fw-bold">
                                                    $<?=abs($total_orginal-$total_selling)?>.00

                                                </div>

                                            </div>

                                        </li>
                                        <!-- list group item -->
                                        <li class="list-group-item px-4 py-3">
                                            <div class="d-flex align-items-center justify-content-between fw-bold">
                                                <div>
                                                    Subtotal
                                                </div>
                                                <div>
                                                    $<?=$total_selling?>.00

                                                </div>

                                            </div>


                                        </li>

                                    </ul>

                                </div>
                                <div class="border card p-2 my-3">
                                    <!-- <label class="fw-bold" for="">Status</label> -->
                                    <h6 class="fw-bold">Status:</h6>
                                    <?php 
                                    if($order['status'] == 0)
                                        {
                                        ?>
                                    <span class="badge fs-5 p-3 bg-warning">Under Processing</span>
                                    <?php
                                        }
                                        
                                        else if($order['status'] == 1)
                                        {
                                        ?>
                                    <span class="badge fs-5 p-3 bg-success">Completed</span>
                                    <?php
                                        }
                                        else if($order['status'] == 2)
                                        {
                                        ?>
                                    <span class="badge fs-5 p-3 bg-danger">Cancel</span>
                                    <?php
                                        }
                                        
                                        ?>
                                    <!-- <h5><span class="badge bg-warning">Under Processing</span></h5> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
   } 
   ?>
</div>
<?php include_once("includes/footer.php") ?>