<?php
require_once("lib/database_admin.php");
require_once("lib/function.php");

$errors = [];

function isFormValidated()
{
    global $errors;

    return count($errors) == 0;
}

function checkForm()
{
    global $errors;
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        if (find_user_admin_by_username($username)) {
            $errors[] = "Username already exists";
        }

        if (find_user_admin_by_email($email)) {
            $errors[] = "Email already exists";
        }

        if (find_user_admin_by_phone($phone)) {
            $errors[] = "Phone Number already exists";
        }

        if (isFormValidated()) {
            $admin = [];
            $admin['username'] = $_POST['username'];
            $admin['password'] = $_POST['password'];
            $admin['email'] = $_POST['email'];
            $admin['phone'] = $_POST['phone'];

            $result = insert_admin($admin);
            if ($result) {
                redirect_to("index_admin.php");
            }
        }
    }
}

?>
<?php checkForm() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New Admin</title>
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
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id=form>
            <center>
                <div class="alert fade-in-top">
                    <span class="btnClose" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong class="fade-in-top">PLEASE REVIEW INFORMATION THAT YOU HAVE ENTERED</strong>
                </div>
            </center>
            <!-- <center>
                <div class="success fade-in-top">
                    <span class="btnClose" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong class="fade-in-top">REGISTRATION SUCCESSFUL, HAPPY SHOPPING!</strong>
                </div>
            </center> -->
            <div class="registerForm">
                <table align="center">
                    <tr align="center">
                        <td colspan="2">
                            <h4>ADD NEW ADMIN</h4>
                        </td>
                    </tr>
                    <tr align="center">
                        <td colspan="2">
                            <input class="ip1" id="username" placeholder="Username" type="text" name="username" value="<?php echo isFormValidated() ? '' : $_POST['username'];  ?>">
                        </td>
                    </tr>
                    <tr class="check-username" id="e1">
                        <td class="warning">
                            <span>Username is required</span>
                        </td>
                    </tr>
                    <?php if ($_SERVER['REQUEST_METHOD'] == "POST" && find_user_admin_by_username($_POST['username'])) :  ?>
                    <tr>
                        <td colspan="2" class="warning">
                            <?php
                            echo "Username already exists";
                            ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <tr align="center">
                        <td colspan="2">
                            <input class="ip1" id="pwd" placeholder="Password" type="password" name="password" value="<?php echo isFormValidated() ? '' : $_POST['password'];  ?>">
                        </td>
                    </tr>
                    <tr class="check-pwd" id="e7">
                        <td class="warning" colspan="2"><span>Password is required</span></td>
                    </tr>
                    <tr class="caps-lock-warning1">
                        <td>
                            <div class="warning">Caps Lock is on</div>
                        </td>
                    </tr>
                    <tr align="center">
                        <td colspan="2">
                            <input class="ip1" id="email" placeholder="Email" type="text" name="email" value="<?php echo isFormValidated() ? '' : $_POST['email'];  ?>">
                        </td>
                    </tr>
                    <tr class="check-email" id="e3">
                        <td class="warning"><span>Email is required</span></td>
                    </tr>
                    <?php if ($_SERVER['REQUEST_METHOD'] == "POST" && find_user_admin_by_email($_POST['email'])) : ?>
                    <tr>
                        <td colspan="2" class="warning">
                            <?php
                            echo "Email already exists";
                            ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <tr align="center">
                        <td colspan="2">
                            <input class="ip1" id="phone" placeholder="Phone Number" type="text" name="phone" value="<?php echo isFormValidated() ? '' : $_POST['phone'];  ?>">
                        </td>
                    </tr>
                    <tr class="check-phone" id="e4">
                        <td class="warning" colspan="2"><span>Phone Number is required</span></td>
                    </tr>
                    <tr class="check-phone" id="e5">
                        <td class="warning" colspan="2"><span>Phone Number must be numbers</span></td>
                    </tr>
                    <?php if ($_SERVER['REQUEST_METHOD'] == "POST" && find_user_admin_by_phone($_POST['phone'])) : ?>
                    <tr>
                        <td colspan="2" class="warning">
                            <?php
                            echo "Phone Number already exists";
                            ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <td colspan="2" style="color: blue">NOTE: Password is case sensitive</td>
                    </tr>
                    <tr align="center">
                        <td colspan="2">
                            <input type="submit" value="Add" class="btnSubmit">
                        </td>
                    </tr>
                </table>
            </div>
        </form>
        <br><br>
        <a class="btnIndex" href="index_admin.php">
            <center><i class="fas fa-arrow-left"></i> BACK TO ADMIN SITE</center>
        </a>
        <hr>
        <br>
        <br>
    </div>
</body>
<script src="js/jqr_add_admin.js"></script>
</html>

<?php db_disconnect($db); ?>