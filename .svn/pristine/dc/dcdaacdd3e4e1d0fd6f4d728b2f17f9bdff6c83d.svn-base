<?php
require_once("lib/database_category.php");
require_once("lib/functions_category.php");

if (!isset($_SESSION['admin_name'])) {
    redirect_to("../admin_crud/login.php");
}

$errors = [];
function isFromValidated()
{
    global $errors;
    return count($errors) == 0;
}
function checkform()
{
    global $errors;
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (empty($_POST['type'])) {
            $errors[] = "Type is required";
        }
        if (!is_string($_POST['type'])) {
            $errors[] = "Type  is not number in";
        }

        if (check_type_exist_edit($_SESSION['Type'],$_POST['type'])) {
            $errors[] = "Type already exists";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    checkform();
    if (isFromValidated()) {

        $result = update_category($_SESSION['Type'], $_POST['type']);
        if ($result) {
            redirect_to('index_category.php');
        }
    }
} else {
    if (!isset($_GET['Type'])) {
        redirect_to("index_category.php");
        exit;
    } else {
        $id = $_GET['Type'];
        $category = find_category_by_type($_GET['Type']);
        $_SESSION['Type'] = $category['Type'];
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
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
        <div class="registerForm">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="form">
                <table align="center">
                    <tr align="center">
                        <td colspan="2">
                            <h4>CHANGE CATEGORY</h4>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><label for="type">Type</label>&nbsp;&nbsp;&nbsp;&nbsp;<input class="ip5" type="text" name="type" id="type" value="<?php echo isFromValidated() ? $category['Type'] : $_POST['type'] ?>" /></td>
                    </tr>
                    <tr align="center">
                        <td colspan="2" class="warning" id="ec1"><span>Type is required</span></td>
                    </tr>
                    <tr align="center">
                        <td colspan="2" class="warning" id="ec2"><span>Type mustn't include number</span></td>
                    </tr>
                    <?php if ($_SERVER['REQUEST_METHOD'] == "POST") : ?>
                        <?php if (check_type_exist_edit($_SESSION['Type'], $_POST['type'])): ?>
                            <tr align="center">
                                <td colspan="2" class="warning">
                                    <?php
                                    echo "Type already exists";
                                    ?>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endif; ?>
                    <tr align="center">
                        <td colspan="2"><input type="submit" value="Change" class="btnSubmit"></td>
                    </tr>
                </table>
            </form>
        </div>
        <br><br>
        <a class="btnIndex" href="index_category.php">
            <center><i class="fas fa-arrow-left"></i> BACK TO CATEGORY SITE</center>
        </a>
        <hr>
        <br><br>
    </div>
</body>
<script src="js/jqr_edit_cat.js"></script>

</html>

<?php db_disconnect($db); ?>