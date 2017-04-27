<?php
require_once("header.php");
?>
<?php
$msg="";

$cid = $_GET['uid'];
setcookie("custid",$cid);

if (isset($_POST['offer']))
{
	if(!empty($_POST['offer']))
	{	
		$offer=$_POST['offer'];
		$cusid = $_COOKIE['custid'];
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



<?php
require_once("footer.php")
?>