<?php
session_start();
 include("includes/header.php");
?>

<style>
.phone_number::-webkit-outer-spin-button,
.phone_number::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
</style>

<?php
if(isset($_SESSION['auth']))
{
$_SESSION['messsage'] = "You are already logged in";
?>
<script>
window.location.href = './index.php';
</script>
<?php
}
else{
if(isset($_SESSION['messsage']))
{?>
<div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
    <strong>Oops!! </strong> <?= $_SESSION['messsage']?>.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php 
            unset($_SESSION['messsage']);
            }
            ?>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<section class="vh-100 my-5 " style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                <form class="mx-1 mx-md-4" action="functions/auth.php" method="post">

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" name="name" id="form3Example1c" class="form-control"
                                                placeholder="Enter your name" />
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="number" maxlength="10" name="phone" id="form3Example1c"
                                                class="form-control phone_number"
                                                placeholder="Enter your phone number" />
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="email" name="email" id="form3Example3c" class="form-control "
                                                placeholder="Enter you Email" />
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" name="password" id="form3Example4c"
                                                class="form-control" placeholder="Enter the password" />
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" name="re-pass" id="form3Example4cd"
                                                class="form-control" placeholder="Confirm the password" />
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-lg" name="signupbtn">


                                </form>

                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src="assets/img/img.png" class="img-fluid" alt="Sample image">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
}
?>
<?php include("includes/footer.php"); ?>