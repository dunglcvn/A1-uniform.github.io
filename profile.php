<?php
require_once("lib/database.php");
require_once("lib/functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $member = [];
    $member['name'] = $_POST['name'];
    $member['phone'] = $_POST['phone'];
    $member['email'] = $_POST['email'];
    $member['address'] = $_POST['address'];
    $member['memID'] = $_POST['memID'];

    $result = update_member($member);

    if ($result) {
        redirect_to("profile.php");
    }
} else {
    if (!isset($_SESSION['username'])) {
        redirect_to("login.php");
    }

    $member = find_member_by_username($_SESSION['username']);
    // $_SESSION['member'] = $member;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
    <link href="./style/style.css" rel="stylesheet">
    <link rel="stylesheet" href="style/profile.css">
</head>
<?php
require_once __DIR__ . "/layouts/header.php";
?>

<body>
    <div class="container">
        <center>
            <div class="alert fade-in-top">
                <span class="btnClose" onclick="this.parentElement.style.display='none';">&times;</span>
                <strong class="fade-in-top">PLEASE REVIEW INFORMATION THAT YOU HAVE ENTERED</strong>
            </div>
        </center>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <ul class="nav nav-tabs responsive">
                    <li class="active t1"><a data-toggle="tab" href="#information">
                            <h3><i class="fas fa-user"></i> INFORMATION</h3>
                        </a></li>
                    <li class="t1"><a href="#updateInfo" data-toggle="tab">
                            <h3><i class="fas fa-user-edit"></i> UPDATE INFORMATION</h3>
                        </a></li>
                </ul>
            </div>
            <div class="col-md-2"></div>
        </div>

        <div class="tab-content">
            <div id="information1" class="tab-pane active">
                <br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        <center>
                            <img src="https://tse1.mm.bing.net/th?id=OIP._6EptiPHwKSBNhsNH1LcbQAAAA&pid=Api&P=0&w=300&h=300" alt="">
                        </center>
                    </div>
                    <div class="col-md-8">
                        <center>
                            <span>
                                Name: <?php echo $member['Name']; ?>
                            </span>
                            <br><br>
                            <span>
                                Username: <?php echo $member['Username']; ?>
                            </span>
                            <br><br>
                            <span>
                                Email: <?php echo $member['Email']; ?>
                            </span>
                            <br><br>
                            <span>
                                Phone Number: <?php echo $member['Phone']; ?>
                            </span>
                            <br><br>
                            <span>
                                Address: <?php echo $member['Address']; ?>
                            </span>
                        </center>
                    </div>
                </div>

                <br>
            </div>
            <div id="information" class="tab-pane fade">
                <br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        <center>
                            <img src="https://tse1.mm.bing.net/th?id=OIP._6EptiPHwKSBNhsNH1LcbQAAAA&pid=Api&P=0&w=300&h=300" alt="">
                        </center>
                    </div>
                    <div class="col-md-8">
                        <center>
                            <span>
                                Name: <?php echo $member['Name']; ?>
                            </span>
                            <br><br>
                            <span>
                                Username: <?php echo $member['Username']; ?>
                            </span>
                            <br><br>
                            <span>
                                Email: <?php echo $member['Email']; ?>
                            </span>
                            <br><br>
                            <span>
                                Phone Number: <?php echo $member['Phone']; ?>
                            </span>
                            <br><br>
                            <span>
                                Address: <?php echo $member['Address']; ?>
                            </span>
                        </center>
                    </div>
                </div>
                <br>
            </div>
            <div id="updateInfo" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="form1">
                            <br>
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $member['Name']; ?>">
                            </div>
                            <div class="warning" id="em1">
                                <p>Name is required</p>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $member['Phone']; ?>">
                            </div>
                            <div class="warning" id="em2">
                                <p>Phone Number is required</p>
                            </div>
                            <div class="warning" id="em3">
                                <p>Phone Number must be number</p>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $member['Email']; ?>">
                            </div>
                            <div class="warning" id="em4">
                                <p>Email is required</p>
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" id="address" name="address" value="<?php echo $member['Address']; ?>">
                                <input type="hidden" name="memID" value="<?php echo $member['memID']; ?>">
                            </div>
                            <div class="warning" id="em5">
                                <p>Address is required</p>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <input type="reset" class="btn btn-info" value="Reset">
                        </form>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <a class="btnIndex" href="index.php"><center><i class="fas fa-arrow-left"></i> BACK TO HOME SITE</center></a>
    <br><br>
</body>
<?php require_once __DIR__ . "/layouts/footer.php"; ?>
<script src="js/jqr_profile.js"></script>

</html>

<?php db_disconnect($db); ?>