<?php
session_start();

include("includes/header.php");?>

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
    <strong>Holy guacamole!</strong> <?= $_SESSION['messsage']?>.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php 
            unset($_SESSION['messsage']);
            }
            ?>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Log in</p>

                                <form class="mx-1 mx-md-4" action="functions/auth.php" method="post">
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

                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input class="form-check-input me-2" type="checkbox" value=""
                                            id="form2Example3c" />
                                        <label class="form-check-label" for="form2Example3">
                                            Remmember me<a href="#!"></a>
                                        </label>
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-lg" name="loginbtn" value="Log in">
                                    <h4 class="text text-center mt-4" style="font-size: 15px">Don't have a account?</h4>
                                    <a href="sign_up.php" class=" text-center" style="font-size: 12px ;">Create New
                                        Account</a>
                                    <a href="resetpassword.php" class=" text-center" style="font-size: 12px ;">Forget
                                        your
                                        password?
                                    </a>
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