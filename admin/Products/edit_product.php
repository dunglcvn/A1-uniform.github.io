<?php
require_once("./lib/database_product.php");
require_once("./lib/functions.php");

if (!isset($_SESSION['admin_name'])) {
    redirect_to("../admin_crud/login.php");
}

$errors = [];
function isFormValidated()
{
    global $errors;
    return count($errors) == 0;
}
function checkform()
{


    global $errors;
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (empty($_POST['name'])) {
            $errors[] = "Name is required";
        }
        if (empty($_POST['color'])) {
            $errors[] = "Color is required";
        }
        if (empty($_POST['size'])) {
            $errors[] = "Size is required";
        }
        if (empty($_POST['type'])) {
            $errors[] = "Type is required";
        }
        if (empty($_POST['price'])) {
            $errors[] = "Price is required";
        }
        if (!is_numeric($_POST['price'])) {
            $errors[] = "Price must number only";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    checkform();
    if (isFormValidated()) {
        $product = [];
        $product['id'] = $_POST['id'];
        $product['name'] = $_POST['name'];
        $product['color'] = $_POST['color'];
        $product['size'] = $_POST['size'];
        $product['price'] = $_POST['price'];
        $product['type'] = $_POST['type'];
        $product['productdes'] = $_POST['productdes'];

        $result = update_product($product);

        if ($result) {
            redirect_to('index_products.php');
        }
    }
} else {
    if (!isset($_GET['ProductID'])) {
        redirect_to("index_products.php");
    } else {
        $id = $_GET['ProductID'];
        $product = find_product_by_id($id);
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
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
        <center>
            <div class="alert fade-in-top">
                <span class="btnClose" onclick="this.parentElement.style.display='none';">&times;</span>
                <strong class="fade-in-top">PLEASE REVIEW INFORMATION THAT YOU HAVE ENTERED</strong>
            </div>
        </center>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="form">
            <div class="registerForm">
                <table align="center">
                    <tr align="center">
                        <td colspan="2">
                            <h4>UPDATE PRODUCT</h4>
                        </td>
                    </tr>
                    <tr align="center">
                        <input type="hidden" name="id" value="<?php echo $product['ProductID'] ?>">
                    </tr>
                    <tr align="center">
                        <td colspan="2">
                            <label for="name">Product Name</label>
                            <input class="ip4" type="text" id="pname" name="name" value="<?php echo isFormValidated() ? $product['Name'] : $_POST['name'] ?>" />
                        </td>
                    </tr>
                    <tr align="center">
                        <td class="warning" class="check-productname" id="ep1"><span>Product Name is required</span></td>
                    </tr>
                    <tr align="center">
                        <td colspan="2">
                            <label for="color">Product Color</label>
                            &nbsp;<input class="ip4"  id="pcolor" type="text" name="color" value="<?php echo isFormValidated() ? $product['Color'] : $_POST['color'] ?>">
                        </td>
                    </tr>
                    <tr align="center">
                        <td class="warning" class="check-productcolor" id="ep2"><span>Product Color is required</span></td>
                    </tr>
                    <tr align="center">
                        <td colspan="2">
                            <label for="price">Product Price</label>
                            &nbsp;&nbsp;<input class="ip4" id="pprice" type="text" name="price" value="<?php echo isFormValidated() ? $product['Price'] : $_POST['price'] ?>">
                        </td>
                    </tr>
                    <tr align="center">
                        <td class="warning" class="check-productprice" id="ep3"><span>Product Price is required</span></td>
                    </tr>
                    <tr align="center">
                        <td class="warning" class="check-productprice" id="ep4"><span>Product Price must be number</span></td>
                    </tr>
                    <tr align="center">
                        <td colspan="2">
                            <label for="size">Product Size</label>
                            <select name="size" class="ip1 ip2" id="psize">
                                <option value="S" <?php if ($_SERVER['REQUEST_METHOD'] == 'GET') : echo
                                                            $product['Size'] == 'S' ? 'selected' : '';
                                                    endif ?>>S</option>
                                <option value="M" <?php if ($_SERVER['REQUEST_METHOD'] == 'GET') : echo
                                                            $product['Size'] == 'M' ? 'selected' : '';
                                                    endif; ?>>M</option>
                                <option value="L" <?php if ($_SERVER['REQUEST_METHOD'] == 'GET') : echo
                                                            $product['Size'] == 'L' ? 'selected' : '';
                                                    endif; ?>>L</option>
                                <option value="XL" <?php if ($_SERVER['REQUEST_METHOD'] == 'GET') : echo
                                                            $product['Size'] == 'XL' ? 'selected' : '';
                                                    endif; ?>>XL</option>
                            </select>
                        </td>
                    </tr>
                    <tr align="center">

                        <td class="warning" class="check-productsize" id="ep6"><span>Product Size is required</span></td>

                    </tr>
                    <tr align="center">
                        <td colspan="2">
                            <label for="type">Product Type</label>
                            <select name="type" class="ip1 ip2" id="ptype">
                                <?php
                                $types = select_type();
                                $count = mysqli_num_rows($types);
                                for ($i = 0; $i < $count; $i++) :
                                    $type = mysqli_fetch_assoc($types);
                                ?>
                                    <option value="<?php echo $type['Type']; ?>" <?php if ($_SERVER['REQUEST_METHOD'] == 'GET') : echo $product['Type'] == $type['Type'] ? 'selected' : '';
                                                                                    endif; ?>>
                                        <?php echo $type['Type']; ?>
                                    </option>
                                <?php
                                endfor;
                                mysqli_free_result($types);
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr align="center">
                        <td class="warning" class="check-producttype" id="ep7"><span>Product Type is required</span></td>
                    </tr>
                    <tr align="center">
                        <td colspan="2">
                            <label for="des">Product Description</label>
                            <textarea name="productdes" id="pdes" cols="25" rows="3"><?php echo isFormValidated() ? $product['ProductDescription'] : $_POST['productdes']; ?>
                            </textarea>
                        </td>
                    </tr>
                    <tr align="center">
                        <td class="warning" class="check-productdes" id="ep5"><span>Product Description is required</span></td>
                    </tr>
                    <tr align="center">
                        <td><input type="submit" value="Update" class="btnSubmit"></td>
                    </tr>
                </table>
        </form>
    </div>
    <br><br>
    <a class="btnIndex" href="index_products.php">
        <center><i class="fas fa-arrow-left"></i> BACK TO PRODUCT SITE</center>
    </a>
    <hr>
    <br><br>

</body>
<script src="js/jqr_edit_product.js"></script>

</html>

<?php db_disconnect($db); ?>