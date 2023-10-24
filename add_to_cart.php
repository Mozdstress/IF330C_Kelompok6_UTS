<?php
session_start();
require_once('db.php');

$loggedIn = (isset($_SESSION['user_id'])) ? true : false;

function addItemToCart($menuName, $menuPrice, $quantity) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $menuIndex = -1;
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['name'] == $menuName) {
            $menuIndex = $key;
            break;
        }
    }

    if ($menuIndex >= 0) {
     
        $_SESSION['cart'][$menuIndex]['quantity'] += $quantity;
    } else {
       
        $cartItem = [
            'name' => $menuName,
            'price' => $menuPrice,
            'quantity' => $quantity
        ];
        $_SESSION['cart'][] = $cartItem;
    }
}

if (isset($_POST['add_to_cart']) && $_POST['add_to_cart'] == 1) {
    $menuId = $_POST['menu_id'];
    $menuName = $_POST['menu_name'];
    $menuPrice = $_POST['menu_price'];

    if (isset($_POST['quantity']) && is_numeric($_POST['quantity'])) {
        $quantity = (int)$_POST['quantity'];
        addItemToCart($menuName, $menuPrice, $quantity);
    } else {
        addItemToCart($menuName, $menuPrice, 1);
    }

    $cartQuantity = count($_SESSION['cart']);
    echo $cartQuantity;
}


header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
