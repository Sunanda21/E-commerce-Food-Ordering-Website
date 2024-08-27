<?php
    include "library/connection.php";
    //include "library/header.php";


    $del_id = $_GET['del_id'];

    $sql = "UPDATE `category` SET `is_this_deleted` = 'Yes' where `cid`='$del_id'";
    $db->query($sql);

    header('location:managecategory.php?msg= deletion successfull.');
?>

