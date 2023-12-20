<?php
require_once("../admin/config/dbcon.php");
session_start();
if(isset($_POST['SaveProfile']))
{
    if(isset($_SESSION['auth']))
    {
        $user_id = $_GET['id'];
        $name = trim($_POST['name']);   
        $password = trim($_POST['password']);   
        $phone = trim($_POST['phone']);
        if(empty($name) || empty($phone))
        {
            $_SESSION['messsage'] = "The fields are empty";
            header("Location: ../Account.php");
        }
        else{
            if(empty($password))
            {
                $stmt = conn->prepare("UPDATE users set name=:name,phone=:phone where id = :id");
                $stmt->bindValue(':id', $user_id);
                $stmt->bindValue(':name', $name);
                $stmt->bindValue(':phone', $phone);
                $stmt->execute();
                $_SESSION['messsage'] = "The User file Was Updated";
                header("Location: ../Account.php");

            } else {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $stmt = conn->prepare("UPDATE users set name=:name,password=:password,phone=:phone where id = :id");
                $stmt->bindValue(':id', $user_id);
                $stmt->bindValue(':name', $name);
                $stmt->bindValue(':password', $password);
                $stmt->bindValue(':phone', $phone);
                $stmt->execute();
                $_SESSION['messsage'] = "The User file Was Updated";
                header("Location: ../Account.php");
            }
        }
    }

}
else if(isset($_POST['myfavorites']))
{
    if(isset($_SESSION['auth']))
    {
        $pro_id = $_POST['pro_id'];
        $user_id = $_SESSION['auth_user']['user_id'];
        $pro_exist = query("SELECT * FROM myfavorites where pro_id= $pro_id and user_id= $user_id");
        if(count($pro_exist)==0)
        {
            $stmt = conn->prepare("INSERT INTO myfavorites(pro_id,user_id) VALUES(:pro_id,:user_id);");
            $stmt->bindValue(':pro_id', $pro_id);
            $stmt->bindValue(':user_id', $user_id);
            $stmt->execute();
            echo 200;
        }
        else{
            query("DELETE FROM myfavorites WHERE pro_id = $pro_id AND user_id = $user_id;");
            echo 200;   
        }
    }
    else{
        header('Location: login.php');
        echo 300;
        exit();
    }
}
else if(isset($_POST['myfavoritesDelete']))
{
    if(isset($_SESSION['auth']))
    {
        $pro_id = $_POST['pro_id'];
        $user_id = $_SESSION['auth_user']['user_id'];
        query("DELETE FROM myfavorites WHERE pro_id = $pro_id AND user_id = $user_id;");
        echo 200;   
    }

}
else if(isset($_POST['addtocart']))
{
    if(isset($_SESSION['auth']))
    {
        $pro_id = $_POST['pro_id'];
        $user_id = $_SESSION['auth_user']['user_id'];
        $qty = $_POST['qty'];
        $exsitQty = $_POST['exsitQty'];
        // if($exsitQty <=0)
        // {
        //     $_SESSION['messsage'] = "The quinty is not aviable";
        //     header("Location: ../index.php");
        //     die();
        // }
        $pro_exist = query("SELECT * FROM cart where pro_id= $pro_id and user_id= $user_id");
        if(count($pro_exist)==0)
        {
            $stmt = conn->prepare("INSERT INTO cart (pro_id,user_id,qty) values(:pro_id,:user_id,:qty)");
            $stmt->bindValue(':pro_id', $pro_id);
            $stmt->bindValue(':user_id', $user_id);
            $stmt->bindValue(':qty', $qty);
            $stmt->execute();
            echo 200;
        }
        else{
            $stmt = conn->prepare("UPDATE cart set qty=:qty where pro_id= $pro_id and user_id= $user_id");
            $stmt->bindValue(':qty', $qty);
            $stmt->execute();
            echo 300;  
        }

    }
    else{
        echo 200; 
    }
    
}

else if(isset($_POST['removeiteam']))
{
    if(isset($_SESSION['auth']))
    {
        $pro_id = $_POST['pro_id'];
        $user_id = $_SESSION['auth_user']['user_id'];
        query("DELETE FROM cart WHERE pro_id = $pro_id AND user_id = $user_id;");
        echo 200;   
    }

}
else if(isset($_POST['AddOrder']))
{
    if(isset($_SESSION['auth']))
    {
        $total = $_GET['total'];
        $first_name = trim($_POST['First_name']);
        $last_name = trim($_POST['last_name']);
        $name =  $first_name . ' ' . $last_name;
        $city = trim($_POST['city']);
        $address = trim($_POST['address']);
        $phone = trim($_POST['phone']); 
        $zip = trim($_POST['zip']); 
        $business = trim($_POST['business']); 

    //
        $user_id = $_SESSION['auth_user']['user_id'];
        $tracking_no = "Anon".rand(1111,9999).substr($phone,2);
        $stmt = conn->prepare("INSERT INTO `orders`(`user_id`, `name`, `city`, `Address`, `phone`, `zip`, `BusinessName`, `tracking_no`, `status`, `payment_mode`, `total`) VALUES (:user_id,:name,:city,:Address,:phone,:zip,:BusinessName,:tracking_no,:status,:payment_mode,:total);");
        $stmt->bindValue(':user_id', $user_id);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':city', $city);
        $stmt->bindValue(':Address', $address);
        $stmt->bindValue(':phone', $phone);
        $stmt->bindValue(':zip', $zip);
        $stmt->bindValue(':BusinessName', $business);
        $stmt->bindValue(':tracking_no', $tracking_no);
        $stmt->bindValue(':status',0);
        $stmt->bindValue(':payment_mode',2);
        $stmt->bindValue(':total',$total);
        $stmt->execute();
        $order_id = conn->lastInsertId();
        $order = query("SELECT c.pro_id,c.qty,p.selling_price from products p,cart c where p.id = c.pro_id and c.user_id =$user_id;");
        if(count($order))
        {
            foreach($order as $o)
            {
                $pro_id = $o['pro_id'];
                $qty = $o['qty'];
                $price = $o['selling_price'];
                $stmt = conn->prepare("INSERT INTO order_iteam (order_id,pro_id,qty,price,user_id) VALUES(:order_id,:pro_id,:qty,:price,:user_id);");
                $stmt->bindValue(':order_id', $order_id);
                $stmt->bindValue(':pro_id', $pro_id);
                $stmt->bindValue(':qty', $qty);
                $stmt->bindValue(':price', $price);
                $stmt->bindValue(':user_id', $user_id);
                $stmt->execute();
                $updateqty = query("UPDATE products set qty = qty - $qty where id = $pro_id");
            }
            $cart = query("DELETE FROM cart WHERE user_id = $user_id;");
            $_SESSION['messsage'] = "The Products have Purshesed";
            header("Location: ../index.php");

        }
    }
}
else if(isset($_POST['CancelOrder']))
{
    $id = $_POST['order_id'];
    $result = query("UPDATE orders set status = 2,tracking_mode = 1 where id = $id");
    if(!$result)
    {
        echo 200;
    }
    else{
        echo 300;
    }
}

?>