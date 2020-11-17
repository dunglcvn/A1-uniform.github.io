<?php
require_once("../lib/database_product.php");
require_once("../lib/functions.php");

$errors = [];

function isFormValidated() {
    global $errors;

    return count($errors) == 0;
}

function checkForm() {
    global $errors;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (empty($_POST['img_link'])) {
            $errors[] = "img link is required";
        }

    }

}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    checkForm();
    if (isFormValidated()) {
        $img = [];
        $img['img_link'] = $_POST['img_link'];
        $img['ProductID'] = $_POST['ProductID'];

        $result = insert_product_img($img);

        if ($result) {
            redirect_to("../index_product_img.php?ProductID=" . $img['ProductID']);
        }
    }
} else {
    if (!isset($_GET['ProductID'])) {
        redirect_to("../index_product_img.php");
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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Product Image</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../style/login.css">
</head>
<body class="bg_login">
    <br>
    <center><a href="../../../index.php"><img src="../../../images/a1logo.png" alt="" height="70"></a></center>
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
                <table  align="center">
                    <tr align="center">
                        <td colspan="2">
                            <h4>Add New Product Image</h4>
                        </td>
                        <td align="center">
                            <input type="hidden" name="ProductID" value="<?php echo  $product['ProductID']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <input type="text" id="img_link" placeholder="Please enter or paste image link in here" class="ip" name="img_link">
                        </td>
                    </tr>
                    <tr align="center">
                        <td class="warning" class="check-productname" id="epi"><span>Image Link is required</span></td>
                    </tr>
                    <tr align="center">
                        <td>
                            <button type="button" id="preview" class="btnPreview">Preview</button>
                        </td>
                    </tr>
                    <tr align="center">
                        <td>
                            <img src="" alt="" id="img" class="hidden" width="100%">
                        </td>
                    </tr>
                    <tr align="center">
                        <td colspan="2"><input type="submit" value="Add" class="btnSubmit"></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
    <br><br>
    <a class="btnIndex" href="<?php echo "../index_product_img.php?ProductID=" . $product['ProductID']; ?>">
        <center><i class="fas fa-arrow-left"></i> BACK TO PRODUCT IMAGE SITE</center>
    </a>
    <hr>
    <br><br>
</body>
<script src="../js/jqr_add_product_img.js"></script>
</html>