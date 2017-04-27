<?php
require_once("header.php");
?>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="monthpicker.css" rel="stylesheet" type="text/css">
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
				<?php 
$uid=$_GET['uid'];



?> 
				<ul class="nav nav-tabs">
  <li role="presentation" ><a href="individual_attendance.php?uid=<?php echo $uid;?>">Total</a></li>
  <li role="presentation" class="active"><a href="month_attendance.php">Monthly</a></li>
</ul>
<form method="POST">
<input name="date" id="demo-1" type="text" />
<input name="submit" type="submit" class="btn btn-lg btn-primary" value="Submit">
</form>

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
										if(isset($_POST['submit']))
{
$date=$_POST['date'];
$thedate = explode("/", $date);
$month = $thedate[0];
										$i=0;
										
										$j=0;
                                        foreach ($result as $result) 
                                            { 
											$date1=$result['date'];
											$thedate1 = explode("-", $date1);
											$month1 = $thedate1[1];
											
											if($month1==$month)
											{
											$i=$i+1;
											
											$percentage= ($j/$i)*100;
											$attendance=$result['attendance'];
											$percent=($attendance/1)*100;
											
											?>
                                    
                                               
                                         <td style="text-align: center;"><?php  echo $result['date'];?></td>
										<?php 
										
										if($attendance==1)
										{
										$j++;
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
											<?php }} ?>
										<tr style="background-color: #222; color: white;font-weight: bold;text-align: center;">
									<td>Total : </td>
									<td><?php echo $j;?></td>
									<td><?php echo $i;?></td>
									<td><?php if(isset($percentage))echo $percentage;?>%</td>
								</tr><?php }?>
								</tbody>
							</table>
						</div>
			</div>
</div>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="monthpicker.min.js"></script>
<script>
$('#demo-1').Monthpicker();
$('#startDate').Monthpicker({
        onSelect: function () {
            $('#endDate').Monthpicker('option', { minValue: $('#startDate').val() });
        }
    });
    $('#endDate').Monthpicker({
        onSelect: function () {
            $('#startDate').Monthpicker('option', { maxValue: $('#endDate').val() });
        }
    });
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<?php
require_once("footer.php")
?>