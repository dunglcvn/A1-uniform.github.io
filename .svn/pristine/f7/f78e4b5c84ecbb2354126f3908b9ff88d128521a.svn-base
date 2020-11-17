<?php
require_once("lib/database_category.php");
require_once("lib/functions_category.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $result = delete_category($_SESSION['Type']);
    if ($result) {
        redirect_to("index_category.php");
    }
} else {
    if (!isset($_GET['Type'])) {
        redirect_to("index_category.php");
    }

    $cat = find_category_by_Type($_GET['Type']);
    $_SESSION['Type'] = $cat['Type'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete Category</title>
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
        <div class="registerForm">
            <table align="center">
                <tr align="center">
                    <td>
                        <h4>DELETE CATEGORY</h4>
                    </td>
                </tr>
                <tr align="left">
                    <td>
                        Type: <span><?php echo $cat['Type']; ?> </span>
                    </td>
                </tr>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="form">
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
    <a class="btnIndex" href="index_category.php">
        <center><i class="fas fa-arrow-left"></i> BACK TO CATEGORY SITE</center>
    </a>
    <hr>
    <br><br>
</body>
<script src="js/jqr_delete_cat.js"></script>

</html>