<?php
require_once("header.php");
?>
<div id="page-wrapper">
    <div class="container-fluid">
<!-- Page Features -->       
<?php

    $result1=$db->query("SELECT * FROM item")->fetch_all();
    foreach ($result1 as $result1) {
   
        ?>
                  <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo $result1['item_name']; ?>.jpg" height="400" width="400" alt="">

                            <div class="caption">
                                
                                <h3><?php echo $result1['item_name']?></h3>
                        <p>₹ <?php echo $result1['amount']?></p>
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