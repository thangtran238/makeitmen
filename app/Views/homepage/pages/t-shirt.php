<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Document</title>


<?php
include('/Schooling/IT/Enviroment/xampp/htdocs/project/makeitman/app/Views/homepage/assets/php/show_product.php');
include('/Schooling/IT/Enviroment/xampp/htdocs/project/makeitman/app/Views/homepage/LoginLogout/sigin.php');
include('/Schooling/IT/Enviroment/xampp/htdocs/project/makeitman/app/Views/homepage/LoginLogout/sigup.php');
include('/Schooling/IT/Enviroment/xampp/htdocs/project/makeitman/app/Views/homepage/assets/php/logout.php');
?>
<script>
  var fullName = "<?php if (isset($_SESSION['account'])) {
                    echo $_SESSION['account']['username'];
                  } ?>";
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../assets/style/overall.css">
<link rel="stylesheet" href="../assets/style/homepage/header.css" />
<link rel="stylesheet" href="../assets/style/homepage/content.css" />
<link rel="stylesheet" href="../assets/style/homepage/modal.css" />
<link rel="stylesheet" href="../assets/style/homepage/cart.css" />
<link rel="stylesheet" href="../assets/style/homepage/footer.css" />
</head>

<body>
  <div class="container">
    <div class="header">
      <div class="title">
        <h3><a href="#" onclick="location.reload();"><span class="sub-color">MAKEIT</span>Men.</a></h3>
      </div>
      <div class="search-bar">
        <form id="searchForm" action="/makeitman/app/Views/homepage/pages/php/t-shirt.php" method="post">
          <label for="searchInput">
            <input type="text" id="searchInput" name="searchInput" />
            <button type="submit">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
              </svg>
            </button>
          </label>
        </form>
      </div>

      <div class="search-results">
        <div id="resultsContainer">
         
        </div>
      </div>

      <div class="user-row" data-id="<?php if (isset($_SESSION['account'])) {
                                        echo $_SESSION['account']['accountID'];
                                      } ?>">
        <div class="button-row">
        </div>
      </div>
    </div>
    <div class="content">
      <div class="side-bar">
        <div class="tag">
          <ul>
            <li><a href="../homepage.php">All</a></li>
            <li class="active"><a href="./t-shirt.php"><span class="sub-color">#</span>T-shirt</a></li>
            <li><a href="./pants.php"><span class="sub-color">#</span>Pants</a></li>
            <li><a href="./sneakers.php"><span class="sub-color">#</span>Sneakers</a></li>
            <li><a href="./accessory.php"><span class="sub-color">#</span>Accessories</a></li>

          </ul>
        </div>
        <div class="detail">
          <ul>
            <li>Local store</li>
            <li>About us</li>
            <li>Feedback</li>
            <li>Premium User</li>
            <li>
              <span class="sub-color">makeit</span>men™ info@<span class="sub-color">makeit</span>men.co 101B Le Huu Trac Str, Phuoc My Dist
            </li>
          </ul>
        </div>
      </div>
      <div class="items">
        <div class="banner">
          <h2>The <span class="sub-color">Best Option</span> For Your Look!</h2>
          <small>At our store, we present the most comfortable, outshine products.</small>
          <small>Follow us on</small>
        </div>
        <div class="products">
          <div class="sub-title">
            <h2>T-Shirt</h2>
            <a href="../homepage.php">>></a>
          </div>

          <div class="page">

            <?php
            showPages("TS")
            ?>
          </div>

        </div>
      </div>
    </div>
    <div class="footer">
      <p>Thanks for choosing us, if you have any problems please contact us via 0-288-394-392 or info@<span class="sub-color">makeit</span>men.co.</p>
      <br>
      <small><span class="sub-color">makeit</span>men.™ since 2022 </small>
    </div>
  </div>

  <script src="./js/app.js"></script>
  <script src="./js/pages/t-shirt.js"></script>



</body>

</html>