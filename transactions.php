<?php
require_once("header.php")
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                 Transactions
                </h1>
                        
            </div>
        </div>
        <?php
            $uid =$_SESSION['id'];
            $result_array = $db->query("SELECT * FROM orders WHERE user_id = ':uid'",['uid'=>$uid])->fetch_all();

        ?>
		<br>
		
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-file fa-fw"></i> Order History </h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Order #</th>
                                        <th>Order Date</th>
                                        <th>Item Name</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $total=0; 
                                        foreach ($result_array as $result_array) 
                                            {
  

                                                $oid=$result_array['id'];
												
                                                $result_array1 = $db->query("SELECT * FROM item_order WHERE order_id = ':oid'",['oid'=>$oid])->fetch_all();
                                                foreach ($result_array1 as $result_array1)
                                                 {
                                           
                                                $iid=$result_array1['item_id'];
                                                $result2 = $db->query("SELECT * FROM item WHERE id = ':iid'",['iid'=>$iid])->fetch();

                                                 
                                    ?>
                                    <tr>
                                        <td><?php echo $oid;?></td>
                                        <td><?php echo $result_array['order_ts']?></td>
                                        <td><?php echo $result2['item_name'];?></td>
                                        <td><?php echo $result_array1['total_amount']?></td>                                                          
                                    </tr>
                                    <?php
                                }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
         
		<div class="col-lg-6">
       <div class="panel panel-default">
                    <div class="panel-heading">
                     <a href="gr_customer.php">   <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions </h3></a>
                    </div>
                    <div class="panel-body">
        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Transaction#</th>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        
                                                $result_array3 = $db->query("SELECT * FROM transaction WHERE user_id = ':uid'",['uid'=>$uid])->fetch_all();
                                                foreach ($result_array3 as $result_array3)
                                                 {   
                                    ?>
                                    <tr>
                                        <td><?php echo $result_array3['id'];?></td>
                                        <td><?php echo $result_array3['transaction_ts']?></td>
                                        <td><?php echo $result_array3['type'];?></td>
                                        <td><?php echo $result_array3['amount']?></td>                                                          
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
<?php
require_once("footer.php")
?>