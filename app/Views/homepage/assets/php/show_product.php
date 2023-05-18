<?php

function showPages($pages)
{
  include('/Schooling/IT/Enviroment/xampp/htdocs/project/makeitman/app/Models/database.php');
  $sql = "SELECT * FROM `product` where `categoryID` = '$pages'";
  $res = $conn->query($sql);
  while ($row = $res->fetch_assoc()) {
    if ($row['qty'] < 1) { ?>
      <form class="disabled" action="/project/makeitman/app/Views/homepage/cart/add.php?productID=<?php echo urlencode(trim($row['productID'])); ?>" method="post">
        <div class="product">
          <div class="reaction-icon">
            <button>^^</button>
            <button>^^</button>
          </div>
          <img src="/project/makeitman/public/img/<?php echo $row['image'] ?>" />
          <h4><?php echo $row['pro_title'] ?></h4>
          <p><?php echo "<span class='sub-color'>Sold out</span>"; ?></p>
        </div>
        <div class="reaction-button">
          <button type="submit" name="buy" disabled>Buy now</button>
          <button type="submit" name="add" disabled>Add to Cart</button>
        </div>
      </form>

    <?php } else {
    ?>
      <form action="/project/makeitman/app/Views/homepage/cart/add.php?productID=<?php echo urlencode(trim($row['productID'])); ?>" method="post">
        <div class="product">
          <div class="reaction-icon">
            <button>^^</button>
            <button>^^</button>
          </div>
          <img src="/project/makeitman/public/img/<?php echo $row['image'] ?>" />
          <h4><?php echo $row['pro_title'] ?></h4>
          <p><?php echo number_format($row['price']) . "<span class='sub-color'>VND</span>"; ?></p>
        </div>
        <div class="reaction-button">
          <button type="submit" name="buy">Buy now</button>
          <button type="submit" name="add">Add to Cart</button>
        </div>
      </form>
    <?php }
  }
}

