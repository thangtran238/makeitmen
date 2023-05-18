<?php
include('/Schooling/IT/Enviroment/xampp/htdocs/project/makeitman/app/Models/database.php');
if (isset($id)) {
  $queryCart = "SELECT accountID,cart.productID,cart.qty,pro_title,pro_des,image 
                from cart, product  
                where product.productID = cart.productID and accountID = 'AC1'";
  $res = $conn->query($queryCart);
  while (mysqli_fetch_array($res)) { ?>
    <div class="cart-item">
      <img src="/makeitman/public/img/<?php echo $res['image']  ?>" alt="">
      <div class="item-info">
        <h4><?php echo $res['pro_title'] ?></h4>
        <small><?php echo $res['price'] ?></small>
        <div class="volume">
          <button type="button">+</button>
          <input type="number" value="" readonly>
          <button type="button">-</button>
        </div>
      </div>
      <div class="delete">
        <button type="button">X</button>
      </div>
    </div>
    <?php  }
} else {
  if (isset($_SESSION['product'])) {
    foreach ($_SESSION['product'] as $value) {
    ?>
      <div class="cart-content">
        <div class="cart-item">
          <img src="/makeitman/public/img/<?php echo $value ?>" alt="">
          <div class="item-info">
            <h4><?php echo $value ?></h4>
            <small><?php echo $value ?></small>
            <div class="volume">
              <button type="button">+</button>
              <input type="number" value="" readonly>
              <button type="button">-</button>
            </div>
          </div>
          <div class="delete">
            <button type="button">X</button>
          </div>
        </div>
      </div>
<?php
    }
  }
}
?>