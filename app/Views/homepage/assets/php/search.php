<?php

  include('/Schooling/IT/Enviroment/xampp/htdocs/project/makeitman/app/Models/database.php');

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $searchInput = $_POST["searchInput"];
    $querySearch = "SELECT * FROM product WHERE `pro_title` LIKE '%$searchInput%'";
    $res = $conn->query($querySearch);

    if ($res && $res->num_rows > 0) {
      while ($row = $res->fetch_assoc()) {
        ?>
        <form action="/project/makeitman/app/Views/homepage/cart/add.php?productID=<?php echo urlencode(trim($row['productID'])); ?>" method="post">
          <div class="product-search">
            <img src="/project/makeitman/public/img/<?php echo $row['image'] ?>" />
          </div>
          <div>
            <h4><?php echo $row['pro_title'] ?></h4>
            <p><?php echo number_format($row['price']) . "<span class='sub-color'>VND</span>"; ?></p>
          </div>
          <div class="reaction-button">
            <button type="submit" name="add">Add to Cart</button>
          </div>
        </form>
        <?php
      }
    } else {
      echo 'No results found.';
    }
  }


?>
