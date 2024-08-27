<?php
	include "library/connection.php";

	if(isset($_POST['ship_name']))
	{
		$ship_name = $_POST['ship_name'];
		$ship_phone = $_POST['ship_phone'];
		$ship_address = $_POST['ship_address'];
		$payment = $_POST['payment']; 
		$time = time();

		//first insert in order table

		$sql = "INSERT INTO `orders` (`order_id`, `customer_id`, `ship_fullname`, `ship_phone`, `ship_address`, `payment_info`, `timestamp`, `status`) VALUES (NULL, '$_SESSION[userid]', '$ship_name', '$ship_phone', '$ship_address', '$payment', '$time', 'new');";
		$db->query($sql);

		//then take the order_id from order table

		$order_id = $db->insert_id;


		//then insert into cart_items usind order_idand the session array.

       foreach ($_SESSION['mycart'] as $pid => $quantity) {

            $sql = "SELECT * FROM `products` WHERE `id` = '$pid'";
            $res = $db->query($sql);
            $row = $res->fetch_object();

            $sql="INSERT INTO `cart_items` (`cart_item_id`, `order_id`, `pid`, `quantity`, `product_name`, `product_price`) VALUES (NULL, '$order_id', '$pid', '$quantity', '$row->name', '$row->price')";
            $db->query($sql);
        }

    include "library/header.php";    

        if($payment=='cod')
        {
        	 echo '<center>
            <div style="position:relative ; width: 30%" align="center">
                    <h1> THANK YOU FOR YOUR ORDER. <BR> YOUR ORDER HAS BEEN PLACED. </h1>
                 <a href="index.php"><button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Continue shopping</button></a> 
            </div>
          </center>';
        }
      if($payment == "paypal"){

      	?>
      	<form name="form1" action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_cart" />
			<input type="hidden" name="upload" value="1">  

			<input type="hidden" name="business" value="ipeg.solutions@gmail.com" />

			<?php 
			$count = 0;
			foreach($_SESSION['mycart'] as $pid => $quantity) {

	            $sql = "SELECT * FROM `products` WHERE `id` = '$pid'";
	            $res = $db->query($sql);
	            $row = $res->fetch_object();

	            $count++;

	            print '<input type="hidden" name="item_name_'.$count.'" value="'.$row->name.'" />
				<input type="hidden" name="amount_'.$count.'"    value="'.$row->price.'" />
				<input type="hidden" name="quantity_'.$count.'"  value="'.$quantity.'" />';
			}

			?>

				
		 
		  </form>

      	<?php

      }


        //to empty the cart
        unset($_SESSION['mycart']);
		

                          
	}




include "library/footer.php";

?>