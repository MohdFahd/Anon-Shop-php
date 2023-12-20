<?php
session_start();
require_once("../admin/config/dbcon.php");

require_once '../twilio-php-main/src/Twilio/autoload.php';
use Twilio\Rest\Client;

// Function to generate a random 6-digit code
function generateVerificationCode() {
    return rand(100000, 999999);
}

// Function to store the code and timestamp in a session (you might want to use a database for a production environment)
function storeVerificationCode($code) {
    $_SESSION['verification_code'] = $code;
    $_SESSION['verification_time'] = time(); // Store the current timestamp
}

// Function to check if the code is still valid (expires in 10 minutes)
function isCodeValid() {
    if (isset($_SESSION['verification_code']) && isset($_SESSION['verification_time'])) {
        $elapsedTime = time() - $_SESSION['verification_time'];
        return $elapsedTime <= 600; // 600 seconds = 10 minutes
    }
    return false;
}

// Twilio credentials
$sid    = "AC2a1e0d55bc5e3223dee17ac443dbbf35";
$token  = "a02476a2c4edd5b4d281bd7c29241f6c";
$twilio = new Client($sid, $token);
    unset($_SESSION['rest']);

if(isset($_POST['restpassword']))
{
$phone = trim($_POST['phone']);
$stmt = conn->prepare("SELECT * FROM users where phone = :phone");
$stmt->bindValue(':phone', $phone);
$stmt->execute();
$result = $stmt->rowCount();
$users = $stmt->fetch();
$_SESSION['userid'] = $users['id'];
if($result)
{
    // Generate a verification code
$verificationCode = generateVerificationCode();

// Store the verification code and timestamp
storeVerificationCode($verificationCode);
$_SESSION['rest'] = true;

// Your Twilio message code with the generated verification code
$message = $twilio->messages
    ->create("+967$phone", // to
        array(
            "from" => "+12565677088",
            "body" => "Your verification code is: $verificationCode"
        )
    );
header("Location: ../resetpassword.php");
}
}
if(isset($_POST['tokenbtn']))
{
    $tokennumber = trim($_POST['tokennumber']);
    if($_SESSION['verification_code'] == $tokennumber)
    {
        $_SESSION['resetnumber'] = true;
        header("Location: ../resetpassword.php");

    }
}
if(isset($_POST['save']))
{
   $password = trim($_POST['password']);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $id = $_SESSION['userid'];
    $stmt = conn->prepare("UPDATE users set password = :password where id=:id");
    $stmt->bindValue(':password', $password);
    $stmt->bindValue(':id', $id);
    $result = $stmt->execute();
    if($result)
    {
            unset($_SESSION['rest']);
            unset($_SESSION['resetnumber']);
            unset($_SESSION['userid']);
        header("Location: ../login.php");

    }
}
?>