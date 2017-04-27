<?php
require_once("header.php")
?>
<?php
if (isset($_POST['contact'],$_POST['email']) && !empty($_POST['contact']) && !empty($_POST['email']))
  {
    $contact = $_POST['contact'];
    $email  = $_POST['email'];
    $result = $db->query("SELECT * FROM users WHERE contact = ':contact'",['contact'=>$contact])->fetch();
    $password=$result['password'];
	$subject = "Your Recovered Password";

$message = "Please use this password to login " . $password;
$headers = "From : dani.020196@gmail.com";
if(mail($email, $subject, $message, $headers)){
	echo "Your Password has been sent to your email id";
}else{
	echo "Failed to Recover your password, try again";
}
  }
?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Reset Password
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->

                <!-- Main jumbotron for a primary marketing message or call to action -->
                <div class="jumbotron">
                 
              <form method="POST">
                     <div class="form-group">
                     <label for="exampleInputEmail1">Enter Email </label>
                     <input name="email" type="email" class="form-control" id="exampleInputEmail1" >
                 </div>
                          <h3> OR </h3>
                     <label for="exampleInputEmail1">Enter Mobile Number </label>
                     <input name="contact" type="tel" class="form-control" id="exampleInputEmail1" >
                </div>
                    <button type="submit" class="btn btn-primary">Send verfication code</button>  
            </form>
                </div>
              
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php
require_once("footer.php")
?>