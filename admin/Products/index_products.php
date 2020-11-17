<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Site</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/admin_css.css">
    <link href="../../style/style.css" rel="stylesheet">
</head>

<body>
    <?php
    require_once("./lib/database_product.php");
    require_once("../layout_admin/header.php");

    if (!isset($_SESSION['admin_name'])) {
        header("Location:../admin_crud/login.php");
    }
    ?>
    <div class="container-fluid">
        <br><br>
        <center>
            <h2 class="text">PRODUCT SITE</h2>
        </center>
        <div class="table-responsive">
            <table class="table table-striped">
                <a href="create_new_product.php">
                    <div class="btn btn-success"><i class="fas fa-plus-square"></i></div>
                </a>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Product Description</th>
                    <th>Image Manage</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                $products = selectAll();
                $count = mysqli_num_rows($products);
                for ($i = 0; $i < $count; $i++) :
                    $product = mysqli_fetch_assoc($products);

                ?>
                    <tr>

                        <td><?php echo $product['ProductID'] ?></td>
                        <td><?php echo $product['Name'] ?></td>
                        <td><?php echo $product['Type'] ?></td>
                        <td><?php echo $product['Color'] ?></td>
                        <td><?php echo $product['Size'] ?></td>
                        <td><?php echo $product['Price'] ?></td>
                        <td><?php echo $product['ProductDescription']; ?></td>
                        <td><a href="<?php echo "index_product_img.php?ProductID=" . $product['ProductID']; ?>">
                                <div class="btn btn-info"><i class="far fa-image"></i></div>
                            </a></td>
                        <td><a href=" <?php echo "edit_product.php?ProductID=" . $product['ProductID'] ?>">
                                <div class="btn btn-primary"><i class="fas fa-cog"></i></div>
                            </a></td>
                        <td><a href=" <?php echo "delete_product.php?ProductID=" . $product['ProductID'] ?>">
                                <div class="btn btn-danger"><i class="fas fa-minus-square"></i></div>
                            </a></td>
                    </tr>
                <?php
                endfor;
                mysqli_free_result($products);
                ?>
            </table>
        </div>
        <br>
        <br>
    </div>

</body>

</html>

<?php db_disconnect($db); ?>