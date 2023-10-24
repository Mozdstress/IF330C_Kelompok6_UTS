<?php
session_start();
require('db.php');

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $totalPrice = 0;
    $totalQuantity = 0;

    foreach ($_SESSION['cart'] as $item) {
        $menuName = $item['name'];
        $menuPrice = $item['price'];
        $quantity = $item['quantity'];
        $subtotal = $menuPrice * $quantity;
        $totalPrice += $subtotal;
        $totalQuantity += $quantity;
    }
} else {
    $totalQuantity = 0;
    $totalPrice = 0;
}


if(isset($_POST['checkout'])){
    if(isset($_SESSION['user_id'])){
        $userid = $_SESSION['user_id'];
    }
    
    $query = "INSERT INTO transaction (user_id, quantity, price) VALUES (?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->execute([$userid, $totalQuantity, $totalPrice]);
    $totalPrice = 0;
    $totalQuantity = 0;
    unset($_SESSION['cart']);
    header("Location: index.php");
}

$_SESSION['totalQuantity'] = $totalQuantity;
?>

<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="css/cart.css">
<style>
    body {
        margin-top: 20px;
        background-image: url('images/cart-bg.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        font-family: 'Roboto', sans-serif;
    }
</style>
</head>

<body>
    <h1>
        Your Orders
    </h1>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th style="min-width: 200px; border-top-left-radius: 5px; ">Menu Name</th>
                            <th style="width: 150px; text-align:center;">Price</th>
                            <th style="width: 120px; text-align:center;">Quantity</th>
                            <th style="width: 130px; text-align:center; border-top-right-radius: 5px; ">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $item) {
                                $menuName = $item['name'];
                                $menuPrice = $item['price'];
                                $quantity = $item['quantity'];
                                $subtotal = $menuPrice * $quantity;
                        ?>
                                <tr>
                                    <td>
                                        <?php echo $menuName; ?>
                                    </td>
                                    <td style="text-align:start; padding-left:35px;">Rp. <?php echo $menuPrice; ?></td>
                                    <td style="text-align:center;"><?php echo $quantity; ?></td>
                                    <td style="text-align:start; padding-left:35px;">Rp. <?php echo $subtotal; ?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <div class="total-and-buttons">
                    <div id="total-price-section">
                        <div>Total price :</div>
                        <div class="total-price">Rp. <?php echo $totalPrice; ?></div>
                    </div>
                    <form method="post" action="shopping_cart.php">
                        <div class="cart-buttons">
                            <button type="button" class="back-btn" onclick="window.location.href='index.php'">Back to Menu</button>
                            <button type="submit" class="checkout-btn" name="checkout" >Checkout</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


<script>
    function changeQuantity(button, action) {
        const quantityElement = button.parentElement.querySelector('.quantity');
        let currentQuantity = parseInt(quantityElement.textContent);

        if (action === 'increment') {
            currentQuantity++;
        } else if (action === 'decrement' && currentQuantity > 1) {
            currentQuantity--;
        }

        quantityElement.textContent = currentQuantity;
        updateTotalQuantity();
    }

    function updateTotalQuantity() {
        const quantityElements = document.querySelectorAll('.quantity');
        let totalQuantity = 0;

        quantityElements.forEach(function(element) {
            totalQuantity += parseInt(element.textContent);
        });

        const totalQuantityElement = document.querySelector('.total-quantity');
        totalQuantityElement.textContent = totalQuantity;
    }
</script>
</body>
</html>