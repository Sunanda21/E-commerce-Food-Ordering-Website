<?php

include "library/connection.php";

if (isset($_POST['productname']) ){

    $productname        = $_POST['productname'];
    $productprice       = $_POST['productprice'];
    $productdetails     = $_POST['productdetails'];
    $category           = $_POST['category'];
    $editid             = $_POST['id'];

    $filename       =$_FILES['productimage']['name'];
    $templocation   =$_FILES['productimage']['tmp_name'];
    $filesize       =$_FILES['productimage']['size'];
    $filetype       =$_FILES['productimage']['type'];


    $time = time();


    if(empty($filename)){

        $sql = "UPDATE `products` SET `name` = '$productname', `price` = '$productprice', `details` = '$productdetails', `cid` = '$category' WHERE `id` = '$editid'";
        $db->query($sql);

        header("location:manageproducts.php?msg=1 Products Updated");
    }
    else{

        $ext = explode(".", $filename);  //  person.file.pdf  
        $ext = strtolower(trim(end($ext)));

        if($ext == "jpg" || $ext == "jpeg" || $ext == "png" ){

            $sql = "SELECT * FROM `products` WHERE `id` = '$editid'";
            $res = $db->query($sql);
            $row = $res->fetch_object();

            $path = "../".$row->image;
            if($path)
                unlink($path); 

            $destination = "products/".$editid.".".$ext;

            $sql = "UPDATE `products` SET `name` = '$productname', `price` = '$productprice', `details` = '$productdetails',`image`  = '$destination', `cid` = '$category' WHERE `id` = '$editid'";
            $db->query($sql);

            $folderpath = "../products/".$editid.".".$ext;

            move_uploaded_file($temp_location, $folderpath);

            //print "1 Profile Uploaded";
            header("location:index.php?msg=1 Profile Updated");
        }
        else {
            header("location:edit.php?msg=Wrong File Input&edit_id=$editid");
        }

    }
}

?>