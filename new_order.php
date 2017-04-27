<?php
include_once('header.php');
?>




<?php
//$uid=false;
if(isset($_GET['uid']))
{
$uid = $_GET['uid'];
}
//$eid=false;
if(isset($_SESSION['id'])){
$eid= $_SESSION['id'];
}
if(!isset($_COOKIE['oid']))
{
$result = $db->insert('orders',['user_id'=>$uid,'employee_id'=>$eid]);
$o = $result;
setcookie("oid",$o);

}
else
{
	echo "inside elses";
    $oid = $_COOKIE['oid'];
}
?>



<div id="page-wrapper">
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." autocomplete="on" autofocus>
	<div id="container" style="overflow-y:scroll;" >
	<?php

    $result=$db->query("SELECT * FROM item")->fetch_all();
    foreach ($result as $result) {
        ?>
	<ul id="myUL">
  <?php echo '<li style="display:none;"><a>'.$result['item_name'].'<form id="cart_form'.$result['id'].'" action="cart.php" method="get"> 
							<p align="right">₹' .$result['amount'].' &nbsp;&nbsp;
                        
                     
                        &nbsp;&nbsp;
                        <input type="hidden" name="mid" value="'.$result['id'].'" />
                        <input type="hidden" name="action" value="add" />
                        <input type="submit" class="btn btn-primary btn-lg" value="Add" />
                        </p> 
                        </form></a></li>';?>
<?php
	}
?>	
	
  </ul>
  </div>
							<div class="container-fluid">
        <div class="col-lg-6">
		<div class="panel panel-default">
                            <div class="panel-heading">
                                <h2>Favourites</h2>
                            </div>
            <div class="table table-responsive" style="height:400px; overflow-y:auto; ">
                            
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
                                        <td><form class="form1" id="cart_form'<?php $result['id'];?>'" action="cart.php" method="get">
                        <input type="hidden" name="mid" value="<?php echo $result['id'];?>" />
                        <input type="hidden" name="action" value="add" />
                        <p align="right">
                        <input type="submit" class="btn btn-primary btn-lg" value="Add" />
                        </p> 
                        </form> </td>
                                    </tr>
                                    <?php
                                                
                                        }
                                  
                                    ?>
                                   
                                    
                                </tbody>
                            </table>
                        </div>
  </div>
  </div>
  
  
<!-- Page Features -->
       
      <div class="col-lg-6">
		<div class="panel panel-default">
                            <div class="panel-heading">
          <h2>Confirm order</h2> 
		</div>
      
            <?php
			if(isset($_GET['uid']))
			{
            $uid=$_GET['uid'];
			}            
            $msg="";
           
            if(isset($_COOKIE['total']) && isset($_COOKIE['oid']))
            {
              $total=$_COOKIE['total'];
              
              $oid=$_COOKIE['oid'];
             
?>
<div class="table-responsive">
        <table class="table table-hover table-striped">
          <thead>
            <tr>
              <th>Name</th>
                  <th>Amount</th>
                  <th> Total Amount</th>
                    <th></th>
            </tr>
          </thead>
          <tbody> 


<?php
              $result_array = $db->query("SELECT * FROM item_order WHERE order_id = ':value'",['value'=>$oid])->fetch_all();

	            foreach($result_array as $result_array)
	             {

                  
                  $mid=$result_array['item_id'];
		              $result = $db->query("SELECT * FROM item WHERE id = ':value'",['value'=>$mid])->fetch();
             
            ?>
            <tr>
              <td><?php echo $result['item_name'];?></td>
                <td><?php echo $result['amount'];?></td>
                <td><?php echo $result_array['total_amount']?></td>
                  <td></td>
                  <td>  <a class="delete" href="cart.php?action=delete&mid=<?php echo $mid?>" ><input type="submit" class="btn btn-primary" value="Delete Product"></a>
                  </td>
                  <?php } ?>
            </tr>
          </tbody>
        </table>
                            

        <div>
          <h2> Grand Total:  <?php echo $total;?></h2>
		   <a class="confirm" href="conf.php?uid=<?php echo $uid?>" ><input type="submit" class="btn btn-primary" value="Confirm"></a>
                  
        </div>
    
            <?php   
        
        }
        else{
          ?>
           <div class="row">
        <div class="col-lg-12">
          <h2>
            No items in the cart!
          </h2> 
        </div>
      </div>


          <?php
        }
        ?> 

    </div>
      </div>
	  </div>
	 </div>
        </div>
		<style>
#myInput {
    background-image: url('/css/searchicon.png'); /* Add a search icon to input */
    background-position: 10px 12px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 12px; /* Add some space below the input */
}

#myUL {
    /* Remove default list styling */
    list-style-type: none;
    padding: 0;
    margin: 0;
}

#myUL li a {
    border: 1px solid #ddd; /* Add a border to all links */
    margin-top: -1px; /* Prevent double borders */
    background-color: #f6f6f6; /* Grey background color */
    padding: 12px; /* Add some padding */
    text-decoration: none; /* Remove default text underline */
    font-size: 18px; /* Increase the font-size */
    color: black; /* Add a black text color */
    display: block; /* Make it into a block element to fill the whole list */
}

#myUL li a.header {
    background-color: #e2e2e2; /* Add a darker background color for headers */
    cursor: default; /* Change cursor style */
}

#myUL li a:hover:not(.header) {
    background-color: #eee; /* Add a hover effect to all links, except for headers */
}
</style>
<script>
function myFunction() {
    // Declare variables
    var input, filter, ul, li, a, i;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName('li');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>
<script>
function active(){
var click = document.getElementById('click');
if(click.value == 'CART'){
 setTimeout(function () { 
swal({
  title: "Wow!",
  text: "Message!",
  type: "success",
  confirmButtonText: "OK"
},
function(isConfirm){
  if (isConfirm) {
    window.location.href = "conf.php?uid=<?php echo $uid?>";
  }
}); }, 1000);
}
}
</script>

	
		
<?php
require_once("footer.php");
?>