<?php

include "library/connection.php";

$productname 		= $_POST['productname'];
$productprice 		= $_POST['productprice'];
$productdetails 	=$_POST['productdetails'];
$category			=$_POST['category'];

$filename       =$_FILES['productimage']['name'];
$templocation   =$_FILES['productimage']['tmp_name'];
$filesize       =$_FILES['productimage']['size'];
$filetype       =$_FILES['productimage']['type'];


$time = time();


$ext = explode(".", $filename);  
$ext = strtolower(trim(end($ext)));


if ($ext =="jpg"|| $ext =="jpeg" || $ext=="png"){

    $sql ="INSERT INTO `products` (  `id`, `name`, `price` , `details`, `image`, `cid`) VALUES (NULL, '$productname', '$productprice', '$productdetails', '' ,'$category')";

    $db ->query($sql);

    $id = $db->insert_id;   //last inserted id

    $destination = "products/".$id.".".$ext;

    $sql = "UPDATE `products` SET `image` = '$destination' WHERE `id` = '$id'";
    $db ->query($sql);

    $folderpath = "../products/".$id.".".$ext;

    move_uploaded_file($templocation, $folderpath);

    //print "1 Profile Updated";
    header("location:addproductform.php?msg= 1 product Uploaded successfully .");// redirects to index page and shows msg.

}
else{
    header("location:addproductform.php?msg=Wrong File Input.");
}




?>