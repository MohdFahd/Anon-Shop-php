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

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="row">
                    <div class="card-header pb-0 col-lg-10 col-md-10 col-sm-6">
                        <h6>Add Category</h6>
                    </div>
                    <div class="col-lg-2 col-md-10 col-sm-6">
                        <a href="#">
                            <button class="btn btnnew btn-warning text-dark"><img width="20px"
                                    src="assets/icons/add-outline.svg" alt=""></i>
                                New</button></a>
                    </div>
                </div>
                <form action="config/code.php" method="post" enctype="multipart/form-data">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="row px-3 mt-3">
                            <div class="form-floating mb-3 col-lg-6 col-md-6">
                                <input type="text" required name="name" class="form-control" id="floatingInput"
                                    placeholder="Enter The Name Of Category" />
                                <label for="floatingInput">Name</label>
                            </div>
                            <div class="form-floating mb-3 col-lg-6 col-md-6">
                                <input type="text" name="slug" class="form-control" id="floatingInput"
                                    placeholder="name@example.com" />
                                <label for="floatingInput">Slug</label>
                            </div>
                        </div>
                        <div class="form-floating mb-3 col-lg-12 col-md-6 col-sm-6 p-3">
                            <textarea name="description" class="p-2" id=""
                                placeholder="Enter The Description"></textarea>
                        </div>
                        <div class="form-floating mb-3 col-lg-12 col-md-12 p-3">
                            <input name="img" type="file" class="form-control" />
                        </div>
                        <div class="row px-3 mt-3 mx-2">
                            <div class="form-check form-switch ps-0 col-md-6">
                                <input class="form-check-input ms-auto" name="status" type="checkbox"
                                    id="flexSwitchCheckDefault" checked="" />
                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                    for="flexSwitchCheckDefault">Status</label>
                            </div>
                            <div class="form-check form-switch ps-0 col-md-6">
                                <input class="form-check-input ms-auto" name="popular" type="checkbox"
                                    id="flexSwitchCheckDefault" checked="" />
                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                    for="flexSwitchCheckDefault">Popular</label>
                            </div>
                        </div>
                        <button type="submit" name="AddCategory" class="btn btn-primary m-3">
                            Add Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require("pages/footer.php") ?>