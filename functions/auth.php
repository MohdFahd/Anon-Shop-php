<?php
session_start();
include("../admin/config/dbcon.php");
include("../functions/functions.php");
if(isset($_POST['signupbtn']))
{
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $repass = trim($_POST['re-pass']);

    if($name == "" OR $phone == "" OR $email == "" OR $password == "" OR $repass == "")
    {
        redirct("../sign_up.php","You have to fill all the vaild");
        die();
    }
    else if(strpos($name, "'") == true)
    {
        redirct("../sign_up.php","The name should not have single qutotion");
        die();
    }
  
    else if($password == $repass)
    {
        // $check_email = query("SELECT * FROM users where email = '$email' ");
        $check_email = qselectfetchall("users","email",$email);
        if(!count($check_email))
        {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = conn->prepare("INSERT INTO users(name,phone,email,password) VALUES(:name,:phone,:email,:password)");
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':phone', $phone);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $password);
            $stmt->execute();
            $insert_user = $stmt->fetchAll();

            //$insert_user = query("INSERT INTO users(name,phone,email,password,role_id) VALUES('$name','$phone','$email','$password','2')");
            
            if(count($insert_user) == 0)
            { 
                redirct("../login.php","Registertion Succssfully");
            }
            else{
                redirct("../login.php","Somthing went wrong");
            }
        }
        else{
            redirct("../sign_up.php","Email already exist");
        }
    }
    else{
        redirct("../sign_up.php","The password doesnt match");
    }
    
}

else if(isset($_POST['loginbtn']))
{
    $email = trim($_POST['email']);
    $password_input = trim($_POST['password']);
    // Fetch the hashed password from the database based on the user's email
    $stmt = conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $UserData = $stmt->fetch();
    if($stmt->rowCount()>0)
    {
        if ($UserData && password_verify($password_input, $UserData['password'])) {
            if($UserData['active']==1)
            {
                //init the auth = true
                $_SESSION['auth'] = true;
                //Fetching the valus from arrays to vars
                $user_id = $UserData['id'];
                $username = $UserData['name'];
                $useremail = $UserData['email'];
                $roleAs = $UserData['role_id'];
                //Create session array 
                $_SESSION['auth_user'] = [
                    'user_id' => $user_id,
                    'name' => $username,
                    'email' => $useremail,
                ]; 
                $_SESSION['roleAs'] = $roleAs;
                if($roleAs == 1)
                {
                    redirct("../admin/index.php","Welcome to Dashborad");
                }
                else if($roleAs == 2){
                    redirct("../index.php","Logged in Successfully");
                }
            }
            else{
                redirct("../login.php","You have been Blocked by the admin");
            }
        }
        else{
            redirct("../login.php","The password is wrong");
        }
    } else {
            redirct("../login.php","There is no email like this");
    }
}
else if(isset($_POST['signOutBtn']))
{
    if(isset($_SESSION['auth']))
    {
        unset($_SESSION['auth']);
        unset($_SESSION['auth_user']);
        $_SESSION['messsage'] = "Logged out Successfully";
    }
    header('Location: ../index.php');
}
?>