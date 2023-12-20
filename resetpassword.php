<style>
body {
    background-position: center;
    background-color: #eee;
    background-repeat: no-repeat;
    background-size: cover;
    color: #505050;
    font-family: "Rubik", Helvetica, Arial, sans-serif;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.5;
    text-transform: none;
}

.forgot {
    background-color: #fff;
    padding: 12px;
    border: 1px solid #dfdfdf;
}

.padding-bottom-3x {
    padding-bottom: 72px !important;
}

.card-footer {
    background-color: #fff;
}

.btn {

    font-size: 13px;
}

.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #76b7e9;
    outline: 0;
    box-shadow: 0 0 0 0px #28a745;
}
</style>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<?php
session_start();
if(isset($_SESSION['rest']))
{
?>
<div class="container padding-bottom-3x mb-2 mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <form class="card mt-4" action="functions/verify.php" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="email-for-pass">Enter the code that is send to your phone</label>
                        <input class="form-control" type="number" id="email-for-pass" required="" name="tokennumber">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success" name="tokenbtn" type="submit">verfiy</button>
                    <button class="btn btn-danger" type="submit">Back to Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
}
else if(isset($_SESSION['resetnumber'])) {
?>
<div class="container padding-bottom-3x mb-2 mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <form class="card mt-4" action="functions/verify.php" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="phone-for-pass">Enter your new Password</label>
                        <input class="form-control" type="number" id="phone-for-pass" required="" name="password">
                        <small class="form-text text-muted">Enter the phone number you used during on Then we'll send
                            you a code to reset your passord.</small>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success" name="save" type="submit">Save</button>
                    <button class="btn btn-danger" type="submit">Back to Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
}
else{
?>
<div class="container padding-bottom-3x mb-2 mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <form class="card mt-4" action="functions/verify.php" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="phone-for-pass">Enter your phone number</label>
                        <input class="form-control" type="number" id="phone-for-pass" required="" name="phone">
                        <small class="form-text text-muted">Enter the phone number you used during on Then we'll send
                            you a code to reset your passord.</small>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success" name="restpassword" type="submit">Get New Password</button>
                    <button class="btn btn-danger" type="submit">Back to Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
}
?>