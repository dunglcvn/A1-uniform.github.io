<?php
require_once("lib/database.php");
require_once("lib/functions.php");
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

        $username = $_POST['username'];
        $email = $_POST['email'];

        if (check_email($email)) {
            $errors[] = "Email already exists";
        }

        if (check_username($username)) {
            $errors[] = "Username already exists";
        }

        // if(empty($_POST['repassword'])){
        //     $errors[]= "Confirm password is required";
        // }

        if (isFormValidated()) {
            $member = [];
            $_POST['password'] = strtolower($_POST['password']);
            $password_hash = sha1($_POST['password']);
            $member['username'] = $_POST['username'];
            $member['password'] = $password_hash;
            $name = $_POST['fname'] . " " . $_POST['lname'];
            $member['name'] = $name;
            $member['phone'] = $_POST['phone'];
            $member['email'] = $_POST['email'];
            $member['address'] = $_POST['address'];

            $result = insert_member($member);

            if ($result) {
                redirect_to("index.php");
            }
        }
    }
}
?>
<?php checkForm(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <link href="./style/style.css" rel="stylesheet">
    <link href="./style/login.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
</head>

<body class="bg_login">
    <center><a href="index.php"><img src="images/a1logo.png" alt="" height="70"></a></center>
    <hr>
    <br><br>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="form">
        <center>
            <div class="alert fade-in-top">
                <span class="btnClose" onclick="this.parentElement.style.display='none';">&times;</span>
                <strong class="fade-in-top">PLEASE REVIEW INFORMATION THAT YOU HAVE ENTERED</strong>
            </div>
        </center>
        <div class="registerForm">
            <h3 class="reg-title">NEW CUSTOMER</h3>
            <br>
            <p>Registering makes your shopping experience better.</p>
            <table align="center">
                <tr>
                    <td>
                        <input class="fname" type="text" placeholder="First Name" name="fname" value="<?php echo isFormValidated() ? "" : $_POST['fname'] ?>">
                    </td>
                    <td>
                        <input class="lname" type="text" placeholder="Last Name" name="lname" value="<?php echo isFormValidated() ? "" : $_POST['lname'] ?>">
                    </td>
                </tr>
                <tr class="check-fname" id="e1">
                    <td class="warning">
                        <center><span>First Name is required</span></center>
                    </td>
                </tr>
                <tr class="check-lname" id="e2">
                    <td class="warning">
                        <center><span>Last Name is required</span></center>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input class="ip" id="email" type="text" placeholder="Email" name="email" value="<?php echo isFormValidated() ? "" : $_POST['email'] ?>">
                    </td>
                </tr>
                <tr class="check-email" id="e3">
                    <td class="warning"><span>Email is required</span></td>
                </tr>
                <?php if ($_SERVER['REQUEST_METHOD'] == "POST" && check_email($_POST['email'])) : ?>
                    <tr>
                        <td colspan="2" class="warning">
                            <?php
                            echo "Email already exists";
                            ?>
                        </td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td colspan="2">
                        <input class="ip" id="phone" type="text" placeholder="Phone Number" name="phone" value="<?php echo isFormValidated() ? "" : $_POST['phone'] ?>">
                    </td>
                </tr>
                <tr class="check-phone" id="e4">
                    <td class="warning" colspan="2"><span>Phone Number is required</span></td>
                </tr>
                <tr class="check-phone" id="e5">
                    <td class="warning" colspan="2"><span>Phone Number must be numbers</span></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input class="ip" id="username" type="text" placeholder="Username" name="username" value="<?php echo isFormValidated() ? "" : $_POST['username'] ?>">
                    </td>
                </tr>
                <tr class="check-username" id="e6">
                    <td class="warning" colspan="2"><span>Username is required</span></td>
                </tr>
                <?php if ($_SERVER['REQUEST_METHOD'] == "POST" && check_username($_POST['username'])) :  ?>
                    <tr>
                        <td colspan="2" class="warning">
                            <?php
                            echo "Username already exists";
                            ?>
                        </td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <div class="hidden" id="popover-body">
                        <div class="popover-pwd-strength">
                            &nbsp;
                        </div>
                        For Strong Password: 1 Uppercase, 1 Lowercase Alphabets, 1 Number and 1 Special Character with no spaces. For ideal password Minimum 5 Characters.
                    </div>
                    <td colspan="2">
                        <input class="ip" id="pwd" type="password" placeholder="Password" name="password" value="<?php echo isFormValidated() ? "" : $_POST['password'] ?>" popover="Popover" data-content="" data-toggle="popover" data-title="Password Strength : " data-placement="left" data-trigger="focus">
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
                <tr>
                    <td colspan="2">
                        <input class="ip" id="pwd-confirm" type="password" placeholder="Confirm Password" name="repassword" value="<?php echo isFormValidated() ? "" : $_POST['repassword'] ?>">
                    </td>
                </tr>
                <!-- <tr class="check-pwd" id="e8">
                    <td class="warning" colspan="2"><span>Confirm Password is required</span></td>
                </tr> -->
                <tr class="caps-lock-warning2">
                    <td colspan="2">
                        <div class="warning">Caps Lock is on</div>
                    </td>
                </tr>
                <tr class="check-confirm-pwd">
                    <td class="warning" colspan="2"><span>The new password and confirmation password do not match</span></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="text" class="ip" id="address" placeholder="Address" name="address" value="<?php echo isFormValidated() ? "" : $_POST['address'] ?>">
                    </td>
                </tr>
                <tr class="check-address" id="e9">
                    <td class="warning" colspan="2"><span>Address is required</span></td>
                </tr>
                <tr>
                    <td colspan="2" style="color: blue">NOTE: Password is case sensitive</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Sign up" class="btnLogin">
                    </td>
                </tr>
            </table>
            <hr>
            <center><span>Already have an account?<a href="Login.php" id="reg-log"> Sign-in </a></span></center>
        </div>
    </form>
    <br><br>
    <a class="btnIndex" href="index.php">
        <center>
            <i class="fas fa-arrow-left"></i> BACK TO STORE</center>
    </a>
    <hr>
    <br><br>
    <?php require_once("layouts/footer.php"); ?>
</body>
<script src="js/jqr.js"></script>

</html>

<?php db_disconnect($db); ?>