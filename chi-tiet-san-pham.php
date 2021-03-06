<?php
require_once("admin/Products/lib/database_product.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
} else {
    if (!isset($_GET['ProductID'])) {
        redirect_to("../../index.php");
    }

    $product = find_product_by_id($_GET['ProductID']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $product['Name'] . " " . $product['Color']; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
    <link rel="stylesheet" href="style/chi-tiet-san-pham.css">
    <link href="./style/style.css" rel="stylesheet">
</head>
<?php require_once __DIR__ . "/layouts/header.php"; ?>

<body>
    <div class="container">
        <br>
        <hr>
        <ul class="breadcrumb">
            <li><a href="index.php" class="navv">Home</a></li>&nbsp;&nbsp;/
            <li><a href="<?php echo "search.php?btnType=" . $product['Type']; ?>" class="navv"><?php echo $product['Type'];  ?></a></li>&nbsp;&nbsp;/
            <li class="active"><?php echo $product['Name']; ?></li>
        </ul>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="row">
                <div class="col-sm-4">
                    <img src="<?php echo $product['Image']; ?>" alt="" width="100%" id="imgPrimary" data-toggle="modal" data-target="#myModal">
                    <center>
                        <h6><i class="fas fa-search-plus"></i> Click to zoom image</h6>
                    </center>
                    <div id="myModal" class="modal fade in" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4><?php echo $product['Name'] . " - " . $product['Color']; ?></h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <img src="<?php echo $product['Image']; ?>" alt="" width="105%" id="imgPrimary1">
                                        </div>
                                        <div class="col-md-2">
                                            <img src="<?php echo $product['Image']; ?>" alt="" width="100%" class="img1">
                                            <?php
                                            $images = select_product_img($product['ProductID']);
                                            $count = mysqli_num_rows($images);
                                            for ($i = 0; $i < $count; $i++) :
                                                $img = mysqli_fetch_assoc($images);
                                            ?>
                                                <img src="<?php echo $img['img_link']; ?>" alt="" width="100%" class="img1">
                                            <?php
                                            endfor;
                                            mysqli_free_result($images);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img src="<?php echo $product['Image']; ?>" alt="" width="24%" class="img">
                    <?php
                    $images = select_product_img($product['ProductID']);
                    $count = mysqli_num_rows($images);
                    for ($i = 0; $i < $count; $i++) :
                        $img = mysqli_fetch_assoc($images);
                    ?>
                        <img src="<?php echo $img['img_link']; ?>" alt="" width="24%" class="img">
                    <?php
                    endfor;
                    mysqli_free_result($images);
                    ?>
                </div>
                <div class="col-sm-4">
                    <center>
                        <h4 id="name"><i><?php echo $product['Name']; ?></i></h4>
                        <br>
                        <h5>Color: <span id="color"><?php echo $product['Color']; ?></span></h5>
                        <br>
                        <div class="size">
                            <span class="txt">Select Size: &nbsp;&nbsp;</span>
                            <select name="size" id="size">
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                        </div>
                        <br>
                        <h5>Price: <span id="price"><?php echo $product['Price']; ?> ₫</span></h5>
                        <br>
                        <div class="quantity">
                            <h5>Quantity: </h5>
                            <button type="button" class="btnQuantity" id="sub"><i class="fas fa-arrow-alt-circle-down"></i></button>
                            <input type="text" id="quantity" value="1">
                            <button type="button" class="btnQuantity" id="add"><i class="fas fa-arrow-alt-circle-up"></i></button>
                        </div>
                        <br>
                        <?php if (!isset($_SESSION['username'])) : ?>
                            <a href="#" id="buy_without_user">
                                <button class="buy" type="button">
                                    <span>Buy</span>
                                </button>
                            </a>
                        <?php else : ?>
                            <a href="#" id="buy">
                                <button class="buy" type="button">
                                    <span>Buy</span>
                                </button>
                            </a>
                            <span id="username"><?php echo $_SESSION['username']; ?></span>
                        <?php endif; ?>
                    </center>
                </div>
                <div class="col-sm-4">
                    <h4><i>Product Description</i></h4>
                    <div class="pro-des">
                        <?php echo $product['ProductDescription']; ?>
                    </div>
                </div>
            </div>
            <br><br>
            <br>
            <a class="btnIndex" href="index.php">
                <center><i class="fas fa-arrow-left"></i> BACK TO STORE</center>
            </a>
            <hr>
        </form>
        <br>
    </div>
    <br><br><br>
    <script src="js/jqr_product_detail.js"></script>
</body>
<?php require_once __DIR__ . "/layouts/footer.php"; ?>

</html>

<?php db_disconnect($db); ?>