<?php
require_once("lib/database_category.php");
require_once("lib/functions_category.php");
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

        if (empty($_POST['type'])) {
            $errors[] = "Type is required";
        } elseif (!is_string($_POST['type'])) {
            $errors[] = "Type mustn't include number";
        }

        if (check_type_cat($_POST['type'])) {
            $errors[] = "Type already exists";
        }

        if (isformValidated()) {
            $category = [];
            $category['Type'] = $_POST["type"];

            $result = insert_into($category);
            if ($result) {
                redirect_to("index_category.php");
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create-Category</title>
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
    <?php checkform(); ?>
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
                <table align="center" grid-row-gap="20px">
                    <tr align="center">
                        <td colspan="2">
                            <h4>Add New Category</h4>
                        </td>
                    </tr>
                    <tr align="center">
                        <td colspan="2"><input class="ip4" id="type" placeholder="Type" type="text" name="type" value="<?php echo empty($_POST['type']) ? "" : $_POST['type'] ?>" /></td>
                    </tr>
                    <tr align="center">
                        <td class="warning" id="ec1"><span>Type is required</span></td>
                    </tr>
                    <tr align="center">
                        <td class="warning" id="ec2"><span>Type mustn't include number</span></td>
                    </tr>
                    <?php if ($_SERVER['REQUEST_METHOD'] == "POST" && check_type_cat($_POST['type'])): ?>
                    <tr align="center">
                        <td colspan="2" class="warning">
                            <?php
                            echo "Type already exists";
                            ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <tr align="center">
                        <td><input type="submit" value="Add" class="btnSubmit"></td>
                    </tr>
                </table>
            </div>
        </form>
        <br><br>
        <a class="btnIndex" href="index_category.php">
            <center><i class="fas fa-arrow-left"></i> BACK TO CATEGORY SITE</center>
        </a>
        <hr>
        <br><br>
    </div>
</body>
<script src="js/jqr_add_cat.js"></script>
</html>

<?php db_disconnect($db); ?>