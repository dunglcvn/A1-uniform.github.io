<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Site</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/admin_css.css">
    <link href="../../style/style.css" rel="stylesheet">
</head>

<body>
    <?php
    require_once("./lib/database_member.php");
    require_once("../layout_admin/header.php");

    if (!isset($_SESSION['admin_name'])) {
        header("Location:../admin_crud/login.php");
    }
    ?>
    <div class="container-fluid">
        <br><br>
        <center>
            <h2 class="text">MEMBER SITE</h2>
        </center>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Delete</th>
                </tr>
                <?php
                $members = select_all_member();
                $count = mysqli_num_rows($members);
                for ($i = 0; $i < $count; $i++) :
                    $member = mysqli_fetch_assoc($members);

                ?>
                    <tr>
                        <td><?php echo $member['memID'] ?></td>
                        <td><?php echo $member['Username'] ?></td>
                        <td><?php echo $member['Name'] ?></td>
                        <td><?php echo $member['Phone'] ?></td>
                        <td><?php echo $member['Email'] ?></td>
                        <td><?php echo $member['Address'] ?></td>
                        <td>
                            <a href=" <?php echo "delete_member.php?memID=" . $member['memID'] ?>">
                                <div class="btn btn-danger"><i class="fas fa-minus-square"></i></div>
                            </a>
                        </td>
                    </tr>
                <?php
                endfor;
                mysqli_free_result($members);
                ?>
            </table>
        </div>
        <br>
        <br>
    </div>
</body>

</html>

<?php db_disconnect($db); ?>