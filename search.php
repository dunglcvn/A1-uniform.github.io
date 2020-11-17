<?php
require_once("lib/database.php");
require_once("lib/functions.php");
$keyword = isset($_GET['fieldSearch']) ? $_GET['fieldSearch'] : "";
$type =  isset($_GET['btnType']) ? $_GET['btnType'] : "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="./style/style.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
    <style>
        .nav {
            display: unset;
        }
    </style>
</head>

<body>
    <?php require_once __DIR__ . "/layouts/header.php"; ?>
    <form action="search.php" method="get">
        <nav class="navbar navbar-inverse">

            <?php
            $categories = select_all_catalog();
            $count = mysqli_num_rows($categories);
            for ($i = 1; $i <= $count; $i++) :
                $category = mysqli_fetch_assoc($categories); ?>

                <button class="dropbtn" type="submit" name="btnType" value="<?php echo  $category['Type']; ?>"><?php echo $category['Type']; ?></button>

            <?php endfor; ?>
        </nav>
    </form>
    <br>
    <div class="container-fluid">
        <h3 class="title-main">
            <p class="text-info">Search Result</p>
        </h3>
        <div class="float-right ">
            <i class="fas fa-sort"></i>
            <select name="sort" id="sort">
                <option value="0" disabled selected hidden>Sort By</option>
                <option value="ASC">Price Ascending</option>
                <option value="DES">Price Descending</option>
            </select>

        </div>
    </div>
    <br>
    <div class="container">

        <div class="row padding" id="listProduct">
            <?php if (isset($_GET['btnType'])) : ?>
                <?php
                $products = select_product_by_type($type);
                $count =  mysqli_num_rows($products);   ?>
                <?php if ($count == 0) : ?>
                    <p>No result found</p>
                <?php else : ?>

                    <?php for ($i = 1; $i <= $count; $i++) :

                        $product = mysqli_fetch_assoc($products); ?>

                        <div class="col-md-3 col-sm-4 col-6 product hover-zoomin">
                            <a href="<?php echo "chi-tiet-san-pham.php?ProductID= " . $product['ProductID']; ?> " title="<?php echo $product['Name']; ?>">
                                <img class="img" src="<?php echo $product["Image"] ?>" width="100%">
                            </a>
                            <center>
                                <a class="info" title="<?php echo $product['Name']; ?>">
                                    <p class="wrap"><?php echo "Name: " . $product['Name'] ?></p>
                                    <p class="wrap"><?php echo "Color: " . $product['Color'] ?></p>
                                    <p class="wrap"><?php echo "Price: " . $product['Price'] . " ₫" ?></p>
                                </a>
                            </center>
                        </div>


                    <?php endfor; ?>
                <?php endif; ?>
            <?php else : ?>
                <?php if (!empty($keyword)) :
                    $products = find_product_by_name($keyword);
                    $count =  mysqli_num_rows($products); ?>
                    <?php if ($count == 0) : ?>
                        <p>No result found</p>
                    <?php else : ?>
                        <?php for ($i = 1; $i <= $count; $i++) :
                            $product = mysqli_fetch_assoc($products); ?>
                            <div class="col-md-3 col-sm-4 col-6 product hover-zoomin">
                                <a href="<?php echo "chi-tiet-san-pham.php?ProductID= " . $product['ProductID']; ?> " title="<?php echo $product['Name']; ?>">
                                    <img class="img" src="<?php echo $product["Image"] ?>" width="100%">
                                </a>
                                </>
                                <center>
                                    <a class="info" title="<?php echo $product['Name']; ?>">
                                        <p class="wrap"><?php echo "Name: " . $product['Name'] ?></p>
                                        <p class="wrap"><?php echo "Color: " . $product['Color'] ?></p>
                                        <p class="wrap"><?php echo "Price: " . $product['Price'] . " ₫" ?></p>
                                    </a>
                                </center>
                            </div>

                        <?php endfor; ?>
                    <?php endif; ?>
                <?php else : ?>
                    <p>Keyword is empty</p>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="row padding hidden" id="listProduct1">
            <?php if (isset($_GET['btnType'])) : ?>
                <?php
                $products = sort_search_product_by_price_asc($type);
                $count =  mysqli_num_rows($products);   ?>
                <?php if ($count == 0) : ?>
                    <p>No result found</p>
                <?php else : ?>

                    <?php for ($i = 1; $i <= $count; $i++) :

                        $product = mysqli_fetch_assoc($products); ?>

                        <div class="col-md-3 col-sm-4 col-6 product hover-zoomin">
                            <a href="<?php echo "chi-tiet-san-pham.php?ProductID= " . $product['ProductID']; ?> " title="<?php echo $product['Name']; ?>">
                                <img class="img" src="<?php echo $product["Image"] ?>" width="100%">
                            </a>
                            <center>
                                <a class="info" title="<?php echo $product['Name']; ?>">
                                    <p class="wrap"><?php echo "Name: " . $product['Name'] ?></p>
                                    <p class="wrap"><?php echo "Color: " . $product['Color'] ?></p>
                                    <p class="wrap"><?php echo "Price: " . $product['Price'] . " ₫" ?></p>
                                </a>
                            </center>
                        </div>


                    <?php endfor; ?>
                <?php endif; ?>
            <?php else : ?>
                <?php if (!empty($keyword)) :
                    $products = sort_search_product_name_by_price_asc($keyword);
                    $count =  mysqli_num_rows($products); ?>
                    <?php if ($count == 0) : ?>
                        <p>No result found</p>
                    <?php else : ?>
                        <?php for ($i = 1; $i <= $count; $i++) :
                            $product = mysqli_fetch_assoc($products); ?>
                            <div class="col-md-3 col-sm-4 col-6 product hover-zoomin">
                                <a href="<?php echo "chi-tiet-san-pham.php?ProductID= " . $product['ProductID']; ?> " title="<?php echo $product['Name']; ?>">
                                    <img class="img" src="<?php echo $product["Image"] ?>" width="100%">
                                </a>
                                </>
                                <center>
                                    <a class="info" title="<?php echo $product['Name']; ?>">
                                        <p class="wrap"><?php echo "Name: " . $product['Name'] ?></p>
                                        <p class="wrap"><?php echo "Color: " . $product['Color'] ?></p>
                                        <p class="wrap"><?php echo "Price: " . $product['Price'] . " ₫" ?></p>
                                    </a>
                                </center>
                            </div>

                        <?php endfor; ?>
                    <?php endif; ?>
                <?php else : ?>
                    <p>Keyword is empty</p>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="row padding hidden" id="listProduct2">
            <?php if (isset($_GET['btnType'])) : ?>
                <?php
                $products = sort_search_product_by_price_des($type);
                $count =  mysqli_num_rows($products);   ?>
                <?php if ($count == 0) : ?>
                    <p>No result found</p>
                <?php else : ?>

                    <?php for ($i = 1; $i <= $count; $i++) :

                        $product = mysqli_fetch_assoc($products); ?>

                        <div class="col-md-3 col-sm-4 col-6 product hover-zoomin">
                            <a href="<?php echo "chi-tiet-san-pham.php?ProductID= " . $product['ProductID']; ?> " title="<?php echo $product['Name']; ?>">
                                <img class="img" src="<?php echo $product["Image"] ?>" width="100%">
                            </a>
                            <center>
                                <a class="info" title="<?php echo $product['Name']; ?>">
                                    <p class="wrap"><?php echo "Name: " . $product['Name'] ?></p>
                                    <p class="wrap"><?php echo "Color: " . $product['Color'] ?></p>
                                    <p class="wrap"><?php echo "Price: " . $product['Price'] . " ₫" ?></p>
                                </a>
                            </center>
                        </div>


                    <?php endfor; ?>
                <?php endif; ?>
            <?php else : ?>
                <?php if (!empty($keyword)) :
                    $products = sort_search_product_name_by_price_des($keyword);
                    $count =  mysqli_num_rows($products); ?>
                    <?php if ($count == 0) : ?>
                        <p>No result found</p>
                    <?php else : ?>
                        <?php for ($i = 1; $i <= $count; $i++) :
                            $product = mysqli_fetch_assoc($products); ?>
                            <div class="col-md-3 col-sm-4 col-6 product hover-zoomin">
                                <a href="<?php echo "chi-tiet-san-pham.php?ProductID= " . $product['ProductID']; ?> " title="<?php echo $product['Name']; ?>">
                                    <img class="img" src="<?php echo $product["Image"] ?>" width="100%">
                                </a>
                                </>
                                <center>
                                    <a class="info" title="<?php echo $product['Name']; ?>">
                                        <p class="wrap"><?php echo "Name: " . $product['Name'] ?></p>
                                        <p class="wrap"><?php echo "Color: " . $product['Color'] ?></p>
                                        <p class="wrap"><?php echo "Price: " . $product['Price'] . " ₫" ?></p>
                                    </a>
                                </center>
                            </div>

                        <?php endfor; ?>
                    <?php endif; ?>
                <?php else : ?>
                    <p>Keyword is empty</p>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

    <?php require_once __DIR__ . "/layouts/footer.php"; ?>
    <script src="js/jqr_search.js"></script>
</body>

</html>

<?php db_disconnect($db); ?>