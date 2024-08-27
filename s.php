<?php
    session_start();

    if(isset($_SESSION['mycart']))
    {
        $cart = $_SESSION['mycart'];
    }
    else
    {
        $cart = [];
    }

    if(isset($_POST['quantity'])){

     $pid = $_POST['pid'];
     
     $quantity = $_POST['quantity'];

     //associative array dosen't require any index. it storing the value as per the pid.
     $cart[$pid] = $quantity;
     //print_r($cart)
 }

     $_SESSION['mycart'] = $cart;
     //print_r($_SESSION['mycart'])

?>