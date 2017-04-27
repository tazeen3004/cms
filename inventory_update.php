
<?php
require_once("header.php");
?>
<?php
$msg="";	 
$inventory_id=$_GET['id'];

 if (isset($_POST['quantity']) && isset($_POST['type']) && isset($_POST['amount']))
 {
 
  $quantity= $_POST['quantity'];
	$type = $_POST['type'];
	$amount = $_POST['amount'];  

  if ($type=='consumed')
  {
    $amount=0;
  }

 	if( !empty($_POST['quantity']) && !empty($_POST['type']))
  	{
      
		$result = $db->insert('inventory_log',['quantity'=>$quantity,'type'=>$type, 'amount'=>$amount, 'inventory_id'=>$inventory_id]);
    	
     header("Location: inventory.php");
    }
	else
	{
		$msg = "enter all values";
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
                            Update Inventory
                        </h1> 
                    </div>
                </div>
				<div class="jumbotron">
					<form action="inventory_update.php?id=<?php echo $inventory_id?>" method="POST">
  					
  						<div class="form-group">
       						<label for="quantity" style="font-size:21px;">Quantity</label>
  							<input type="quantity" class="form-control" name="quantity" placeholder="Quantity" >
  						</div>
  						<div class="form-group">
       						<label for="amount" style="font-size:21px;">Amount</label>
  							<input type="amount" class="form-control" name="amount" placeholder="Amount">
  						</div>
            <select name="type">
                <option value="consumed">Consumed</option>
                <option value="bought">Bought</option>
  
                </select> &nbsp; &nbsp;
  					<input type="submit" class="btn btn-primary btn-lg" value="Update"><?php echo $msg;?>	
  					</form>
					
                </div>






     	</div>
 	</div>
</div>


<?php
require_once("footer.php");
?>