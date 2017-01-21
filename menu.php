<?php
require_once("header.php");
?>
<div id="page-wrapper">
    <div class="container-fluid">
<!-- Page Features -->       
<?php
    $uid=$_SESSION['uid'];
    $result = $db->query("SELECT * FROM users WHERE uid = ':uid'",['uid'=>$uid])->fetch();
    $result1=$db->query("SELECT * FROM menu")->fetch_all();
    foreach ($result1 as $result1) {
    if($result['utype']==3)
    {
        ?>
                  <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                
                                <h3><?php echo $result1['food_name']?></h3>
                        <p>₹ <?php echo $result1['tprice']?></p>
                            </div>
                        </div>
                    </div>
    <?php
    }
    
    else
    {
        ?>
                 <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                
                                <h3><?php echo $result1['food_name']?></h3>
                        <p>₹ <?php echo $result1['sprice']?></p>
                            </div>
                        </div>
                    </div>
<?php
    }
   } 
?>


        
    </div>
</div>
<?php
require_once("footer.php");
?>