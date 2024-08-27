<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">ADMIN PANEL</a> 
            </div>

  <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;">

    <?php $date = date("D d-m-y h:i:s ", time()); print"$date"; ?> 

    &nbsp;

 <a href="index.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a class="active-menu"  href="home.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                     
                    <li>
                        <a href="home.php"><i class="fa fa-sitemap fa-3x"></i> PRODUCTS MANAGER <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="addproductform.php">ADD PRODUCTS</a>
                            </li>
                            <li>
                                <a href="manageproducts.php">MANAGE PRODUCTS</a>
                            </li>
                            
                        </ul>
                      </li>            
                     <li>
                        <a href="home.php"><i class="fa fa-sitemap fa-3x"></i> CATEGORY <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="addcategoryform.php">ADD CATEGORY</a>
                            </li>
                            <li>
                                <a href="managecategory.php">MANAGE CATEGORY</a>
                            </li>
                            
                        </ul>
                      </li>   

                      <li>
                        <a href="home.php"><i class="fa fa-sitemap fa-3x"></i> ORDERS <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="orders.php?status=new">NEW ORDERS</a>
                            </li>
                            <li>
                                <a href="orders.php?status=processing">PROCESSING</a>
                            </li>
                            <li>
                                <a href="orders.php?status=completed">COMPLETED </a>
                            </li>
                            <li>
                                <a href="orders.php?status=cancelled">CANCELLED</a>
                            </li>
                            
                        </ul>
                      </li>   

                    <li>
                        <a  href="customers.php"><i class="fa fa-square-o fa-3x"></i> CUSTOMERS </a>
                    </li>	
                </ul>
               
            </div>
            
        </nav>