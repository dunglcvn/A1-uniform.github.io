<?php
require_once("lib/database_product.php");
require_once("lib/functions.php");

if (!isset($_SESSION['admin_name'])) {
    redirect_to("../admin_crud/login.php");
}

$errors = [];
function isFormValidated()
{
    global $errors;
    return count($errors) == 0;
}

$test = 0;
function checkform()
{

    global $errors;
    global $test;
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $target_dir = "imgUpLoads/";
        $uploadOk = 1;
        $target_file = $target_dir . "/" . basename($_FILES["img"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["img"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $errors[] = "File is not an image";
            $uploadOk = 0;
        }

        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk != 0) {
            if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
                $test = 1;
            } else {
                $errors[] = "Sorry, there was an error uploading your file";
            }
        }

        if (isFormValidated()) {
            $image = "images/" . $_FILES['img']['name'];
            $product = [];
            
            $product['name'] = $_POST["name"];
            $product['color'] = $_POST['color'];
            $product['size'] = $_POST['size'];
            $product['type'] = $_POST['type'];
            $product['price'] = $_POST['price'];
            $product['image'] = $image;
            $product['productdes'] = $_POST['productdes'];

            if ($test == 1) {
                $result = insert_into($product);
                if ($result) {
                    redirect_to("index_products.php");
                }
            }
        }
    }
}

?>
<?php checkform(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new product</title>
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
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" id="form">
            <div class="registerForm">
                <table align="center">
                    <tr align="center">
                        <td colspan="2">
                            <h4>Add New Product</h4>
                        </td>
                    </tr>
                    <tr align="center">
                        <td colspan="2"><input class="ip1" id="pname" placeholder="Product Name" type="text" name="name" value="<?php echo isFormValidated() ? '' : $_POST['name']; ?>" /></td>
                    </tr>
                    <tr align="center">
                        <td class="warning" class="check-productname" id="ep1"><span>Product Name is required</span></td>
                    </tr>
                    <tr align="center">
                        <td colspan="2"><input class="ip1" placeholder="Product Color" id="pcolor" type="text" name="color" value="<?php echo isFormValidated() ? '' : $_POST['color']; ?>"></td>
                    </tr>
                    <tr align="center">
                        <td class="warning" class="check-productcolor" id="ep2"><span>Product Color is required</span></td>
                    </tr>
                    <tr align="center">
                        <td colspan="2"><input class="ip1" id="pprice" placeholder="Product Price" type="text" name="price" value="<?php echo isFormValidated() ? '' : $_POST['price'];  ?>"></td>
                    </tr>
                    <tr align="center">
                        <td class="warning" class="check-productprice" id="ep3"><span>Product Price is required</span></td>

                    </tr>
                    <tr align="center">
                        <td class="warning" class="check-productprice" id="ep4"><span>Product Price must be number</span></td>
                    </tr>
                    <tr align="center">
                        <td colspan="2"><textarea class="ip1" id="pdes" placeholder="Product Description" name="productdes" cols="20" rows="1"></textarea></td>
                    </tr>
                    <tr align="center">
                        <td class="warning" class="check-productdes" id="ep5"><span>Product Description is required</span></td>
                    </tr>
                    <tr align="center">
                        <td colspan="2">
                            <select name="size" class="ip1 ip2" id="psize" required>
                                <option value="0" disabled selected>Choose a size</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                        </td>
                    </tr>
                    <tr align="center">

                        <td class="warning" class="check-productsize" id="ep6"><span>Product Size is required</span></td>

                    </tr>
                    <tr align="center">
                        <td colspan="2">
                            <select name="type" class="ip1 ip2" id="ptype" required>
                                <option value="0" disabled selected>Choose a type</option>
                                <?php $result = select_type();
                                while ($data = mysqli_fetch_array($result)) : ?>
                                    <option value="<?php echo $data['Type'] ?>"><?php echo $data['Type'] ?></option>";
                                <?php endwhile; ?>
                            </select></td>
                    </tr>
                    <tr align="center">
                        <td class="warning" class="check-producttype" id="ep7"><span>Product Type is required</span></td>
                    </tr>
                    <tr align="center">
                        <td colspan="2"><span>&nbsp;&nbsp;Image&nbsp;</span><input class="ip3" type="file" name="img" id="img" required></td>
                    </tr>
                    <tr align="center">
                        <td colspan="2"><input type="submit" value="Add" class="btnSubmit"></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
    <br><br>
    <a class="btnIndex" href="index_products.php">
        <center><i class="fas fa-arrow-left"></i> BACK TO PRODUCT SITE</center>
    </a>
    <hr>
    <br><br>
</body>
<script src="js/jqr_add_product.js"></script>

</html>

<?php db_disconnect($db); ?>