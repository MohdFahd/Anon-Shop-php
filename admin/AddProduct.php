<?php
session_start();
require("pages/header.php");
include("config/dbcon.php");
?>
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
<div class=" container">
    <form action="config/code.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Goods</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Name</label>
                                <input type="text" name="pro_name" id="" placeholder="Enter the name of Product"
                                    class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label for="">Select Category</label>
                                <select name="cat_id" class="form-select form-label p-2"
                                    aria-label="Default select example" aria-placeholder="sdadasd" require>
                                    <option selected>Select one of the Category</option>
                                    <?php
                                    $cats = query("SELECT * FROM category");
                                    if(count($cats))
                                    {
                                        foreach($cats as $cat)
                                        {
                                            ?>
                                    <option value="<?= $cat['id'] ;?>"><?= $cat['name'] ;?></option>
                                    <?php
                                        }
                                    }
                                    else{
                                        echo "NO CATEGORIES ARE AVAILIBLE";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="">Description</label>
                                <textarea name="description" id="" cols="100" rows="5"
                                    placeholder="Enter the description"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="">Orginl price</label>
                                <input type="number" name="orginl_price" id="" placeholder="Enter the orginl price"
                                    class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label for="">Selling_price</label>
                                <input type="number" name="selling_price" id="" placeholder="Enter the selling price"
                                    class="form-control mb-2">
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Primary img</label>
                                    <input type="file" name="img" id="" placeholder="insert the img"
                                        class="form-control mb-2">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Secondery img</label>
                                    <input type="file" name="simg" id="" placeholder="insert the img"
                                        class="form-control mb-2">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Third img</label>
                                    <input type="file" name="timg" id="" placeholder="insert the img"
                                        class="form-control mb-2">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Fourth img</label>
                                    <input type="file" name="fimg" id="" placeholder="insert the img"
                                        class="form-control mb-2">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label for="">Qty</label>
                                    <input type="number" name="qty" id="" placeholder="Enter the orginl price"
                                        class="form-control mb-2">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch ps-0 col-md-3">

                                        <input class="form-check-input ms-auto" name="status" type="checkbox"
                                            id="flexSwitchCheckDefault" checked="" />
                                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                            for="flexSwitchCheckDefault">Status</label>
                                    </div>
                                    <div class="form-check form-switch ps-0 col-md-3">
                                        <input class="form-check-input ms-auto" name="trending" type="checkbox"
                                            id="flexSwitchCheckDefault" checked="" />
                                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                            for="flexSwitchCheckDefault">Trending</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <button class="btn btn-primary w-25 p-3" type="submit"
                                    name="AddProductsbtn">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
<?php include("pages/footer.php"); ?>