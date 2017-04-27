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
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Quantity available</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        
                                        foreach ($result_array as $result_array) 
                                            {
                                                $bought=0;
                                                $consumed=0;
                                                $qty_available=12;   
                                              $result_array1 = $db->query("SELECT * FROM inventory_log WHERE inventory_id = ':value'",['value'=>$result_array['id']])->fetch_all();
                                              foreach ($result_array1 as $result_array1) 
                                              {
                                                    if ($result_array1['type']=='bought')
                                                    {
                                                        $bought += $result_array1['quantity'];
                                                    }    
                                                    else
                                                    {
                                                        $consumed +=$result_array1['quantity'];
                                                    }
                                                    $qty_available = $bought-$consumed;
                                              }
                                    ?>
                                    <tr>
                                        <td><?php echo $result_array['id'];?></td>
                                        <td><?php echo $result_array['inventory_name'];?></td>
                                        <td><?php echo $qty_available;?></td>
                                         <td><a class="update" href="inventory_update.php?id=<?php echo $result_array['id']?>"> <input type="submit" class="btn btn-primary" value="Update"></a>
        </td>
                                        <td><a class="delete" href="delete.php?value=0&id=<?php echo $result_array['id']?>"> <input type="submit" class="btn btn-primary" value="Delete"></a>
        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <a href="add_item.php"><input type="submit" class="btn btn-primary btn-lg" value="Add"> </a>
                            <a href="inventory_log.php"><input type="submit" class="btn btn-primary btn-lg" value="View log"> </a>

                        </div>
                    </div>
                </div>
                <!-- /.row -->
<?php
require_once("footer.php")
?>