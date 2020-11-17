<?php require_once("lib/functions.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top position-fixed">
        <div class="container-fluid">
            <a class="navbar-branch" href="./index.php">
                <img src="./images/a1logo.png" height="50" class="logo">
            </a>

            <div>
                    <form class="mr-auto inline" action="search.php" method="GET">
                        <div>
                            <input class="inputFieldSearch" type="text" name="fieldSearch" value="<?php echo (isset($_GET['fieldSearch']) ? $_GET['fieldSearch'] : ""); ?>" aria-label="Search" placeholder="Search...">
                            <button class="btnSearch" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="./index.php"><i class="fas fa-store"></i> Store</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./about_us.php"><i class="fas fa-users"></i> About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./contact_us.php"><i class="fas fa-phone-square"></i> Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./faq.php"><i class="far fa-question-circle"></i> FAQs</a>
                    </li>

                    <li class="dropdown">
                        <?php if (isset($_SESSION['username'])) : ?>
                            <a href="" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="far fa-grin"></i> Hello: <?php echo $_SESSION['username']; ?><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="profile.php"><i class="fas fa-user-circle"></i> Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                                </li>
                            </ul>
                        <?php else : ?>
                            <a href="" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fas fa-user"></i> User<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="./login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./Register.php"><i class="fas fa-user-plus"></i> Register</a>
                                </li>
                            </ul>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</body>

</html>