function showProduct()
{
  include('/Schooling/IT/Enviroment/xampp/htdocs/project/makeitman/app/Models/database.php');
  $sql = "SELECT * FROM `product` LIMIT 8";
  $res = $conn->query($sql);
  while ($row = $res->fetch_assoc()) {
    if ($row['qty'] < 1) { ?>
      <form class="disabled" action="/project/makeitman/app/Views/homepage/cart/add.php?productID=<?php echo urlencode(trim($row['productID'])); ?>" method="post">
        <div class="product">
          <div class="reaction-icon">
            <button>^^</button>
            <button>^^</button>
          </div>
          <img src="/project/makeitman/public/img/<?php echo $row['image'] ?>" />
          <h4><?php echo $row['pro_title'] ?></h4>
          <p><?php echo "<span class='sub-color'>Sold out</span>"; ?></p>
        </div>
        <div class="reaction-button">
          <button type="submit" name="buy" disabled>Buy now</button>
          <button type="submit" name="add" disabled>Add to Cart</button>
        </div>
      </form>

    <?php } else {
    ?>
      <form action="/project/makeitman/app/Views/homepage/cart/add.php?productID=<?php echo urlencode(trim($row['productID'])); ?>" method="post">
        <div class="product">
          <div class="reaction-icon">
            <button>^^</button>
            <button>^^</button>
          </div>
          <img src="/project/makeitman/public/img/<?php echo $row['image'] ?>" />
          <h4><?php echo $row['pro_title'] ?></h4>
          <p><?php echo number_format($row['price']) . "<span class='sub-color'>VND</span>"; ?></p>
        </div>
        <div class="reaction-button">
          <button type="submit" name="buy">Buy now</button>
          <button type="submit" name="add">Add to Cart</button>
        </div>
      </form>
    <?php }
  }
}
function showTShirt()
{
  include('/Schooling/IT/Enviroment/xampp/htdocs/project/makeitman/app/Models/database.php');
  $sql = "SELECT * FROM `product` where `categoryID` = 'TS' limit 4 ";
  $res = $conn->query($sql);
  while ($row = $res->fetch_assoc()) {
    if ($row['qty'] < 1) { ?>
      <form class="disabled" action="/project/makeitman/app/Views/homepage/cart/add.php?productID=<?php echo urlencode(trim($row['productID'])); ?>" method="post">
        <div class="product">
          <div class="reaction-icon">
            <button>^^</button>
            <button>^^</button>
          </div>
          <img src="/project/makeitman/public/img/<?php echo $row['image'] ?>" />
          <h4><?php echo $row['pro_title'] ?></h4>
          <p><?php echo "<span class='sub-color'>Sold out</span>"; ?></p>
        </div>
        <div class="reaction-button">
          <button type="submit" name="buy" disabled>Buy now</button>
          <button type="submit" name="add" disabled>Add to Cart</button>
        </div>
      </form>

    <?php } else {
    ?>
      <form action="/project/makeitman/app/Views/homepage/cart/add.php?productID=<?php echo urlencode(trim($row['productID'])); ?>" method="post">
        <div class="product">
          <div class="reaction-icon">
            <button>^^</button>
            <button>^^</button>
          </div>
          <img src="/project/makeitman/public/img/<?php echo $row['image'] ?>" />
          <h4><?php echo $row['pro_title'] ?></h4>
          <p><?php echo number_format($row['price']) . "<span class='sub-color'>VND</span>"; ?></p>
        </div>
        <div class="reaction-button">
          <button type="submit" name="buy">Buy now</button>
          <button type="submit" name="add">Add to Cart</button>
        </div>
      </form>
    <?php }
  }
}
function showPants()
{
  include('/Schooling/IT/Enviroment/xampp/htdocs/project/makeitman/app/Models/database.php');
  $sql = "SELECT * FROM `product` where `categoryID` = 'PS' limit 4";
  $res = $conn->query($sql);
  while ($row = $res->fetch_assoc()) {
    if ($row['qty'] < 1) { ?>
      <form class="disabled" action="/project/makeitman/app/Views/homepage/cart/add.php?productID=<?php echo urlencode(trim($row['productID'])); ?>" method="post">
        <div class="product">
          <div class="reaction-icon">
            <button>^^</button>
            <button>^^</button>
          </div>
          <img src="/project/makeitman/public/img/<?php echo $row['image'] ?>" />
          <h4><?php echo $row['pro_title'] ?></h4>
          <p><?php echo "<span class='sub-color'>Sold out</span>"; ?></p>
        </div>
        <div class="reaction-button">
          <button type="submit" name="buy" disabled>Buy now</button>
          <button type="submit" name="add" disabled>Add to Cart</button>
        </div>
      </form>

    <?php } else {
    ?>
      <form action="/project/makeitman/app/Views/homepage/cart/add.php?productID=<?php echo urlencode(trim($row['productID'])); ?>" method="post">
        <div class="product">
          <div class="reaction-icon">
            <button>^^</button>
            <button>^^</button>
          </div>
          <img src="/project/makeitman/public/img/<?php echo $row['image'] ?>" />
          <h4><?php echo $row['pro_title'] ?></h4>
          <p><?php echo number_format($row['price']) . "<span class='sub-color'>VND</span>"; ?></p>
        </div>
        <div class="reaction-button">
          <button type="submit" name="buy">Buy now</button>
          <button type="submit" name="add">Add to Cart</button>
        </div>
      </form>
    <?php }
  }
}
function showSneakers()
{
  include('/Schooling/IT/Enviroment/xampp/htdocs/project/makeitman/app/Models/database.php');
  $sql = "SELECT * FROM `product` where `categoryID` = 'SN' limit 4";
  $res = $conn->query($sql);
  while ($row = $res->fetch_assoc()) {
    if ($row['qty'] < 1) { ?>
      <form class="disabled" action="/project/makeitman/app/Views/homepage/cart/add.php?productID=<?php echo urlencode(trim($row['productID'])); ?>" method="post">
        <div class="product">
          <div class="reaction-icon">
            <button>^^</button>
            <button>^^</button>
          </div>
          <img src="/project/makeitman/public/img/<?php echo $row['image'] ?>" />
          <h4><?php echo $row['pro_title'] ?></h4>
          <p><?php echo "<span class='sub-color'>Sold Out</span>"; ?></p>
        </div>
        <div class="reaction-button">
          <button type="submit" name="buy" disabled>Buy now</button>
          <button type="submit" name="add" disabled>Add to Cart</button>
        </div>
      </form>

    <?php } else {
    ?>
      <form action="/project/makeitman/app/Views/homepage/cart/add.php?productID=<?php echo urlencode(trim($row['productID'])); ?>" method="post">
        <div class="product">
          <div class="reaction-icon">
            <button>^^</button>
            <button>^^</button>
          </div>
          <img src="/project/makeitman/public/img/<?php echo $row['image'] ?>" />
          <h4><?php echo $row['pro_title'] ?></h4>
          <p><?php echo number_format($row['price']) . "<span class='sub-color'>VND</span>"; ?></p>
        </div>
        <div class="reaction-button">
          <button type="submit" name="buy">Buy now</button>
          <button type="submit" name="add">Add to Cart</button>
        </div>
      </form>
    <?php }
  }
}
function showAccessories()
{
  include('/Schooling/IT/Enviroment/xampp/htdocs/project/makeitman/app/Models/database.php');
  $sql = "SELECT * FROM `product` where `categoryID` = 'AC' limit 4";
  $res = $conn->query($sql);
  while ($row = $res->fetch_assoc()) {
    if ($row['qty'] < 1) { ?>
      <form class="disabled" action="/project/makeitman/app/Views/homepage/cart/add.php?productID=<?php echo urlencode(trim($row['productID'])); ?>" method="post">
        <div class="product">
          <div class="reaction-icon">
            <button>^^</button>
            <button>^^</button>
          </div>
          <img src="/project/makeitman/public/img/<?php echo $row['image'] ?>" />
          <h4><?php echo $row['pro_title'] ?></h4>
          <p><?php echo "<span class='sub-color'>Sold out</span>"; ?></p>
        </div>
        <div class="reaction-button">
          <button type="submit" name="buy" disabled>Buy now</button>
          <button type="submit" name="add" disabled>Add to Cart</button>
        </div>
      </form>

    <?php } else {
    ?>
      <form action="/project/makeitman/app/Views/homepage/cart/add.php?productID=<?php echo urlencode(trim($row['productID'])); ?>" method="post">
        <div class="product">
          <div class="reaction-icon">
            <button>^^</button>
            <button>^^</button>
          </div>
          <img src="/project/makeitman/public/img/<?php echo $row['image'] ?>" />
          <h4><?php echo $row['pro_title'] ?></h4>
          <p><?php echo number_format($row['price']) . "<span class='sub-color'>VND</span>"; ?></p>
        </div>
        <div class="reaction-button">
          <button type="submit" name="buy">Buy now</button>
          <button type="submit" name="add">Add to Cart</button>
        </div>
      </form>
    <?php }
  }
}
?>