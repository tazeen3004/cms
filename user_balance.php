<?php
require_once("header.php");
$msg="";
?>
<div id="page-wrapper">
    <div class="container-fluid">
		<div id="page-wrapper">
            <div class="container-fluid">
            	<div class="row">
            		<div class="col-lg-12">
                        <h1 class="page-header">
                            Customer
                        </h1> 
                    </div>
                </div>
				<div class="jumbotron">
					<form action="user_balance.php" method="POST">
  						<div class="form-group">
       						<label for="uid" style="font-size:21px;"> Enter user number</label>
  							<input type="uid" class="form-control" name="uid" placeholder="User Number" >
  						</div>
  						<input type="submit" class="btn btn-primary btn-lg" value="Check"> <?php echo $msg;?>
  					</form>	
  						<?php
  						
						if (isset($_POST['uid']))
						{
							if(!empty($_POST['uid']))
							{	
								$uid=$_POST['uid'];
								$credit=0;

            $debit=0;
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
								if(!empty($result))
								{
								?>	
									<br>
									<br>
									<h2>Balance: <?php echo $balance;?> </h2>
									 <a href="new_order.php?uid=<?php echo $uid?>"> <input type="submit" class="btn btn-primary" value="Take Order"></a>

								<?php	
								}

								else
								{
									$msg="Customer id does not exist";
								}
							}
							else
							{
								$msg="Enter user id!";
							}
						}





  						?>
  					
                </div>
     	</div>
 	</div>
</div>




<?php
require_once("footer.php");
?>