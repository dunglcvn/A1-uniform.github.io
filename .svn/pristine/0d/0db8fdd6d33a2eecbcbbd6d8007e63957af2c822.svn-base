<?php
require_once("lib/database_product.php");
require_once("lib/functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $result = delete_product($_POST['ProductID']);
    if ($result) {
        redirect_to("index_products.php");
    }
} else {
    if (!isset($_GET['ProductID'])) {
        redirect_to("index_products.php");
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
    <title>Delete Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../style/login.css">
</head>

<body class="bg_login">
    <br>
    <center><a href="../../index.php"><img src="../../images/a1logo.png" alt="" height="70"></a></center>
    <hr>
    <br>
    <div class="container-fluid">
        <div class="registerForm">
            <table align="center">
                <tr align="center">
                    <td>
                        <h4>DELETE PRODUCT</h4>
                    </td>
                </tr>
                <tr align="left">
                    <td>
                        Product Name: <span><?php echo $product['Name']; ?> </span>
                    </td>
                </tr>
                <tr align="left">
                    <td>
                        Type: <span><?php echo $product['Type']; ?></span>
                    </td>
                </tr>
                <tr align="left">
                    <td>
                        Color: <span><?php echo $product['Color']; ?></span>
                    </td>
                </tr>
                <tr align="left">
                    <td>
                        Size: <span><?php echo $product['Size']; ?></span>
                    </td>
                </tr>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="form">
                    <tr>
                        <input type="hidden" name="ProductID" value="<?php echo $product['ProductID']; ?>">
                    </tr>
                    <tr align="center">
                        <td>
                            <input type="submit" name="submit" value="Delete" class="btnSubmit">
                        </td>
                    </tr>
                </form>
            </table>
        </div>
    </div>
    <br><br>
    <a class="btnIndex" href="index_products.php">
        <center><i class="fas fa-arrow-left"></i> BACK TO PRODUCT SITE</center>
    </a>
    <hr>
    <br><br>
</body>
<script src="js/jqr_delete_product.js"></script>

</html>