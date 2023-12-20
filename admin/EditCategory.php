<?php
session_start(); require("pages/header.php") ?>
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
<?php
require("config/dbcon.php");
$cat_id = $_GET['id'];
?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Edit Category</h6>
                    </div>
                    <?php
                    $category = qselect("category","id",$cat_id);
                    if(count($category))
                    {
                    ?>
                    <form action="config/code.php" method="post" enctype="multipart/form-data">
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="row px-3 mt-3">
                                <div class="form-floating mb-3 col-lg-6 col-md-6">
                                    <input type="hidden" name="cat_id" value="<?= $cat_id ?>">
                                    <input type="text" required name="name" value="<?=$category['name'] ?>"
                                        class="form-control" id="floatingInput"
                                        placeholder="Enter The Name Of Category" />
                                    <label for="floatingInput">Name</label>
                                </div>
                                <div class="form-floating mb-3 col-lg-6 col-md-6">
                                    <input type="text" value="<?=$category['slug'] ?>" name="slug" class="form-control"
                                        id="floatingInput" placeholder="name@example.com" />
                                    <label for="floatingInput">Slug</label>
                                </div>
                            </div>
                            <div class="form-floating mb-3 col-lg-12 col-md-12 p-3">
                                <textarea name="description" class="p-2" id="" cols="104" rows="5"
                                    placeholder="Enter The Description"><?=$category['description'] ?></textarea>
                            </div>
                            <div class="form-floating mb-3 col-lg-12 col-md-12 p-3">
                                <input name="img" type="file" class="form-control" />
                                <img src="../uploads/<?=$category['img'] ?>" width="50px" height="50px" alt="">
                                <input type="hidden" value="<?= $category['img'];?>" name="old_img">
                            </div>
                            <div class="row px-3 mt-3 mx-2">
                                <div class="form-check form-switch ps-0 col-md-6">
                                    <input class="form-check-input ms-auto" name="status" type="checkbox"
                                        id="flexSwitchCheckDefault" <?=$category['status'] ? 'checked' : '' ?> />
                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                        for="flexSwitchCheckDefault">Status</label>
                                </div>
                                <div class="form-check form-switch ps-0 col-md-6">
                                    <input class="form-check-input ms-auto" name="popular" type="checkbox"
                                        id="flexSwitchCheckDefault" <?=$category['popular'] ? 'checked' : '' ?> />
                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                        for="flexSwitchCheckDefault">Popular</label>
                                </div>
                            </div>
                            <button type="submit" name="EditCategory" class="btn btn-primary m-3">
                                Save
                            </button>
                        </div>
                    </form>
                    <?php 
                    }
                    else{
                        echo "Something went wrong";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require("pages/footer.php") ?>