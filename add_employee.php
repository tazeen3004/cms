
<?php
require_once("header.php");
?>
<script>
$('#myform').validator()
</script>
<?php
$msg="Employee Added";	 
	
   if (isset($_POST['name'])&& isset($_POST['contact']) && isset($_POST['password']) && isset($_POST['cpassword']) && isset($_POST['utype']) )
 {
 	$uname= $_POST['name'];
	$contact= $_POST['contact'];
	$password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $utype = $_POST['utype'];
  $cardno = $_POST['cardno'];
 	if( !empty($_POST['name']) && !empty($_POST['contact']) && !empty($_POST['password']) && !empty($_POST['cpassword']) && !empty($_POST['utype']))
  	{
      if ($password == $cpassword)
      {
		    $result = $db->insert('users',['uname'=>$uname,'contact'=>$contact, 'password'=>$password, 'utype'=>$utype]);
    	 header("Location: dashboard.php");
      }
      else
      {

  }
    }

}





?>
<div id="page-wrapper">
    <div class="container-fluid">
		<div id="page-wrapper">
            <div class="container-fluid">
            	<div class="row">
            		<div class="col-lg-12">
                        <h1 class="page-header">
                            Add Employee
                        </h1> 
                    </div>
                </div>
					<div class="jumbotron">
					<form data-toggle="validator" role="form" action="add_employee.php" method="POST">
  						<div class="form-group">
       						<label for="inputName" class="control-label"  style="font-size:21px;"> Name</label>
  							<input type="text" class="form-control" name="name" placeholder="name", required>
  						</div>
  						<div class="form-group">
       						<label for="quantity" style="font-size:21px;">Mobile No</label>
  							<input type="contact" class="form-control" name="contact" placeholder="mobile no", required>
  						</div>
              <div class="form-group">
            <label for="exampleInputPassword1" style="font-size:21px;">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password", required>
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1" style="font-size:21px;">Confirm Password</label>
            <input type="password" class="form-control" name="cpassword" placeholder=" Confirm Password", required>
            </div>

            <div class="form-group">
            <label for="exampleInputPassword1" style="font-size:21px;">User Type</label>
            <input type="type" class="form-control" name="utype" placeholder="type", required>
            </div>



  					<input type="submit" class="btn btn-primary btn-lg" value="Add Customer">
  					</form>

                </div>
     	</div>



     	</div>
 	</div>
</div>


<?php
require_once("footer.php");
?>