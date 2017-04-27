<?php
require_once("header.php");
?>
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
<?php
$uid=false;
$uid = $_GET['uid'];

$eid=false;
if(isset($_SESSION['id'])){
$eid= $_SESSION['id'];
}
if(!isset($_COOKIE['oid']))
{
$result = $db->insert('orders',['user_id'=>$uid,'employee_id'=>$eid]);
setcookie("oid",$result);
    echo $result;
}
else
{
    $oid = $_COOKIE['oid'];
    echo $oid;
}
//function count_item()
//{
  //  $result_array = $db->query("SELECT item_id FROM item")->fetch_all();
    //foreach ($result_array as $result_array) 
    //{
      //  $id=$result_array['mid'];
        //$count = $db->count('item_order'," item_id=$id");
        //$count_array[$id]=[$count];

    //}
    //rsort($count_array);
    //foreach ($count_array as $id => $count) {
      //  echo $count_array;
    //}
//}
//count_item();
?>



<div id="page-wrapper">
    
   
    
    <div class="container-fluid">
        <div class="col-lg-6">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names" >
	<div id="container" style="height:600px; overflow-y:scroll;" >
	
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
        </div>
<!-- Page Features -->
        
     <a href="order_confirm.php?uid=<?php echo $uid;?>"?>     
<input type="submit" class="btn btn-primary btn-lg" value="Confirm">
    </a>
 <br><br><br><div class="container">
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
                                        <td><form id="cart_form'<?php $result['id'];?>" action="cart.php" method="get">
                       <select id="selectqty" name="qty">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                           </select>
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
      </div>
        </div>
	
        
    </div>
</div>
<?php
require_once("footer.php");
?>