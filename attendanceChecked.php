<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar_att.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar_att.php'); ?>
                <div class="span9" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-reorder icon-large"></i> Attendance List</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
										<thead>
										  <tr>
												<th>Username</th>
												<th>Date/Time Checked</th>
												
												
										   </tr>
										</thead>
										<tbody>
													<?php
													$user_query = $conn->query("select * from user_log order by user_log_id DESC ")or die(mysql_error());
													while($row = $user_query->fetch()){
													$id = $row['user_log_id'];
													?>
												<tr>
												<td><?php echo $row['username']; ?></td>
												<td><?php echo $row['login_date']; ?></td>
												
												
												</tr>
												<?php } ?>
										</tbody>
									</table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>