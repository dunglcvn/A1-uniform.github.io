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
            $user_name = $_POST['username'];
            $password = sha1($_POST['password']);

            if (empty($_POST['username'])) {
                $errors[] = "Username is required";
            }
            if (empty($_POST['password'])) {
                $errors[] = "Password is required";
            }
            if (!check_member($user_name, $password)) {
                $errors[] = "Username or Password is incorrect";
            }
        }
    }

    ?>
 <?php checkForm() ?>
 <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isFormValidated()) {
        // session
        $username = $_POST['username'];
        $_SESSION['username'] = $username;
        redirect_to("index.php");
    }
    ?>



 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Sign in</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
     <link href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
     </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
     </script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
     <link href="./style/login.css" rel="stylesheet">
     <link href="./style/style.css" rel="stylesheet">
     <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
 </head>

 <body class="bg_login">
     <center><a href="index.php"><img src="images/a1logo.png" alt="" height="70"></a></center>
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
                         <td colspan="2" algin="center">
                             <h4>REGISTERED CUSTOMER</h4>
                         </td>
                     </tr>
                     <tr>
                         <td><span>Welcome, Please sign in!</span></td>
                     </tr>
                     <tr>
                         <td><input placeholder="Username" id="username" class="ip" type="text" name="username" class="form-control" value="<?php echo isFormValidated() ? "" : $_POST['username'] ?>"></td>
                     </tr>
                     <tr align="center">
                         <td class="warning" id="e6"><span>Username is required</span></td>
                     </tr>
                     <tr>
                         <td><input placeholder="Password" id="pwd" class="ip" class="form-control" type="password" name="password" value="<?php echo isFormValidated() ? "" : $_POST["password"] ?>"></td>
                     </tr>
                     <tr align="center">
                         <td class="warning" id="e7"><span>Password is required</span></td>
                     </tr>
                     <?php if ($_SERVER['REQUEST_METHOD'] == "POST" && !check_member($_POST['username'], $_POST['password'])) : ?>
                         <tr align="center">
                             <td colspan="2" class="warning">
                                 <?php
                                    echo "Username or Password is incorrect";
                                    ?>
                             </td>
                         </tr>
                     <?php endif; ?>
                     <tr>
                         <td><input class="btnLogin" type="submit" name="submit" value="Sign In"></td>
                     </tr>
                     <tr>
                         <td></td>
                     </tr>
                     <tr>
                         <td></td>
                     </tr>
                     <tr>
                         <td colspan="2"><strong>Are you not a member yet ? </strong> <a href="./Register.php" id="reg-log">Register now</a></td>
                     </tr>
                 </table>
             </div>


         </form>
     </div>
     <br>
     <a class="btnIndex" href="index.php">
         <center><i class="fas fa-arrow-left"></i> BACK TO STORE</center>
     </a>
     <hr>
     </div>
     <br><br>
     <?php require_once __DIR__ . "/layouts/footer.php"; ?>


 </body>
 <script src="js/jqr_login.js"></script>

 </html>

 <?php db_disconnect($db); ?>