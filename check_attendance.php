<?php
require_once("header.php");
?>
<head>

<style type="text/css">
</style>
</head>
<div id="page-wrapper" link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<div class="container-fluid">
            	<div class="row">
            		<div class="col-lg-12">
                        <h1 class="page-header">
                            Attendance
                        </h1>
                        
                    </div>
                </div>
            <div class="col-lg-12">
                        <div class="table-responsive" style="height:450px;">
                            <table data-link="row" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Employee-ID</th>
                                        <th>Name</th>
                                        <th>Present days</th>
										<th>Days</th>
										<th>Percentage %</th>
                                    </tr>
                                </thead>
                              
                                <tbody>
								 <?php
										$result = $db->query("SELECT * FROM users WHERE utype = ':value'",['value'=>"2"])->fetch_all();
										
                                        foreach ($result as $result) 
                                            { 
											$uid=$result['id'];
											$result1 = $db->query("SELECT * FROM employees WHERE uid = ':value'",['value'=>$uid])->fetch_all();
											$total_days = $db->count('employees'," uid=$uid");
											$present_days =  $db->count('employees'," uid=$uid and attendance='1'");
											$percentage= ($present_days/$total_days)*100;
											
											?>
                                    
                                    <tr> 
                                               
                                         <td><a href="individual_attendance.php?uid=<?php echo $uid;?>"><?php  echo $result['id'];?></a></td>
                                         <td><a href="individual_attendance.php?uid=<?php echo $uid;?>"><?php  echo $result['uname'];?></a></td>
										 <td><a href="individual_attendance.php?uid=<?php echo $uid;?>"><?php echo $present_days;?></a></td>
										 <td><a href="individual_attendance.php?uid=<?php echo $uid;?>"><?php echo $total_days;?></a></td>
										 <td><a href="individual_attendance.php?uid=<?php echo $uid;?>"><?php echo $percentage;?> %</a></td>
									</tr>
											<?php } ?>
									
									
									
								</tbody>
							</table>
						</div>
			</div>
			
 <?php
 require_once("footer.php");
?>