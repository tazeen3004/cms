
<?php
require_once("header.php");
?>
<?php
$msg="";	 
	
   if(isset($_POST['submit']))
	{
		
		$connect=mysqli_connect("localhost","root");
		$uname=mysqli_real_escape_string($connect,$_POST['uname']);
		$email=mysqli_real_escape_string($connect,$_POST['email']);
		$mobile=mysqli_real_escape_string($connect,$_POST['mobile']);
		$password=mysqli_real_escape_string($connect,$_POST['password']);
		$confirmpassword=mysqli_real_escape_string($connect,$_POST['confirmpassword']);
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["uname"])) {
    $nameErr = "Name is required";
  }

	if (empty($_POST["email"])) {
		$emailErr = "Email is required";
	} 

	if (empty($_POST["mobile"])) {
		$mobileErr = "Mobile no required";
	}
	if (empty($_POST["password"])) {
    $passErr = "Password required";
	} 

	if ($_POST['password']!= $_POST['confirmpassword']) {
		$conErr= "Error... Passwords do not match";
	}
 
  
}
		mysqli_select_db($connect,"cms") or die("error");
		if(!empty($_POST['uname'])&&!empty($_POST['email'])&&!empty($_POST['mobile'])&&!empty($_POST['password'])&& $_POST['password']!= $_POST['confirmpassword'])
		{
		mysqli_query($connect,"UPDATE users SET uname='$uname', email='$email', contact='$mobile', password='$password' WHERE uid='$uid'");
		header("Location:profile.php");
		}
		mysqli_close($connect);	
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
					<form action="index.php" method="POST">
  						<div class="form-group">
       						<label for="name" style="font-size:21px;"> Full Name</label>
  							<input type="name" class="form-control" name="name" placeholder="Full name"    >
  						</div>
  						<div class="form-group">
       						<label for="contact" style="font-size:21px;">Mobile No</label>
  							<input type="contact" class="form-control" name="contact" placeholder="Mobile No"    >
  						</div>
  						<div class="form-group">
       						<label for="contact" style="font-size:21px;">Salary</label>
  							<input type="contact" class="form-control" name="salary" placeholder="Salary"    >
  						</div>
  						<div class="form-group">
       						<label for="contact" style="font-size:21px;">Password</label>
  							<input type="contact" class="form-control" name="password" placeholder="Password"    >
  						</div>
  						
  					</form>
					<input type="submit" class="btn btn-primary btn-lg" value="Add">
                </div>






     	</div>
 	</div>
</div>


<?php
require_once("footer.php");
?>