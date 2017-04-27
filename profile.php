<?php
require_once("header.php");
?>

<?php
	$uid=$_SESSION['id'];
	    $result = $db->query("SELECT * FROM users WHERE id = ':uid'",['uid'=>$uid])->fetch();
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                 Profile
                </h1>                   
            </div>
        </div>
        <div class="panel-body" id="profile">
        	<div class="text-right">
 			<a href="profileedit.php"><button class="btn btn-primary btn-lg " ><span class="glyphicon glyphicon-pencil" aria-hidden="true" style="margin-right:5px"></span> &nbsp;Edit &nbsp;</button></a>
  			</div>
  			<br>
  			<div id="saved">
    			<div class="row">
    				<div class="alert alert-info">
                    	<strong>Name : </strong> <?php echo $result['uname'];?>.
                	</div>
    			</div>
    			<div class="row">
    				<div class="alert alert-info">
                    	<strong>Email : </strong> <?php echo $result['email'];?>.
                	</div>
    			</div>
    			<div class="row">
    				<div class="alert alert-info">
                    	<strong>Mobile No : </strong> <?php echo $result['contact'];?>.
                	</div>
    			</div>
    			<div class="row">
    				<div class="alert alert-info">
                    	<strong>Do you want to Change password </strong><a href="change_password.php">click here?</a>
                	</div>
    			</div>
    		</div>	
    	</div>
    	
    </div>
<?php
require_once("footer.php");
?>	