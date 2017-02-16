<?php
require_once("header.php");
?>
<?php
$msg="";
if (isset($_POST['contact']) && isset($_POST['card_no']) )
{
	if(!empty($_POST['contact']) && !empty($_POST['card_no']))
	{	
		$contact=$_POST['contact'];
		$card_no=$_POST['card_no'];
		$result = $db->query("SELECT * FROM users WHERE contact = ':value'",['value'=>$contact])->fetch();
		if(!empty($result))
		{
			$result = $db->update('users',['card_no'=>$card_no]," contact = $contact");
			$msg ="Card Number successfully changed";

		}
		else
		{
			$msg="Mobile number does not exist";
		}
	}
	else
	{
		$msg="Enter the number";
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
					<form action="lost_card.php" method="POST">
  						<div class="form-group">
       						<label for="contact" style="font-size:21px;"> Enter Mobile number</label>
  							<input type="contact" class="form-control" name="contact" placeholder="Mobile Number" >
  						</div>
  						<div class="form-group">
       						<label for="card" style="font-size:21px;"> Enter New Card number</label>
  							<input type="card" class="form-control" name="card_no" placeholder="Card Number" >
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