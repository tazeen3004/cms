<?php
  require_once("header.php");
?>
<div id="page-wrapper">
  <div class="container-fluid">
    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">
            Confirm order
          </h1> 
        </div>
      </div>
      
            <?php
            $msg="";
            if(isset($_COOKIE['cart']) && isset($_COOKIE['total']))
            {
              $total=$_COOKIE['total'];
              $cart =$_COOKIE['cart'];
?>
<div class="table-responsive">
        <table class="table table-hover table-striped">
          <thead>
            <tr>
              <th>Name</th>
                <th>Quantity</th>
                  <th>Price</th>
                    <th></th>
            </tr>
          </thead>
          <tbody> 


<?php
	            foreach($cart as $qty=>$mid)
	             {
		              $result = $db->query("SELECT tprice,food_name FROM menu WHERE mid = ':value'",['value'=>$mid])->fetch();
             
            ?>
            <tr>
              <td><?php echo $result['food_name'];?></td>
                <td><?php echo trim($qty,"'"); ?></td>
                  <td><?php echo $result['tprice'];?></td>
                  <td>  <a class="delete" href="cart.php?action=delete&mid=<?php echo $mid?>&qty=<?php echo trim($qty,"'")?>" ><input type="submit" class="btn btn-primary" value="Delete Product"></a>
                  </td>
                  <?php } ?>
            </tr>
          </tbody>
        </table>
     
        <div>
          <h2>Total:  <?php echo $total;?></h2>
          <input type="submit" class="btn btn-primary btn-lg" value="Confirm"> &nbsp <?php echo $msg;?>  
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
<?php
require_once("footer.php");
?>