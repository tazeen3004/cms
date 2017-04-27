<?php
require_once("header.php");
$msg="";
?>
<head>
<script>
function active(){
var click = document.getElementById('click');
if(click.value == 'Take Order'){
sweetAlert("Oops...", "You don't have sufficient balance!", "error");
}
}
</script>
</head>

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
       						<label for="cardno" style="font-size:21px;"> Enter card number</label>
  							<input type="number" class="form-control" name="cardno" placeholder="Card Number" autofocus>
  						</div>
  						<?php echo $msg;?>
  					</form>	
  						<?php
  						
						if (isset($_POST['cardno']))
						{
							if(!empty($_POST['cardno']))
							{	
								$cardno=$_POST['cardno'];
								$credit=0;

            $debit=0;
					$result11 = $db->query("SELECT * FROM users WHERE card_no = ':cardno'",['cardno'=>$cardno])->fetch();
					$uid = $result11['id'];
                     $result_array1 = $db->query("SELECT * FROM transaction WHERE user_id = ':uid'",['uid'=>$uid])->fetch_all();
					 $name=$db->query("SELECT uname FROM users WHERE id=':uid'",['uid'=>$uid])->fetch();
					 $n=$name['uname'];
  
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
									<h2>Name: <?php echo $n;?> </h2>
									<br>
									<h2>Balance: <?php echo $balance;?> </h2>
									 <a href="new_order.php?uid=<?php echo $uid?>"> <input type="submit" id="click" class="btn btn-primary" <?php if($balance==0){;?>onmousedown="active()"<?php };?> value="Take Order"></a>

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