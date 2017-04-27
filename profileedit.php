<?php
require_once("header.php");
?>
<?php
	$uid=$_SESSION['id'];
	$result = $db->query("SELECT * FROM users WHERE id = ':uid'",['uid'=>$uid])->fetch();
?>
<?php
	$nameErr = $emailErr = $mobileErr = $passErr = $conErr ="";	 
	
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
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                 Profile
                </h1>                   
            </div> 
        </div>
		<form method="POST" role="form">
        <div class="form-group">
                                <label>Name :</label><?php echo $nameErr;?>
                                <input name="uname"  class="form-control" placeholder="Enter your Name">
                            </div>
    	<div class="form-group">
                                <label>Email :</label><?php echo $emailErr;?>
                                <input name="email"  class="form-control" placeholder="Enter your Email-id ">
                            </div>
		<div class="form-group">
                                <label>Mobile No :</label><?php echo $mobileErr?>
                                <input name="mobile"  class="form-control" placeholder="Enter your Mobile No.">
                            </div>
							<div class="form-group">
                                <label>Password :</label><?php echo $passErr?>
                                <input name="password"  class="form-control" placeholder="Enter password" type="password">
                            </div>
							<div class="form-group">
                                <label>Confirm Password :</label><?php echo $conErr?>
                                <input name="confirm password"  class="form-control" placeholder="Enter the same password as above" type="password">
                            </div>
							<button name="submit" type="submit" class="btn btn-lg btn-primary"><strong>Submit</strong></button>
     </form>                    
    </div>

<?php
require_once("footer.php");
?>