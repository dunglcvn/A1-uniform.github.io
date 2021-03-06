<?php
require_once("lib/database_admin.php");
require_once("lib/function.php");

if(!isset($_SESSION['admin_name'])){
    redirect_to("./login.php");
}
$errors = [];

function isFormValidated(){

    global $errors;
    return count($errors) == 0;
}
function checkForm()
{
    global $errors;
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $id = $_POST['AdminID'];
        $password = sha1($_POST['cuPwd']);

        if(!check_password_admin_by_username($id,$password)){
            $errors[] ="Current Password is not correct" ;
        }

        if (select_email_edit_admin($_SESSION['email'], $_POST['email'])) {
            $errors[] = "Email already exists";
        }

        if (select_phone_edit_admin($_SESSION['phone'],$_POST['phone'])) {
            $errors[] = "Phone Number already exists";
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    checkForm();
    if (isFormValidated()) {
        $admin = [];
        $admin['AdminID'] = $_POST['AdminID'];
        $admin['Email'] = $_POST['email'];
        $admin['phone'] = $_POST['phone'];

        $result = update_admin($admin);

        if($result){
            redirect_to('index_admin.php');
        }
       
    }
} else {
    if (!isset($_GET['AdminID'])) {
        redirect_to("index_admin.php");
        exit;
    } else {
        $id = $_GET['AdminID'];
        $admin = find_admin_by_id($id);
        $_SESSION['id'] = $admin['AdminID'];
        $_SESSION['email'] = $admin['Email'];
        $_SESSION['phone'] = $admin['Phone Number'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Admin Information</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../style/login.css">
    <link href="../../style/style.css" rel="stylesheet">
</head>

<body class="bg_login">
    <br>
    <center><a href="../../index.php"><img src="../../images/a1logo.png" alt="" height="70"></a></center>
    <hr>
    <br>
    <div class="container-fluid">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="form">
        <center>
            <div class="alert fade-in-top">
                <span class="btnClose" onclick="this.parentElement.style.display='none';">&times;</span>
                <strong class="fade-in-top">PLEASE REVIEW INFORMATION THAT YOU HAVE ENTERED</strong>
            </div>
        </center>
        <div class="registerForm">
        <table align="center">
            <tr>
                <td colspan="2" align="center"><input type="hidden" name="AdminID" value="<?php echo isFormValidated() ? $admin['AdminID'] : $_POST['AdminID']  ?>"></td>
            </tr>
            <tr align="center">
                <td colspan="2" align="center">
                    <h4>CHANGE INFORMATION</h4>
                </td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <label for="cuPwd">Current Password</label>
                    <input class="ip4" id="cuPwd" type="password" name="cuPwd" value="<?php echo isFormValidated() ? "" : $_POST['cuPwd']; ?>">
                </td>
            </tr>
            <tr class="check-cuPwd" id="ea1">
                <td class="warning" colspan="2">
                    <span>Current Password is required</span>
                </td>
            </tr>
            <tr class="caps-lock-warning1">
                <td colspan="2">
                    <div class="warning">Caps Lock is on</div>
                </td>
            </tr>
            <?php if ($_SERVER['REQUEST_METHOD'] == "POST" && !check_password_admin_by_username($_POST['AdminID'],sha1($_POST['cuPwd']))) : ?>
                <tr>
                    <td colspan="2" class="warning">
                        <?php
                        echo "Current Password is not correct";
                        ?>
                    </td>
                </tr>
            <?php endif; ?>
            <tr align="center">
                <td><label for="email" id="lb">Email</label></td>
                <td>
                    &nbsp;<input class="ip4" id="email" type="text" name="email" value="<?php echo isFormValidated() ? $admin['Email'] : $_POST['email'];  ?>">
                </td>
            </tr>
            <tr class="check-email" id="e3">
                <td class="warning"><span>Email is required</span></td>
            </tr>
            <?php if ($_SERVER['REQUEST_METHOD'] == "POST") : ?>
                <?php if (select_email_edit_admin($_SESSION['email'], $_POST['email'])): ?>
                    <tr>
                        <td colspan="2" class="warning">
                            <?php
                            echo "Email already exists";
                            ?>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endif; ?>
            <tr align="center">
                <td><label for="phone">Phone Number</label></td>
                <td>
                    &nbsp;<input class="ip4" id="phone" type="text" name="phone" value="<?php echo isFormValidated() ? $admin['Phone Number'] : $_POST['phone'];  ?>">
                </td>
            </tr>
            <tr class="check-phone" id="e4">
                <td class="warning" colspan="2"><span>Phone Number is required</span></td>
            </tr>
            <tr class="check-phone" id="e5">
                <td class="warning" colspan="2"><span>Phone Number must be numbers</span></td>
            </tr>
            <?php if ($_SERVER['REQUEST_METHOD'] == "POST") : ?>
                <?php if (select_phone_edit_admin($_SESSION['phone'], $_POST['phone'])): ?>
                    <tr>
                        <td colspan="2" class="warning">
                            <?php
                            echo "Phone Number already exists";
                            ?>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endif; ?>
            <tr align="center">
                <td colspan="2"><input type="submit" value="Submit" class="btnSubmit"></td>
            </tr>
        </table>
        </div>
    </form>
    <br><br>
    <a class="btnIndex" href="index_admin.php"><center><i class="fas fa-arrow-left"></i> BACK TO ADMIN SITE</center></a>
    <hr>

    <br>
    <br>
    </div>
</body>
<script src="js/jqr_edit_admin.js"></script>
</html>
<?php
db_disconnect($db);

?>