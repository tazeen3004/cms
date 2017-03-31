<?php
require_once("header.php");
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
<form method="POST">
            <div class="col-lg-12">
                        <div class="table-responsive" style="height:470px; overflow-y:auto;">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Employee-ID</th>
                                        <th>Name</th>
                                        <th>Attendance</th>
                                    </tr>
                                </thead>
                              
                                <tbody>
								 <?php
										$result = $db->query("SELECT * FROM employees")->fetch_all();
                                        foreach ($result as $result) 
                                            { 
											?>
                                    
                                    <tr>
                                                
                                         <td><?php  echo $result['eid'];?></td>
                                         <td><?php  echo $result['name'];?></td>
                                        <td><label class="switch">
		<input type="hidden" name="attend"	value="0"/>							
      <input type="checkbox" name="attend" value="1"/>
	  <div class="slider round">
                                    <?php 
									$att=$result['attendance'];
									
									switch($_POST['attend'])
{
									case 0:
									$att=$att+0;
									break;
									
									case 1:
									$att=$att+1;
									break;
									
									
									
}	
									} ?>
                               </div>
                                           
                                      </tr> 
                                </tbody>
                            </table>
                            <input name="submit" type="submit" class="btn btn-lg btn-primary" value="Submit">
                            </form>
							<?php
							$result = $db->query("SELECT * FROM employees")->fetch_all();
							if(isset($_POST['submit']))
{

	$eid=$result['eid']; foreach($eid as $result['eid']) {
$result1 = $db->update('employees',['attendance'=>$att]," eid = $eid"); }
	}

?>
                        </div>
                    </div>
    <?php
    require_once("footer.php");
?>