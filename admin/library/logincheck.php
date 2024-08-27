<?php 

if(!isset($_SESSION['adminlogin']) || $_SESSION['adminlogin']!=true){
	header("location: index.php?msg=Please Login First");
}


?>