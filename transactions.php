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
            $uid =$_SESSION['uid'];
            $result_array = $db->query("SELECT * FROM orders WHERE uid = ':uid'",['uid'=>$uid])->fetch_all();
        ?>
        <div class="row">
            <div class="col-lg-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions </h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Order #</th>
                                        <th>Order Date</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $total=0; 
                                        foreach ($result_array as $result_array) 
                                            {
                                                $total +=  $result_array['amount']; 
                                    ?>
                                    <tr>
                                        <td><?php echo $result_array['oid'];?></td>
                                        <td><?php echo $result_array['date']?></td>
                                        <td><?php echo $result_array['amount']?></td>                                                          
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
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Expenditure</h3>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                            <label class="list-group-item">
                                <span class="badge">₹ <?php echo "3232" ?></span>
                                 Today 
                            </label>
                        </div>
                        <div class="list-group">
                            <label class="list-group-item">
                                <span class="badge">₹ <?php echo "3232" ?></span>
                                 This week
                            </label>
                        </div>
                        <div class="list-group">
                            <label class="list-group-item">
                                <span class="badge">₹ <?php echo "3232" ?></span>
                                 This Month
                            </label>
                        </div>
                        <div class="list-group">
                            <label class="list-group-item">
                                <span class="badge">₹ <?php echo $total; ?></span>
                                 Overall
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
<?php
require_once("footer.php")
?>