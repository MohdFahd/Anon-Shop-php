<?php
session_start();
include('config/dbcon.php');
include('pages/header.php');
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
<style>
.serach {
    width: 90%;
    border-top: none;
    border-left: none;
    border-right: none;
    border-bottom: 1px solid gray;
    position: absolute;

}

.from-search,
.table-responsive {
    position: relative;
}

.search-icon {
    position: absolute;
    top: 18px;
    right: 175px;
}

.from-search button {
    border: none;
    background-color: transparent;
}

.search_button {
    position: absolute;
    right: 55px;
    color: blue;
}

.return_button {
    position: absolute;
    right: 20px;
}

.serach:focus {
    outline: none;
}

input {
    border: none;
}

#datatable_filter input,
#datatable-products_filter input,
#datatable-users_filter input {
    margin-right: 30px;
    margin-left: 12px;
    margin-top: 12px;
    border-left: none;
    border-right: none;
    border-top: none;
    outline: none;
    background-color: transparent;
    padding-left: 20px;
}

.dataTables_length {
    margin-left: 30px;
    margin-top: 12px;
}

.dataTables_info {
    margin-left: 30px;
}

.dataTables_paginate {
    margin-right: 30px;
}
</style>
<link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
<script src="assets/js/jquery.dataTables.min.js"></script>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex">
                    <div class="col-md-10">
                        <h6>Users Table</h6>
                    </div>
                    <div class="col-md-2">
                        <a href="#">
                            <button class="btn btnnew btn-warning text-dark"><img width="20px"
                                    src="assets/icons/add-outline.svg" alt=""></i>
                                New</button></a>
                    </div>

                </div>
                <div data-bs-spy="scroll" class="card-body px-0 pt-0 pb-2 tbl-responsive">
                    <div class="table-responsive p-0">
                        <img class="search-icon" src="assets/icons/search-outline.svg" alt="" width="20px">
                        <table id="datatable-users" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        User
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Function
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Entered
                                    </th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                        $users = query("SELECT * from users");
                                        if(count($users))
                                        {
                                        foreach($users as $user) 
                                        {
                                            
                                ?>
                                <div class="modal fade" id="exampleModal<?=$user['id']?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label class="fw-bold" for="">User Name</label>
                                                        <div class="border rounded p-2">
                                                            <?=$user['name']?> </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="fw-bold" for="">User Email</label>
                                                        <div class="border rounded p-2">
                                                            <?=$user['email']?> </div>
                                                    </div>
                                                    <div class="row mt-3 ">
                                                        <div class="col-6">

                                                            <div class="form-check form-switch ps-0">

                                                                <input class="form-check-input ms-auto" type="checkbox"
                                                                    id="activ-user"
                                                                    <?=$user['active'] == '1' ? 'checked' : ''?>>
                                                                <label
                                                                    class="form-check-label text-body ms-3 text-truncate"
                                                                    for="flexSwitchCheckDefault4">Status</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-check form-switch ps-0">
                                                                <input class="form-check-input ms-auto" type="checkbox"
                                                                    id="role-user"
                                                                    <?=$user['role_id'] == '1' ? 'checked' : ''?>>
                                                                <label
                                                                    class="form-check-label text-body ms-3 text-truncate"
                                                                    for="flexSwitchCheckDefault4">Admin</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button data-bs-dismiss="modal" type="button"
                                                    data-role-id="<?= $user['role_id'];?>"
                                                    data-active="<?= $user['active'];?>"
                                                    data-user-id="<?= $user['id'];?>"
                                                    class="btn btn-primary userbtn">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                $(document).ready(function() {
                                    $("#exampleModal<?=$user['id']?>").on("click", ".userbtn", function() {
                                        var user_id = $(this).data("user-id");
                                        var active = $("#exampleModal<?=$user['id']?>").find(
                                            "#activ-user").prop('checked');
                                        var role = $("#exampleModal<?=$user['id']?>").find(
                                            "#role-user").prop('checked');
                                        if (active) {
                                            active = 1;
                                        } else {
                                            active = 0;
                                        }
                                        if (role) {
                                            role = 1;
                                        } else {
                                            role = 2;
                                        }
                                        // Send an AJAX request to update the database
                                        $.ajax({
                                            type: "POST",
                                            url: "config/code.php",
                                            data: {
                                                user_id: user_id,
                                                active: active,
                                                rolo_id: role,
                                                edituser: true,
                                            },
                                            success: function(response) {
                                                if (response == 200) {
                                                    $("#datatable-users").load(location
                                                        .href +
                                                        " #datatable-users > *");
                                                    Swal.fire({
                                                        position: 'top-center',
                                                        icon: 'success',
                                                        title: 'Your work has been saved',
                                                        showConfirmButton: false,
                                                        timer: 1500
                                                    })
                                                } else if (response == 300) {

                                                }
                                            },
                                            error: function(xhr, status, error) {
                                                console.error("AJAX Error:", error);
                                            },
                                        });
                                    });
                                });
                                </script>

                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="assets/img/team-2.jpg" class="avatar avatar-sm me-3"
                                                    alt="user1" />
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">
                                                    <?=$user['name']; ?>
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <?=$user['email']; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">
                                            <?=$user['role_id'] == '2' ? 'User' : 'Admin'?></p>
                                        <p class="text-xs text-secondary mb-0">
                                            Organization
                                        </p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <?php
                                                if($user['active'] == '1')
                                                {
                                                $color = "success";
                                                } 
                                                else{
                                                    $color = "secondary";
                                                }
                                                 ?>
                                        <span
                                            class="badge badge-sm bg-gradient-<?=$color?>"><?=$user['active'] == '1' ? 'Online' : "Offline" ; ?>
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span
                                            class="text-secondary text-xs font-weight-bold"><?=substr($user['create_at'],0,10) ?></span>
                                    </td>
                                    <td class="align-middle">
                                        <button type="button" style="border: none; background-color: transparent;"
                                            class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal<?=$user['id']?>">
                                            Edit
                                        </button>
                                    </td>
                                </tr>
                                <?php 
                                        }
                                    }
                                        ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- // -->
    <?php 
        $category = query("SELECT * from category");
    ?>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex">
                    <div class="col-lg-10">
                        <h6>Category Table</h6>
                    </div>
                    <div class="col-lg-2">
                        <a href="AddCategory.php">
                            <button class="btn btnnew btn-warning text-dark"><img width="20px"
                                    src="assets/icons/add-outline.svg" alt=""></i>
                                New</button></a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <img class="search-icon" src="assets/icons/search-outline.svg" alt="" width="20px">

                        <table id="datatable" class="table hover align-items-center mb-0 mb-0 tblsd p-2">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Category
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Status
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Popular
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(count($category))
                                {
                                foreach($category as $cat)
                                {?>
                                <tr id="search-results">
                                    <td>
                                        <div class="d-flex px-2">
                                            <div>
                                                <img src="../uploads/<?=$cat['img'] ?>"
                                                    class="avatar avatar-sm rounded-circle me-2" alt="spotify" />
                                            </div>
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm"><?=$cat['name'] ?></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <?php
                                    if($cat['status']=='0')
                                    {
                                    ?>
                                    <td class="align-start text-start text-sm">
                                        <span class="badge badge-sm bg-gradient-danger">OFF</span>
                                    </td>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    <td class="align-start text-start text-sm">
                                        <span class="badge badge-sm bg-gradient-primary">ON</span>
                                    </td>
                                    <?php 
                                    }
                                    ?>
                                    <?php
                                    if($cat['popular']=='0')
                                    {
                                    ?>
                                    <td class="align-start text-start text-sm">
                                        <span class="badge badge-sm bg-gradient-danger">OFF</span>
                                    </td>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    <td class="align-start text-start text-sm">
                                        <span class="badge badge-sm bg-gradient-primary">ON</span>
                                    </td>
                                    <?php 
                                    }
                                    ?>
                                    <td class="align-middle">
                                        <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-secondary" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5 bg-gray text-primary"
                                            aria-labelledby="dropdownTable">
                                            <li><a href="EditCategory.php?id=<?=$cat['id'] ?>"
                                                    class="dropdown-item border-radius-md" href="javascript:;">Edit</a>
                                            </li>
                                            <button type="submit"
                                                style=" background-color: transparent; border: none ; width: 100%;text-align: start; padding: 0px 0px; margin: 0px 0px; "
                                                class="deleteIteam" value="<?=$cat['id'] ?>">
                                                <li><a class="dropdown-item border-radius-md"
                                                        href="javascript:;">Delete</a>
                                                </li>
                                            </button>
                                        </ul>

                                    </td>
                                </tr>
                                <?php
                                        }
                                    }
                                    ?>
                            </tbody>
                        </table>


                        <script>
                        let table = new DataTable('#datatable');
                        $('#datatable_filter input').attr('placeholder', 'Search...');

                        // Bind the click event handler to a static parent element
                        $(document).on('click', '.deleteIteam', function(e) {
                            e.preventDefault();
                            const id = $(this).val();

                            Swal.fire({
                                title: 'Are you sure?',
                                text: "You won't be able to revert this!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, delete it!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                        type: "POST",
                                        url: "config/code.php",
                                        data: {
                                            'cat_id': id,
                                            'delete_category': true
                                        },
                                        success: function(response) {
                                            if (response == 200) {
                                                Swal.fire('Deleted!',
                                                    'Your file has been deleted.',
                                                    'success');
                                                $(".tblsd").load(location.href +
                                                    " .tblsd > *");
                                            } else {
                                                console.error("Error:", response);
                                            }
                                        },
                                        error: function(xhr, status, error) {
                                            console.error("AJAX Error:", error);
                                        }
                                    });
                                }
                            });
                        });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex">
                    <div class="col-md-10">
                        <h6>Products Table</h6>
                    </div>
                    <div class="col-md-2">
                        <a href="AddProduct.php">
                            <button class="btn btnnew btn-info text-dark"><img width="20px"
                                    src="assets/icons/add-outline.svg" alt=""></i>
                                New</button></a>
                    </div>

                </div>
                <!--  -->
                <?php 
                        $products = query("SELECT * from products");
                        ?>
                <div data-bs-spy="scroll" class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <img class="search-icon" src="assets/icons/search-outline.svg" alt="" width="20px">

                        <table id="datatable-products" class="table align-items-center mb-0 tblsdp">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Product
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Category
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Qty
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Trending
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Price
                                    </th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                        if(count($products))
                                        {
                                        foreach($products as $product) 
                                        {?>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../uploads/<?=$product['img'] ?>"
                                                    class="avatar avatar-sm me-3" alt="user1" />
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm text-truncate ">
                                                    <?=$product['name']; ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"><?php $cati = qselect("category","id", $product['cat_id']);
                                        if(count($cati))
                                        {
                                            echo $cati['name'];
                                        }
                                        ?>

                                        </p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <h6 class="mb-0 text-sm"><?=$product['qty']; ?></h6>
                                    </td>
                                    </td>
                                    <?php
                                    if($product['status']=='0')
                                    {
                                    ?>
                                    <td class="align-start text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-danger">OFF</span>
                                    </td>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    <td class="align-start text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-primary">ON</span>
                                    </td>
                                    <?php 
                                    }
                                    ?>
                                    <?php
                                    if($product['trending']=='0')
                                    {
                                    ?>
                                    <td class="align-start text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-danger">OFF</span>
                                    </td>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    <td class="align-start text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-primary">ON</span>
                                    </td>
                                    <?php 
                                    }
                                    ?>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">
                                            <?=$product['selling_price']; ?> $</span>
                                    </td>
                                    <td class="align-middle">
                                        <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-secondary" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5 bg-gray text-primary"
                                            aria-labelledby="dropdownTable">
                                            <li><a href="EditProduct.php?id=<?=$product['id'] ?>"
                                                    class="dropdown-item border-radius-md" href="javascript:;">Edit</a>
                                            </li>
                                            <button type="submit"
                                                style=" background-color: transparent; border: none ; width: 100%;text-align: start; padding: 0px 0px; margin: 0px 0px; "
                                                class="deleteproduct" value="<?=$product['id'] ?>">
                                                <li><a class="dropdown-item border-radius-md"
                                                        href="javascript:;">Delete</a>
                                                </li>
                                            </button>
                                        </ul>

                                    </td>
                                </tr>
                                <?php 
                                        }
                                    }
                                        ?>

                            </tbody>
                            <script>
                            let ProductTable = new DataTable('#datatable-products');
                            let UsersTable = new DataTable('#datatable-users');
                            $('#datatable-users_filter input').attr('placeholder', 'Search...');
                            $('#datatable-products_filter input').attr('placeholder', 'Search...');
                            // Bind the click event handler to a static parent element
                            $(document).on('click', '.deleteproduct', function(e) {
                                e.preventDefault();
                                const id = $(this).val();

                                Swal.fire({
                                    title: 'Are you sure?',
                                    text: "You won't be able to revert this!",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes, delete it!'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $.ajax({
                                            type: "POST",
                                            url: "config/code.php",
                                            data: {
                                                'pro_id': id,
                                                'delete_product': true
                                            },
                                            success: function(response) {
                                                if (response == 200) {
                                                    Swal.fire('Deleted!',
                                                        'Your file has been deleted.',
                                                        'success');
                                                    $(".tblsdp").load(location.href +
                                                        " .tblsdp > *");
                                                } else {
                                                    console.error("Error:", response);
                                                }
                                            },
                                            error: function(xhr, status, error) {
                                                console.error("AJAX Error:", error);
                                            }
                                        });
                                    }
                                });
                            });
                            </script>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('pages/footer.php');
?>