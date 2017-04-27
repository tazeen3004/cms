<?php
require_once("header.php")
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                       Recharge
                </h1>
                        
            </div>
        </div>
<?php
	$uid =$_SESSION['id'];
    $result = $db->findByCol('users','id',$uid);
   ?>
   <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                         <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"></div>
                            <div>Balance</div>
                        </div>
                    </div>
                </div>
                <a href="update_balance.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Recharge now</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>             
            </div>
        </div>
		 <div  class="col-lg-3 col-md-6 pull-right">
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
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
    </div>
  </div>
</div>  
<?php
require_once("footer.php")
?>