<?php
require_once("lib/database.php");
require_once("lib/functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>A1Uniforms-US-MD</title>
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
<?php require_once __DIR__ . "/layouts/header.php"; ?>

<body>

  <!-- Carousel-->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="img-responsive" src="./images/img9.jpg" alt="First slide">
        <div class="carousel-caption">
          <!-- <h1 class="display-4">WELCOME TO OUR WEBSITE</h1> -->
        </div>
      </div>
      <div class="carousel-item">
        <img class="img-responsive" src="./images/img6.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="img-responsive" src="./images/img10.jpg" alt="Third slide">
      </div>
      <div class="carousel-item">
        <img class="img-responsive" src="./images/img8.jpg" alt="Fourth slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div class="jumbotron text-center">
    <h1>SERVICE YOU WITH OUR BEST</h1>
    <p>This website was designed to sell high quality uniform</p>
  </div>
  <div class="row-padding">

    <form action="search.php" method="get">
      <nav class="navbar navbar-inverse">

        <?php
        $categories = select_all_catalog();
        $count = mysqli_num_rows($categories);
        for ($i = 1; $i <= $count; $i++) :
          $category = mysqli_fetch_assoc($categories); ?>
          <div class="col-md-2 col-sm-4 col-6">
            <button class="dropbtn" type="submit" name="btnType" value="<?php echo  $category['Type']; ?>"><?php echo $category['Type']; ?></button>
          </div>
        <?php endfor; ?>
      </nav>
    </form>

  </div>
  <div class="container-fluid">
    <div class="float-right ">
      <i class="fas fa-sort"></i>
      <select name="sort" id="sort">
        <option value="0" disabled selected hidden>Sort By</option>
        <option value="ASC">Price Ascending</option>
        <option value="DES">Price Descending</option>
      </select>

    </div>
  </div>

<br><br>
  <div class="container">
    <div class="row" id="listProduct">
      <?php
      $products = select_all_product();
      $a =  mysqli_num_rows($products);
      ?>

      <?php for ($i = 1; $i <= $a; $i++) :
        $product = mysqli_fetch_assoc($products); ?>

        <div class="col-md-3 col-sm-4 col-6 product hover-zoomin">
          <a href="<?php echo "chi-tiet-san-pham.php?ProductID=" . $product['ProductID']; ?>" title="<?php echo $product['Name']; ?>">
            <img class="img-responsive" id="product_image" src="<?php echo $product["Image"] ?>" width="100%">
          </a>
          <a href="<?php echo "chi-tiet-san-pham.php?ProductID=" . $product['ProductID']; ?>" title="<?php echo $product['Name']; ?>">
            <center>
              <div class="info">
                <p class="wrap"><?php echo "Name: " . $product['Name'] ?></p>
                <p class="wrap"><?php echo "Color: " . $product['Color'] ?></p>
                <p class="wrap"><?php echo "Price: " . $product['Price'] . " ₫" ?></p>
                <hr>
              </div>
            </center>
          </a>
        </div>
      <?php endfor; ?>
    </div>
    <div class="row hidden" id="listProduct1">
      <?php
      $products = sort_product_by_price_asc();
      $a =  mysqli_num_rows($products);
      ?>

      <?php for ($i = 1; $i <= $a; $i++) :
        $product = mysqli_fetch_assoc($products); ?>

        <div class="col-md-3 col-sm-4 col-6 product hover-zoomin">
          <a href="<?php echo "chi-tiet-san-pham.php?ProductID=" . $product['ProductID']; ?>" title="<?php echo $product['Name']; ?>">
            <img class="img-responsive" id="product_image" src="<?php echo $product["Image"] ?>" width="100%">
          </a>
          <a href="<?php echo "chi-tiet-san-pham.php?ProductID=" . $product['ProductID']; ?>">
            <center>
              <div class="info">
                <p><?php echo "Name: " . $product['Name'] ?></p>
                <p><?php echo "Color: " . $product['Color'] ?></p>
                <p><?php echo "Price: " . $product['Price'] . " ₫" ?></p>
                <hr>
              </div>
            </center>
          </a>
        </div>
      <?php endfor; ?>
    </div>
    <div class="row hidden" id="listProduct2">
      <?php
      $products = sort_product_by_price_des();
      $a =  mysqli_num_rows($products);
      ?>

      <?php for ($i = 1; $i <= $a; $i++) :
        $product = mysqli_fetch_assoc($products); ?>

        <div class="col-md-3 col-sm-4 col-6 product hover-zoomin">
          <a href="<?php echo "chi-tiet-san-pham.php?ProductID=" . $product['ProductID']; ?>" title="<?php echo $product['Name']; ?>">
            <img class="img-responsive" id="product_image" src="<?php echo $product["Image"] ?>" width="100%">
          </a>
          <a href="<?php echo "chi-tiet-san-pham.php?ProductID=" . $product['ProductID']; ?>">
            <center>
              <div class="info">
                <p><?php echo "Name: " . $product['Name'] ?></p>
                <p><?php echo "Color: " . $product['Color'] ?></p>
                <p><?php echo "Price: " . $product['Price'] . " ₫" ?></p>
                <hr>
              </div>
            </center>
          </a>
        </div>
      <?php endfor; ?>
    </div>


  </div>

  <div class="container-fluid padding">
    <div class="row padding">
      <div class="col-md-12 col-lg-6">
        <h2>In here we sell...</h2>
        <p>
          Many models lack designs, designs and high quality all over the world</p>
        <p>
          Here we design, sell uniform products with high quality and good price, constantly updating modern fashion trends.</p>
        <br><hr>
        <center><img src="images/a1logo.png" alt=""></center>
        <hr><br>
      </div>
      <div class="col-lg-6">
        <img src="./images/high_quality.jpg" class="img-fluid">
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-4">
        <h3>WE CARE</h3>
        <p>
          Understand and understand customers' needs</p>
        <p>Discount 10% for customers with goods from $ 200 or more next time</p>
      </div>
      <div class="col-sm-4">
        <h3>WE FAST</h3>
        <p>
          Your email will be answered as soon as possible</p>
        <p>24/7 quick delivery service will make you satisfied, do not waste time thereby giving you a better experience......</p>
      </div>
      <div class="col-sm-4">
        <h3>WE RESPONSIBILITY</h3>
        <p>100% free for repair services where the manufacturer's fault for genuine products...</p>
        <p>Up to 111% refund if customers discover our products are fake or of poor quality</p>

      </div>
    </div>
  </div>


  <?php require_once __DIR__ . "/layouts/footer.php"; ?>
</body>
<script src="js/jqr_index.js"></script>

</html>


<?php db_disconnect($db); ?>