<?php
require_once("header.php")
?>
<div id="page-wrapper">

            <div class="container-fluid">
            	<div class="row">
            		<div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard
                        </h1>
                        
                    </div>
                </div>
<?php
	$uid =$_SESSION['uid'];
    $result = $db->findByCol('users','uid',$uid);
	if($result['utype'] ==0)
	{

	}
	else
	{
		if($result['utype'] ==1)
		{

		}
		else
		{
			if($result['utype'] ==2)
			{

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