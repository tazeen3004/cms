
<?php
require_once("header.php");
?>
<?php
$msg="";	 
 if (isset($_POST['name'])&& isset($_POST['qty_avail']) && isset($_POST['price']))
 {
 	$iname= $_POST['name'];
	$qty_avail = $_POST['qty_avail'];
	$price = $_POST['price'];  
  

 	if( !empty($_POST['name']) && !empty($_POST['qty_avail']) && !empty($_POST['price']))
  	{
      

		$result = $db->insert('inventory',['inventory_name'=>$iname]);
		$result1 = $db->insert('inventory_log',['inventory_id'=>$result, 'type'=>'bought','amount'=>$price, 'quantity'=>$qty_avail]);
    	
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
                            Add Item
                        </h1> 
                    </div>
                </div>
				<div class="jumbotron">
					<form action="add_item.php" method="POST">
  						<div class="form-group">
       						<label for="name" style="font-size:21px;"> Name</label>
  							<input type="name" class="form-control" name="name" placeholder="name" >
  						</div>
  						<div class="form-group">
       						<label for="quantity" style="font-size:21px;">Quantity available</label>
  							<input type="qty_avail" class="form-control" name="qty_avail" placeholder="Quantity" >
  						</div>
  						<div class="form-group">
       						<label for="price" style="font-size:21px;">Price</label>
  							<input type="price" class="form-control" name="price" placeholder="Price">
  						</div>

  					<input type="submit" class="btn btn-primary btn-lg" value="Add"><?php echo $msg;?>	
  					</form>
					
                </div>






     	</div>
 	</div>
</div>


<?php
require_once("footer.php");
?>