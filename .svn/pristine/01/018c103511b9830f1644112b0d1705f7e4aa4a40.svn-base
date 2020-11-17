<?php 
    require_once("../admin_crud/lib/function.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header_admin</title>
</head>
<body>
  
        <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top position-fixed">
            <div class="container-fluid">
                <a class="navbar-branch" href="../../index.php">
                    <img src="../../images/a1logo.png" height="50" class="logo">
                </a>
                <div>

                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                    <span class="navbar-toggler-icon"> </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="../admin_crud/index_admin.php"><i class="fas fa-user-cog"></i> Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../member/index_member.php"><i class="fas fa-user"></i> Member</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Products/index_products.php"><i class="fas fa-tshirt"></i> Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../category/index_category.php"><i class="fas fa-grip-horizontal"></i> Category</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['admin_name'])): ?>
                        <li class="nav-item">
                            <a  class="nav-link">Hello: <?php echo $_SESSION['admin_name']; ?> <i class="fas fa-user-tie"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin_crud/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </li>
                        <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin_crud/login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
                        </li>
                    <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

</body>
</html>