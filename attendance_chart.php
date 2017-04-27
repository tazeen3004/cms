<?php
require_once("header.php");
?>
<?php 
$uid=$_SESSION['id'];
?> 

<div id="page-wrapper" link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<div class="container-fluid">
     <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i>Attendance</h3>
                            </div>
                            <div class="panel-body">
                               <div id="myfirstchart" ></div>
                            </div>
                        </div>
                    </div>
                </div>
                        
                          
                              
        
</div>
</div>

<link href="css/plugins/morris.css" rel="stylesheet">
 <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
	<script>
new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  <?php
  $result = $db->query("SELECT * FROM employees WHERE uid = ':value'",['value'=>$uid])->fetch_all();
  ?>
  
  data: [
  <?php
 foreach ($result as $result) 
                                            { 
											$total_days = $db->count('employees'," uid=$uid");
											$present_days =  $db->count('employees'," uid=$uid and attendance='1'");
											$percentage= ($present_days/$total_days)*100;
											$attendance=$result['attendance'];
											$percent=($attendance/1)*100;
											?>
  
  
  
    { y:'<?php echo $result['id'];?>', value:<?php echo $percent;?>},
   
 
  <?php
	}
	?>	
 ],	
  // The name of the data record attribute that contains x-values.
  xkey: ['y'],
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
});
</script>

<?php
require_once("footer.php");
?>