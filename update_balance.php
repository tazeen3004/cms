<?php
require_once("header.php");
?>
<?php
$msg="";
if (isset($_POST['contact']) && isset($_POST['amt']) )
{
	if(!empty($_POST['contact']) && !empty($_POST['amt']))
	{	
		$contact=$_POST['contact'];
		$amt=$_POST['amt'];
		$result = $db->query("SELECT * FROM users WHERE contact = ':value'",['value'=>$contact])->fetch();
		if(!empty($result))
		{
			$total_bal = $amt + $result['balance'];
			$result = $db->update('users',['balance'=>$total_bal]," contact = $contact");
			$msg ="Balance successfully updated";

		}
		else
		{
			$msg="Mobile number does not exist";
		}
	}
	else
	{
		$msg="Enter all values";
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
                            Change Card 
                        </h1> 
                    </div>
                </div>
				<div class="jumbotron">
					<form action="update_balance.php" method="POST">
  						<div class="form-group">
       						<label for="contact" style="font-size:21px;"> Enter Mobile number</label>
  							<input type="contact" class="form-control" name="contact" placeholder="Mobile Number" >
  						</div>
  						<div class="form-group">
       						<label for="amt" style="font-size:21px;"> Enter Amount</label>
  							<input type="amt" class="form-control" name="amt" placeholder="Amount" >
  						</div>
  						<input type="submit" class="btn btn-primary btn-lg" value="Change"> &nbsp <?php echo $msg;?>	
  					</form>	
                </div>
     	</div>
 	</div>
</div>



<?php
require_once("footer.php")
?>