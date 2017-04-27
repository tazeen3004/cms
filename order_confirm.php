<?php
  require_once("header.php");
?>
<div id="page-wrapper">
  <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">
            Confirm order
          </h1> 
        </div>
      </div>
      
            <?php
            $uid=$_GET['uid'];
            
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
                <th>Quantity</th>
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
                <td><?php echo $result_array['quantity'];?></td>
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
<?php
require_once("footer.php");
?>