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
										$result = $db->query("SELECT * FROM users WHERE utype = ':value'",['value'=>"2"])->fetch_all();
                                        foreach ($result as $result) 
                                            { 
											?>
                                    
                                    <tr>
                                                
                                         <td><?php  echo $result['id'];?></td>
                                         <td><?php  echo $result['uname'];?></td>
										 <td></td>
									</tr>
											<?php } ?>
									<tr>
										<td><b>TOTAL</b></td>
									</tr>
								</tbody>
							</table>
						</div>
			</div>
			
 <?php
 require_once("footer.php");
?>