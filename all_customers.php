<?php
require_once("header.php")
?>
<div id="page-wrapper" link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<div class="container-fluid">
            	<div class="row">
            		<div class="col-lg-12">
                        <h1 class="page-header">
                            Customer's 									
                        </h1>
                        
                    </div>
                </div>
                <div class="col-lg-12">
                        <div class="table-responsive" style="height:450px;">

                        	<?php
						
                        $total_users = $db->count('users');
                        $ovdebit =0;
                        $ovcredit = 0;
                        $result_arr = $db->query("SELECT * FROM transaction")->fetch_all();
                        foreach ($result_arr as $result_arr) {
                        	if($result_arr['type'] == "credit")
                        	{
                        		$ovcredit += $result_arr['amount'];
                        	}
                        	else
                        	{
                        		$ovdebit += $result_arr['amount'];
                        	}
                        }

                        ?>
                        <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $total_users; ?></div>
                                        <div>Total Customers of canteen</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                         <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $ovdebit; ?></div>
                                        <div>Overall Amount Gained</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
 					<div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $ovcredit; ?></div>
                                    </tr>
                                        <div>Total Balance amount on cards</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
							<a href="gr_owner.php">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">View Graph</div>
                                    </tr>
                                 
                                    </div>
                                </div>
								</a>
                            </div>
                        </div>
                    </div>
                        <br>
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                    <th style="background-color: #222; color: white;font-weight: bold;text-align: center;">Sr.No</th>
									<th style="background-color: #222; color: white;font-weight: bold;text-align: center;">Name of Customer</th>
                                    <th style="background-color: #222; color: white;font-weight: bold;text-align: center;">Contact Number</th>
									<th style="background-color: #222; color: white;font-weight: bold;text-align: center;">Balance</th>
									<th style="background-color: #222; color: white;font-weight: bold;text-align: center;">Amount spent</th>
									<th style="background-color: #222; color: white;font-weight: bold;text-align: center;">Offer<th>
                                    </tr>
                                </thead>
                              
                                <tbody>
								 <?php
								$counter = 0;
								$result = $db->query("SELECT * FROM users")->fetch_all();
								foreach ($result as $result) {
									$counter +=1;
									$balance = 0;
               						$credit = 0;
                				$debit = 0;
                				$result_array1 = $db->query("SELECT * FROM transaction WHERE user_id = ':uid'",['uid'=>$result['id']])->fetch_all();
            	
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
                                    <tr style="background-color: white; color: black;font-weight: bold;text-align: center;">
									<td><?php echo $counter; ?> </td>
									<td><?php echo $result['uname']; ?></td>
									<td><?php echo $result['contact'];?></td>
									<td><?php echo $balance;?></td>
									<td><?php echo $debit;?></td>
									<td> <input data-toggle="modal" data-target="#myModal" type="submit" class="btn btn-primary" value="Give"></td>
								</tr>
								<?php
									$cid = $result['id'];

							}
								?>
								</tbody>
							</table>
						</div>
			</div>
			<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Offers</h4>
      </div>
      <div class="modal-body">
        <?php
$msg="";


if (isset($_POST['offer']))
{
	if(!empty($_POST['offer']))
	{	
		$offer=$_POST['offer'];
		$cusid = $cid;
		$result = $db->insert('offers',['offer_description'=>$offer,'user_id'=>$cusid]);
		setcookie("cart['$mid']","",time()-3600);	

		exit("<script>location.href='all_customers.php'</script>");

	}
	else
	{
		$msg="Cannot leave this field Blank";
	}

}

?>
<div id="page-wrapper">
    <div class="container-fluid">
		<div id="page-wrapper">
            <div class="container-fluid">
            	<div class="row">
            		<div class="col-lg-12">
                        <h1 class="page-header">
                            Offer
                        </h1> 
                    </div>
                </div>
				<div class="jumbotron">
					<form action="give_offer.php" method="POST">
  						<div class="form-group">
       						<label for="offer" style="font-size:21px;"> Enter Offer</label>
  							<input type="text-box" class="form-control" name="offer" placeholder="Offer Detail">
  						</div>
  						<input type="submit" class="btn btn-primary btn-lg" value="Send Offer"> &nbsp <?php echo $msg;?>	
  					</form>	
                </div>
     	</div>
 	</div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<?php
require_once("footer.php")
?>