<?php session_start(); include_once("includes/header.php") ?>
<?php require_once("admin/config/dbcon.php") ?>
<?php include_once("includes/navbars.php") ?>
<link rel="stylesheet" href="assets/css/tiny-slider.css">
<link rel="stylesheet" href="assets/css/theme.min.css">
<script>
<?php if(isset($_SESSION['messsage'])) 
        
            {?>
alertify.set('notifier', 'position', 'top-center');
alertify.success('<?=$_SESSION['messsage']; ?>');
<?php 
            unset($_SESSION['messsage']);
            }
            ?>
</script>
<?php include_once('includes/navuser.php');?>
<div class="col-lg-9 col-md-8 col-12">
    <!--  -->
    <?php
                $user_id = $_SESSION['auth_user']['user_id'];
                $users = qselectf("SELECT * FROM users WHERE id = $user_id");
                ?>
    <!--  -->
    <!-- <div class="py-6 p-md-6 p-lg-10"> -->
    <div class="container mb-3 ">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center"> <img
                                    src="uploads/person.png" alt="Admin" class="rounded-circle p-1 bg-primary"
                                    width="110">
                                <div class="mt-3">
                                    <h4><?=$users['name']?></h4>
                                    <p class="text-secondary mb-1">Customer</p>
                                    <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                                    <button class="btn btn-primary">Follow</button> <button
                                        class="btn btn-outline-primary">Message</button>
                                </div>
                            </div>
                            <hr class="my-4">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-globe me-2 icon-inline">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="2" y1="12" x2="22" y2="12"></line>
                                            <path
                                                d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                            </path>
                                        </svg>Website</h6> <span class="text-secondary">https://example.com</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-github me-2 icon-inline">
                                            <path
                                                d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                            </path>
                                        </svg>Github</h6> <span class="text-secondary">example</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-twitter me-2 icon-inline text-info">
                                            <path
                                                d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                            </path>
                                        </svg>Twitter</h6> <span class="text-secondary">@example</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-instagram me-2 icon-inline text-danger">
                                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5">
                                            </rect>
                                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z">
                                            </path>
                                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                        </svg>Instagram</h6> <span class="text-secondary">example</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-facebook me-2 icon-inline text-primary">
                                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                            </path>
                                        </svg>Facebook</h6> <span class="text-secondary">example</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">

                        <form action="functions/code.php?id=<?=$users['id']?>" method="post">
                            <?php
                                    if(count($users))
                                    {
                                        ?>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"> <input type="text" class="form-control"
                                            name="name" value="<?=$users['name']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"> <input type="text" disabled
                                            class="form-control" value="<?=$users['email']; ?>"></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"> <input type="text" class="form-control"
                                            name="password" placeholder="Enter new password">

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"> <input type="text" class="form-control"
                                            name="phone" value="<?=$users['phone']; ?>"></div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Role as</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"> <input disabled type="text"
                                            class="form-control" value="<?=$users['role_id'] ? 'User' : ''; ?>"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary"><button type="submit"
                                            class="btn btn-primary px-4 w-100" name="SaveProfile">Save
                                            Changes</button></div>
                                </div>
                            </div>
                            <?php
                                    }
                                    ?>
                        </form>
                    </div>
                    <div class="row my-3">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="counter">
                                    <div class="row p-2">
                                        <?php
                                                    $TotalOrders = 0;
                                                    $TotalProc = 0;
                                                    $Completed = 0;
                                                    $cancel = 0;
                                                    $orders = query("SELECT * FROM orders WHERE user_id = $user_id");
                                                    if(count($orders))
                                                    {
                                                        $TotalOrders = count($orders);
                                                        foreach($orders as $order)
                                                        {
                                                            if($order['status'] == '0')
                                                            {
                                                                $TotalProc++;
                                                            }
                                                            else if($order['status'] == '1')
                                                            {
                                                                $Completed++;
                                                            }
                                                            else if($order['status'] == '2')
                                                            {
                                                                $cancel++;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                        <div class="col-6 col-lg-3">
                                            <div class="count-data text-center">
                                                <h6 class="count h2" data-to="500" data-speed="500">
                                                    <?=$TotalOrders?></h6>
                                                <p class="m-0px font-w-600">Total Orders</p>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div class="count-data text-center">
                                                <h6 class="count h2" data-to="150" data-speed="150">
                                                    <?=$Completed?></h6>
                                                <p class="m-0px font-w-600">Completed</p>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div class="count-data text-center">
                                                <h6 class="count h2" data-to="850" data-speed="850">
                                                    <?=$TotalProc?></h6>
                                                <p class="m-0px font-w-600">Processing</p>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div class="count-data text-center">
                                                <h6 class="count h2" data-to="190" data-speed="190">
                                                    <?=$cancel?></h6>
                                                <p class="m-0px font-w-600">Cancels</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
</script>
<?php include_once("includes/footer.php") ?>