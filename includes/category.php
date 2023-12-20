    <?php require_once("./admin/config/dbcon.php"); ?>
    <div class="category">

        <div class="container">
            <div class="category-item-container has-scrollbar">
                <?php
            $cats = query("SELECT id,name,img FROM category where STATUS = 1;");
            if(count($cats))
            {
                foreach($cats as $cat)
                {
                ?>
                <div class="category-item">

                    <div class="category-img-box">
                        <img src="./uploads/<?= $cat['img'] ?>" alt="<?= $cat['name'] ?>" width="30">
                    </div>

                    <div class="category-content-box">

                        <div class="category-content-flex">
                            <h3 class="category-item-title"><?= $cat['name'] ?></h3>
                            <?php
                            $cat_id = $cat['id'];
                            $qty = query("SELECT * FROM products WHERE cat_id = $cat_id;") ?>
                            <p class="category-item-amount">(<?= count($qty); ?>)</p>
                        </div>

                        <a href="./Products.php?id=<?=$cat['id']?>&name=<?=$cat['name'];?>" class="category-btn">Show
                            all</a>

                    </div>

                </div>

                <?php
                }
            }
            ?>
            </div>
        </div>

    </div>