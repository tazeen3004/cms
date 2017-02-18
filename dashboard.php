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
        
?><div class="row">
                    <div class="col-lg-3 col-md-6">
                         <a href="add_emp.php">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-plus fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">ADD</div>
                                        <div>New Employee</div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
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
                            <a href="#">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Check</div>
                                        <div>Attendance</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                            </a>
                        </div>
                    </div> 
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-inr fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Update</div>
                                        <div>Salary</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                            </a>
                        </div>
                    </div> 
                </div>
    &nbsp;
    <div class="row">
        <a href="#"> <div class="col-lg-3 col-md-6">
                        <div class="panel panel-">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-bar-chart fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Today's</div>
                                        <div>Sales</div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div> </a>
    
    </div>
					 <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i>Sales Chart</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-area-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>              
<?php					
	}
	else
	{
		if($result['utype'] ==1)
		{
            ?>     
                 <div class="col-lg-3 col-md-6">
                        <div button type="button" class="btn btn-lg btn-success">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-pencil fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right" link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
                                        <div class="huge">Update</div>
                                        <div>Menu</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                            </a>
                        </div>
                    </div>
                
                 <div class="col-lg-4 col-md-6">
                        <div button type="button" class="btn btn-lg btn-info">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="glyphicon glyphicon-hourglass fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right" link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
                                        <div class="huge">Employee</div>
                                        <div>Work Time</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                            </a>
                        </div>
                    </div>
                
                 <div class="col-lg-4 col-md-6">
                        <div button type="button" class="btn btn-lg btn-warning">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-calendar fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Employee</div>
                                        <div>Attendance</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                            </a>
                        </div>
                    </div>
                
                
<?php					

		}
		else
		{
			if($result['utype'] ==2)
			{
            ?>
                <div class="row"> 
    <div class="col-lg-3 col-md-6">
                      &nbsp;  <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">New order</div>
                                    </div>
                                </div>
                            </div>
                            <a href="user_balance.php">
                                <div class="panel-footer">
                                    <span class="pull-left">place now</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
   
     <div class="col-lg-6">
                        <h2>Sales</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Food item</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>/index.html</td>
                                        <td>1265</td>
                                        <td>32.3%</td>
                                        <td>$321.33</td>
                                    </tr>
                                    <tr>
                                        <td>/about.html</td>
                                        <td>261</td>
                                        <td>33.3%</td>
                                        <td>$234.12</td>
                                    </tr>
                                    <tr>
                                        <td>/sales.html</td>
                                        <td>665</td>
                                        <td>21.3%</td>
                                        <td>$16.34</td>
                                    </tr>
                                    <tr>
                                        <td>/blog.html</td>
                                        <td>9516</td>
                                        <td>89.3%</td>
                                        <td>$1644.43</td>
                                    </tr>
                                    <tr>
                                        <td>/404.html</td>
                                        <td>23</td>
                                        <td>34.3%</td>
                                        <td>$23.52</td>
                                    </tr>
                                    <tr>
                                        <td>/services.html</td>
                                        <td>421</td>
                                        <td>60.3%</td>
                                        <td>$724.32</td>
                                    </tr>
                                    <tr>
                                        <td>/blog/post.html</td>
                                        <td>1233</td>
                                        <td>93.2%</td>
                                        <td>$126.34</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->	 
<?php                
			}
			else
			{
?>
				<div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $result['balance']?></div>
                                        <div>Balance</div>
                                    </div>
                                </div>
                            </div>
                            <a href="recharge.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Recharge Now!</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
							
                        </div>
                    </div>
					 
                                    <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Expenditure</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-area-chart"></div>
                            </div>
                        </div>
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
 
<?php
require_once("footer.php")
?>