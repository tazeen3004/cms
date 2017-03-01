<?php
require_once("header.php");
?>
<?php


$uid = $_GET['uid'];

$eid=false;
if(isset($_SESSION['id'])){
$eid= $_SESSION['id'];
}
if(!isset($_COOKIE['oid']))
{
$result = $db->insert('orders',['user_id'=>$uid,'employee_id'=>$eid]);
setcookie("oid",$result);
}
else
{
    $oid = $_COOKIE['oid'];
    
}

?>
<div id="page-wrapper">
    <div class="container-fluid">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
	<div id="container" style="overflow-y:scroll;" >
	 <div class="container">
      <div class="col-lg-6">
      <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Favourites</h2>
            
           
            
                        <div class="table table-responsive" style="height:200px; overflow-y:auto; ">
                            
                            <table class="table table-bordered table-hover table-striped">
                               
                                <thead>
                                    <tr>
                                        <th>Food Item</th>
                                        <th>Amount</th>
                                        <th>Place Order</th>
                                    </tr>
                                </thead>
                                <tbody>
  
                                        <?php
            $result_array = $db->query("SELECT * FROM item")->fetch_all();
                                        foreach ($result_array as $result_array) 
                                            { 
											$id=$result_array['id'];
											$count = $db->count('item_order'," item_id=$id");
											$count_array[$id]=[$count];
											}
											arsort($count_array);
											foreach ($count_array as $id => $count) {
                                    ?>
                                    <tr>
                                        
										<?php $result = $db->query("SELECT * FROM item WHERE id = ':value'",['value'=>$id])->fetch();?>
										<td><?php  echo $result['item_name'];?></td>
                                        <td><?php echo $result['amount'];?></td>
                                        <td><a href="cart.php"><input type="submit" class="btn btn-primary btn-lg" value="Add"> </a></td>
                                    </tr>
                                    <?php
                                                
                                        }
                                  
                                    ?>
                                   
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
      </div>
        </div>
                                             <a href="order_confirm.php?uid=<?php echo $uid?>"> <input type="submit" class="btn btn-primary" value="Confirm"></a>

	
	<?php

    $result=$db->query("SELECT * FROM item")->fetch_all();
    foreach ($result as $result) {
        ?>
	
    <ul id="myUL">
  <?php echo '<li><a>'.$result['item_name'].'<div class="thumbnail">
                            <img src="'.$result['item_name'].'.jpg" height="400" width="400" alt="">
							<p align="center">₹' .$result['amount'].'</p>
                        <form id="cart_form'.$result['id'].'" action="cart.php" method="get">
                       <P align="center"> <select id="selectqty" name="qty">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        </select></p>
                        <input type="hidden" name="mid" value="'.$result['id'].'" />
                        <input type="hidden" name="action" value="add" />
                        <p align="center">
                        <input type="submit" class="btn btn-primary btn-lg" value="Add" />
                        </p>
                        </form></a></li>';?>
<?php
	}
?>	
	
  </ul>
  </div>
<!-- Page Features -->

        
    </div>
</div>
<?php
require_once("footer.php");
?>