<?php session_start();
if(isset($_SESSION['auth']))
{
    if($_SESSION['roleAs'] == 1)
    {
        if(isset($_SESSION['auth']))
        {
        unset($_SESSION['auth']);
        unset($_SESSION['auth_user']);
        }
    header('Location: ./index.php');
    }
}
?>
<!--  -->
<!--  -->
<?php include_once("includes/header.php"); ?>
<?php include_once("includes/navbars.php"); ?>
<?php include_once("includes/banner.php"); ?>
<?php include_once("includes/category.php"); ?>
<?php include_once("includes/main.php"); ?>
<?php include_once("includes/footer.php"); ?>


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