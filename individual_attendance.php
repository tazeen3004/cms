<?php
require_once("header.php")


?>
<div id="page-wrapper" link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<div class="container-fluid">
            	<div class="row">
            		<div class="col-lg-12">
                        <h1 class="page-header">
                            Attendance
                        </h1>
                        
                    </div>
                </div>
			<?php 
$uid=$_SESSION['id'];

?> 
				<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="individual_attendance.php">Total</a></li>
  <li role="presentation"><a href="month_attendance.php?uid=<?php echo $uid;?>">Monthly</a></li>
</ul>
  
  <div class="col-lg-12">
                        <div class="table-responsive" style="height:450px;">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
									<th style="background-color: #222; color: white;font-weight: bold;text-align: center;">Date</th>
                                        <th style="background-color: #222; color: white;font-weight: bold;text-align: center;">Present Days</th>
										<th style="background-color: #222; color: white;font-weight: bold;text-align: center;">Total days</th>
										<th style="background-color: #222; color: white;font-weight: bold;text-align: center;">Percentage</th>
										
                                    </tr>
                                </thead>
                              
                                <tbody>
								 <?php
										$result = $db->query("SELECT * FROM employees WHERE uid = ':value'",['value'=>$uid])->fetch_all();
										
										
                                        foreach ($result as $result) 
                                            { 
											$total_days = $db->count('employees'," uid=$uid");
											$present_days = $db->count('employees'," uid=$uid and attendance='1'");
											$percentage= ($present_days/$total_days)*100;
											$attendance=$result['attendance'];
											$percent=($attendance/1)*100;
											?>
                                    
                                               
                                         <td style="text-align: center;"><?php  echo $result['date'];?></td>
										<?php 
										if($attendance==1)
										{
										?>
                                         <td style="text-align: center;">Present</td>
										 <?php
										}
										 else{
										 ?>
										<td style="text-align: center;">Absent</td>
										<?php
										}
										?>
										 <td style="text-align: center;">1</td>
										 <td style="text-align: center;"><?php  echo $percent?></td>
					
									</tr>
											<?php } ?>
										<tr style="background-color: #222; color: white;font-weight: bold;text-align: center;">
									<td>Total : </td>
									<td><?php echo $present_days;?></td>
									<td><?php echo $total_days;?></td>
									<td><?php echo $percentage;?>%</td>
								</tr>
								</tbody>
							</table>
						</div>
			</div>
<?php
require_once("footer.php")
?>