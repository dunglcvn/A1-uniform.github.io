<?php
require_once("./lib/database_admin.php");
require_once("./lib/function.php");

$errors = [];
function  isFormValidated()
{
    global $errors;
    return count($errors) == 0;
}


function checkForm()
{
    global $errors;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $admin_name = $_POST['user_name'];
        $password = sha1($_POST['password']);

        if (empty($_POST['user_name'])) {
            $errors[] = "Username is required";
        }

        if (empty($_POST['password'])) {
            $errors[] = "Password is required";
        }

        if (!check_admin($admin_name, $password)) {
            $errors[] = "Username or Password is incorrect";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="../../style/login.css" rel="stylesheet">
</head>

<body class="bg_login">
    <?php checkForm(); ?>
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
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="form">
            <div class="registerForm">
                <table align="center">
                    <tr>
                        <td colspan="2">
                            <h4>REGISTERED ADMIN</h4>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <span>Welcome, Please sign in!</span>
                        </td>
                    </tr>
                    <tr>
                        <td><input placeholder="Username" id="username" class="ip" type="text" name="user_name" value="<?php echo isFormValidated() ? "" : $_POST['user_name'] ?>"></td>
                    </tr>
                    <tr align="center">
                        <td class="warning" id="e6"><span>Username is required</span></td>
                    </tr>
                    <tr>
                        <td><input placeholder="Password" id="pwd" class="ip" type="password" name="password" value="<?php echo isFormValidated() ? "" : $_POST['password'] ?>"></td>
                    </tr>
                    <tr align="center">
                        <td class="warning" id="e7"><span>Password is required</span></td>
                    </tr>
                    <?php if ($_SERVER['REQUEST_METHOD'] == "POST" && !check_admin($_POST['user_name'], $_POST['password'])) : ?>
                         <tr align="center">
                             <td colspan="2" class="warning">
                                <?php
                                    echo "Username or Password is incorrect";
                                ?>
                             </td>
                         </tr>
                     <?php endif; ?>
                    <tr>
                        <td><input type="submit" name="submit" class="btnLogin" value="Sign In"></td>
                    </tr>
                </table>
            </div>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isFormValidated()) {
            // session
            $username = $_POST['user_name'];
            $_SESSION['admin_name'] = $username;
            redirect_to("index_admin.php");
        }
        ?>
    </div>
    <br><br>
    <a class="btnIndex" href="index_admin.php">
    <center><i class="fas fa-arrow-left"></i> BACK TO ADMIN SITE</center> </a> 
    <hr>
    <br><br>
</body>
<script src="js/jqr_login_admin.js"></script>
</html>

<?php db_disconnect($db); ?>