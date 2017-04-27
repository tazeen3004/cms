<?php
require_once("header.php")
?>
<div id="page-wrapper" link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<div class="container-fluid">
            	<div class="row">
            		<div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard
                        </h1>
                        
                    </div>
                </div>
           
<?php
	$uid =$_SESSION['id'];
    $result = $db->findByCol('users','id',$uid);
	if($result['utype'] ==0)
	{
        
?>
    <div class="row">              
   <div class="col-lg-3 col-md-6">
                        <a href="add_employee.php">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-trash fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Add</div>
                                        <div>Employee</div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
    
    
    
                    <div class="col-lg-3 col-md-6">
                        <a href="delete_employee.php">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-trash fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Delete</div>
                                        <div>Employee</div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
        
                    <div class="col-lg-3 col-md-6">
                        <a href="check_attendance.php">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Check</div>
                                        <div>Attendance</div>
                                    </div>
                                </div>
                            </div>
                           
                            </a>
                        </div>
                    </div> 
                    <div class="col-lg-3 col-md-6">
                        <a href="all_customers.php">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Customer</div>
                                        <div>Details</div>
                                    </div>
                                </div>
                            </div>
                           
                            </a>
                        </div>
                    </div> 
   
 
					     
<?php					
	}
	else
	{
		if($result['utype'] ==1)
		{
            ?>     
                  
        <div class="row">            
        
                    <div class="col-lg-3 col-md-6">
                        <a href="attendance.php">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="glyphicon glyphicon-calendar fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Mark</div>
                                        <div>Attendance</div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div> 
            
              <div class="col-lg-3 col-md-6">
                        <a href="add_customer.php">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="glyphicon glyphicon-plus fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Add</div>
                                        <div>Customer</div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                </div>
           
    
           
                    <div class="col-lg-3 col-md-6">
                        <a href="delete_customer.php">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="glyphicon glyphicon-remove fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Block</div>
                                        <div>Customer</div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="update_balance.php">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-inr fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Recharge</div>
                                        <div>Card</div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
						</div>
   
   
                <!-- /.row -->

                
<?php					

		}
		else
		{
			if($result['utype'] ==2)
			{
            ?>
             <div id="page wrapper">
			 <div id="container-fluid">
                        <div class="col-lg-3 col-md-6">
                             <a href="user_balance.php">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Place</div>
                                        <div>Order</div>
                                    </div>
                                </div>
                            </div>
                           
                                <div class="panel-footer">
                                    <span class="pull-left">Place Now</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                        
                      
                      <div class="col-lg-3 col-md-6">
                             <a href="individual_attendance1.php">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Check</div>
                                        <div>Attendance</div>
                                    </div>
                                </div>
                            </div>
                                <div class="panel-footer">
                                    <span class="pull-left">View</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>  
                   
                    <div class="col-lg-12">
                                         
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Attendance</h3>
                            </div>
                            <div class="panel-body">
                                <div id="myfirstchart"></div>
                          
                            </div>
                        </div>
                    </div>
         </div>     
</div>				
<?php                
			}
			else
			{
				      $balance = 0;
                $credit = 0;
                $debit = 0;
                $result_array1 = $db->query("SELECT * FROM transaction WHERE user_id = ':uid'",['uid'=>$uid])->fetch_all();
            
                foreach ($result_array1 as $result_array1)
                 {
                    if ($result_array1['type']=="debit")
                    {
                    $debit += $result_array1['amount'];
                    
                   }
                 
                 else
                 {
                     $credit += $result_array1['amount'];
                 }
               }
               
               $balance = $credit-$debit;
                             
?>
				<div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $balance ?></div>
                                        <div>Balance</div>
                                    </div>
                                </div>
                            </div>
                            <a href="update_balance.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Recharge Now!</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
							
                        </div>
                    </div>
                        
                         <div  class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-bolt fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Offers</div>
                                        <div>Today's Sale</div>
                                    </div>
                                </div>
                            </div>
                            <a href="offers.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                     
					 
                                    <!-- /.row -->

              
             

<?php
			}
		}
	}

?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
 <link href="css/plugins/morris.css" rel="stylesheet">
 <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
	<script>
new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  <?php
  $result = $db->query("SELECT * FROM employees WHERE uid = ':value'",['value'=>$uid])->fetch_all();
  ?>
  
  data: [
  <?php
 foreach ($result as $result) 
                                            { 
											$total_days = $db->count('employees'," uid=$uid");
											$present_days =  $db->count('employees'," uid=$uid and attendance='1'");
											$percentage= ($present_days/$total_days)*100;
											$attendance=$result['attendance'];
											$percent=($attendance/1)*100;
											?>
  
  
  
    { year:'<?php echo $result['id'];?>', value:<?php echo $percent;?>},
   
 
  <?php
	}
	?>	
 ],	
  // The name of the data record attribute that contains x-values.
  xkey: ['year'],
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
});
</script>

<?php
require_once("footer.php")
?>