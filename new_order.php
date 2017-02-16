<?php
require_once("header.php");
?>

<div id="page-wrapper">
    <div class="container-fluid">
<!-- Page Features -->       
<?php

    $result1=$db->query("SELECT * FROM menu")->fetch_all();
    foreach ($result1 as $result1) {
        ?>
                  <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                
                                <h3><?php echo $result1['food_name']?></h3>
                        <p>₹ <?php echo $result1['tprice']?></p>
                        <form id="cart_form<?php echo $result1['mid']?>" action="cart.php" method="get">
                        <select id="selectqty" name="qty">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        </select>
                        <input type="hidden" name="mid" value="<?php echo $result1['mid']; ?>" />
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