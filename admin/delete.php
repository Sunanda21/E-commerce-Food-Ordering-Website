<?php

	include "library/connection.php";

	 $delid = $_GET['delid'];

	 $sql = "SELECT * FROM `products` WHERE `id` = '$delid' ";
     $res = $db->query($sql);
     $row=$res->fetch_object();

     $sql = "UPDATE `products` SET `is_this_deleted`= 'Yes' where `id` = '$delid' ";
     $db->query($sql);

     header("location:manageproducts.php?msg= product is invisible now. ")



?>