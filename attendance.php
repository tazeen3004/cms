<?php
require_once("header.php");
?>
<head>
<script> 
 
 $(document).ready(function(){
  $('#form1').on('submit',function(e) {  //Don't foget to change the id form
  $.ajax({
//===PHP file name====
      data:$(this).serialize(),
      type:'POST',
      success:function(data){
        console.log(data);
        //Success Message == 'Title', 'Message body', Last one leave as it is
	    swal("¡Success!", "Message sent!", "success");
      },
      error:function(data){
        //Error Message == 'Title', 'Message body', Last one leave as it is
	    swal("Oops...", "Something went wrong :(", "error");
      }
    });
    e.preventDefault(); //This is to Avoid Page Refresh and Fire the Event "Click"
  });
});
  </script>
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
<form id="#form1" method="POST">
<div class="form-group has-success col-lg-2">
                                <h4><label class="control-label" for="inputSuccess">Date</label></h4>
                                <input type="date" name="date" class="form-control" id="inputSuccess">
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
                                        <td><label class="switch">	
	<input type="hidden" name="attend[<?php echo $result['id']?>]" value="0"/>
      <input type="checkbox" name="attend[<?php echo $result['id']?>]" value="1"/>
<div class="slider round">
                                    <?php 
									
									} ?>
                               
                                    </div>       
                                      </tr> 
                                </tbody>
                            </table>
                            <input onclick="swal()" name="submit" type="submit" class="btn btn-lg btn-primary" value="Submit">
                            </form>
							
							<?php
						
							if(isset($_POST['submit']))
							{
							
								$date=$_POST['date'];
								$array=$_POST['attend'];
								$result = $db->query("SELECT * FROM users WHERE utype = ':value'",['value'=>"2"])->fetch_all();
								foreach($_POST['attend'] as $uid=>$val)
								{
									$result = $db->insert('employees',['uid'=> $uid, 'attendance'=> $val, 'date'=>$date]);	
								}
								//exit("<script>location.href='dashboard.php'</script>");
							}

?>
                        </div>
                    </div>
    <?php

    require_once("footer.php");
?>