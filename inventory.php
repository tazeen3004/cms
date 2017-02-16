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
            $uid =$_SESSION['uid'];
            $result_array = $db->query("SELECT * FROM inventory")->fetch_all();
        ?>
				  <div>
                        <h2>Grocery</h2>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity available</th>
                                        <th>Quantity used</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        
                                        foreach ($result_array as $result_array) 
                                            {
                                                
                                    ?>
                                    <tr>
                                        <td><?php echo $result_array['iname'];?></td>
                                        <td><?php echo $result_array['qty_avail'];?></td>
                                        <td><?php echo $result_array['qty_used'];?></td>
                                        <td><?php echo $result_array['price'];?></td>
                                        <td><a class="delete" href="delete.php?iid=<?php echo $result_array['iid']?>"> <input type="submit" class="btn btn-primary" value="Delete Product"></a>
        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <a href="add_item.php"><input type="submit" class="btn btn-primary btn-lg" value="Add"> </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
<?php
require_once("footer.php")
?>