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
	$uid =$_SESSION['uid'];
    $result = $db->findByCol('users','uid',$uid);
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
                            
            </div>
        </div>
    </div>
  </div>
</div>  