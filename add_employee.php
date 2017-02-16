<?php
require_once("header.php");
$msg="";
$msg1="";
	if (isset($_POST['submit']))
	{
		$ename= $_POST['ename'];
	$contact= $_POST['contact'];
	$password = $_POST['password'];  
  $cpassword = $_POST['cpassword'];
  $etype = $_POST['etype'];   
  $salary = $_POST['salary']; 
 	if( !empty($_POST['ename']) && !empty($_POST['contact']) && !empty($_POST['password']) && !empty($_POST['cpassword']) && !empty($_POST['etype']) && !empty($_POST['salary']))
  	{
      if ($password == $cpassword)
      {  
		    $result = $db->insert('employee',['ename'=>$ename,'contact'=>$contact, 'password'=>$password, 'etype'=>$etype, 'salary'=>$salary] );
    	  header("Location: dashboard.php");
      }
      else
      {
        $msg1 = "Passwords do not match";
      }
    }
	else
	{
		$msg = "Please enter all values";
	}	 	
	}
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                 Add Employee
                </h1>                   
            </div>  
        </div>
		
		<div class="alert alert-danger"<?php if (isset($msg)){ echo 'style="display:none;"'; } ?> >
                     <?php echo $msg;?>
                </div>
				
		<form method="POST" role="form">
        <div class="form-group">
                                <label>Name :</label>
                                <input name="ename"  class="form-control" placeholder="Enter Employee Name">
                            </div>
    	
		<div class="form-group">
                                <label>Mobile No :</label>
                                <input name="contact"  class="form-control" placeholder="Enter Employee Mobile No.">
                            </div>
							<div class="form-group">
                                <label>Employee Type</label>
                                <select name="etype" class="form-control">
                                    <option value="1">Manager</option>
                                    <option value="2">Employee</option>
                                   
                                </select>
                            </div>
							<div class="form-group" >
                                <label>Password :</label>
                                <input name="password"  class="form-control" placeholder="Enter password" type="password">
                            </div>
							<div class="alert alert-danger"<?php if (isset($msg1)){ echo 'style="display:none;"'; } ?> >
                    <?php echo $msg1;?>
                </div>
							<div class="form-group">
                                <label>Confirm Password :</label>
                                <input name="cpassword"  class="form-control" placeholder="Enter the same password as above" type="password">
                            </div>
							<div class="form-group">
                                <label>Salary :</label>
                                <input name="salary"  class="form-control" placeholder="Enter Employee salary ">
                            </div>
							<button name="submit" type="submit" class="btn btn-lg btn-primary"><strong>Submit</strong></button>
     </form>                    
    </div>
</div>

<?php
require_once("footer.php")
?>