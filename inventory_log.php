<?php
require_once("header.php")
?>
<div id="page-wrapper">

            <div class="container-fluid">
            	<div class="row">
            		<div class="col-lg-12">
                        <h1 class="page-header">
                            Inventory
                        </h1>   
                    </div>
                </div>
        <?php
            $uid =$_SESSION['id'];
            
            $result_array = $db->query("SELECT * FROM inventory")->fetch_all();
        ?>
				  <div>
                        <h2>Grocery</h2>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Timestamp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        
                                        foreach ($result_array as $result_array) 
                                            {
                                                  
                                              $result_array1 = $db->query("SELECT * FROM inventory_log WHERE inventory_id = ':value'",['value'=>$result_array['id']])->fetch_all();
                                              foreach ($result_array1 as $result_array1) 
                                              {
                                              
                                    ?>
                                    <tr>
                                        <td><?php echo $result_array['inventory_name'];?></td>
                                        <td><?php echo $result_array1['type'];?></td>
                                        <td><?php echo $result_array1['amount'];?></td>
                                        <td><?php echo $result_array1['inventory_ts'];?></td>

                                       
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
                <!-- /.row -->
<?php
require_once("footer.php")
?>