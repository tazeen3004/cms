
<?php

require_once("header.php");

?>
<?php
$msg="";
  if (isset($_POST['contact'],$_POST['password']) && !empty($_POST['contact']) && !empty($_POST['password']))
  {
    $contact = $_POST['contact'];
    $password  = $_POST['password'];
    $result = $db->query("SELECT * FROM users WHERE contact = ':contact' AND password = ':password'",['contact'=>$contact,'password'=>$password])->fetch();
    
  }
  if (isset($result))
  {
    if(count($result)==0)
      $msg =  "Invalid Mobile Number/Password";
    else
    {
      if(isset($_POST['remember_me']) && !empty($_POST['remember_me']) && $_POST['remember_me'] == "1")
      {
	
        $exp_time = time()+60*60*24*30;
      }
      else
      {
        $exp_time = 0;
      }
      //setcookie("uid",mysql_result($result, 0,'uid'),$exp_time);
      //exit("<script>location.href = 'users.php'</script>");
        $_SESSION['uid'] = $result['uid'];
        header("Location: dashboard.php");
    }
}
?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Login
               
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
				<div class="jumbotron">
					<form action="index.php" method="POST">
  					<div class="form-group">
       				<label for="contact" style="font-size:21px;">Mobile No</label>
  					<input type="contact" class="form-control" name="contact" placeholder="Mobile No"    >
  					</div>
  					<div class="form-group">
    				<label for="exampleInputPassword1" style="font-size:21px;">Password</label>
    				<input type="password" class="form-control" name="password" placeholder="Password">
  					</div>
  					<div class="etc-login-form">
					<p>forgot your password? <a href="forgot_password.php">click here</a></p>
				
  					<div class="form-group login-group-checkbox">
						<input type="checkbox" id="lg_remember" name="lg_remember" value="1">
						<label for="lg_remember" style="font-size:21px;">Remember me</label>
					</div>
  </form>
					<input type="submit" class="btn btn-primary btn-lg" value="Sign in">
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->







<?php
require_once("footer.php");
?>