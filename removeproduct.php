<?php
session_start();

if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];


    //as in different page thats why taking from session array. otherwise if in same page then only unset from $cart only.

    if (isset($_SESSION['mycart'][$pid])) {
        unset($_SESSION['mycart'][$pid]);
    }
}

header('Location: add.php'); // Redirect back to the cart page
exit();
?>
