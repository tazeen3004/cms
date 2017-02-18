<?php
require_once("header.php");
?>

<div id="page-wrapper">
    <div class="container-fluid">
<!-- Page Features -->       
<?php
$uid = $_GET['uid'];
$eid= $_SESSION['id'];
if(!isset($_COOKIE['oid']))
{
$result = $db->insert('orders',['user_id'=>$uid,'employee_id'=>$eid]);
setcookie("oid",$result);
}
else
{
    $oid = $_COOKIE['oid'];
    
}
function count_item()
{
    $result_array = $db->query("SELECT * FROM item")->fetch_all();
    foreach ($result_array as $result_array) 
    {
        $id=$result_array['id'];
        $count = $db->count('item_order'," item_id=$id");
        $count_array[$id]=[$count];

    }
    

}

?>



<?php
    $result1=$db->query("SELECT * FROM item")->fetch_all();
    foreach ($result1 as $result1) {
        ?>
                  <div class="col-sm-4 col-lg-4 col-md-4" >
                        <div class="thumbnail">
                            <img src="<?php echo $result1['item_name']?>.jpg" height="250" width="320" alt="">
                            <div class="caption">
                                
                                <h3><?php echo $result1['item_name']?></h3>
                        <p>₹ <?php echo $result1['amount']?></p>
                        <form id="cart_form<?php echo $result1['id']?>" action="cart.php" method="get">
                        <select id="selectqty" name="qty">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        </select>
                        <br>
                        <input type="hidden" name="mid" value="<?php echo $result1['id']; ?>" />
                        <input type="hidden" name="action" value="add" />
                       
                        <br >
                        <p>
                        <input type="submit" class="btn btn-primary btn-lg" value="Add" />
                        </p>
                        </form>
                            </div>
                        </div>
                    </div>
   <?php
   } 
?>


        
    </div>
</div>
<?php
require_once("footer.php");
?>