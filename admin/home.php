<?php

include "library/connection.php";

include "library/logincheck.php";

include "library/header.php";



?>  
       
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>   
                        <h5>Welcome  <b><?= $_SESSION['adminname']?> </b> , Love to see you back. </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
			
        
               
                    <div class="panel panel-default">
                        <div class="panel-heading">
                         <B> ADMIN LOGIN HISTORY </B>
                        </div>


                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>admin_login_history_id</th>
                                            <th>admin_id</th>
                                            <th>ip</th>
                                            <th>user_agent</th>
                                             <th>timestamp</th>
                                        </tr>
                                    </thead>

                            <?php

                            $sql = "SELECT * FROM `admin_login_history` WHERE `admin_id` = '$_SESSION[adminid]' ORDER BY `timestamp` DESC" ;
                            $res = $db->query($sql);
                            while($row= $res->fetch_object())
                            {
                                $date = date("D d-m-y, h:i:s a",$row->timestamp );
                                
                                print ' <tbody>
                                        <tr>
                                            <td>'.$row->admin_login_history_id.'</td>
                                            <td>'.$row->admin_id.'</td>
                                            <td>'.$row->ip.'</td>
                                            <td>'.$row->user_agent.'</td>
                                            <td>'.$date.'</td>
                                        </tr>
                                        
                                    </tbody>';

                            }
                                
                            ?>
                                   
                                </table>
                            </div>
                        </div>
                    </div>
         
             </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
   

<?php

include "library/footer.php";



?> 