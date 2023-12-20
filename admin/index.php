<?php session_start();
if(isset($_SESSION['auth']))
{
    if($_SESSION['roleAs'] != 1)
    {
    ?>
<script>
window.location.href = '../index.php';
</script>
<?php
$_SESSION['messsage'] = "Access Denied, You Don’t Have Permission To Access on This Server";
    }
    else{
      
    }
}
else{
         ?>
<script>
window.location.href = '../login.php';
</script>
<?php
$_SESSION['messsage'] = "Access Denied, You Don’t Have Permission To Access on This Server";}
?>

<?php include('pages/header.php');?>
<?php include('pages/main.php');?>

<?php include('pages/footer.php');?>