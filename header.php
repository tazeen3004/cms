<?php
$c = mysql_connect('localhost','root','');
$db = mysql_select_db('cms');
?>
 <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rizvi College Of Engineering</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Rizvi Canteen</a>
            </div>
            
                   
               
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>    
<?php
    

    function loggedin()
    {
            if (isset($_COOKIE['uid']) && !empty($_COOKIE['uid']))
            return $_COOKIE['uid'];
            else
            return false;
    } 
             if(!loggedin())
            {    
?>
	  
                    <li>
                        <a href="charts.html"><i class="fa fa-fw fa-cutlery"></i> Menu</a>
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-fw fa-usd"></i> Offers</a>
                    </li>
              <?php
}
else      
{
                $uid =$_COOKIE['uid'];
                $query="SELECT uname,utype from users where uid='$uid'";
                $result=mysql_query($query);
                $name=mysql_result($result,0,"uname"); 
                $utype=mysql_result($result,0,"utype");

    if($utype==0)
    {
        ?>
        <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Employees</a>
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i>Daily Earning</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i>overall expenditure</a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Profit/loss</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-fw fa-wrench"></i> Logout</a>
                    </li>

<?php
    }
    elseif ($utype==1) {
        ?>
         <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i>Inventory</a>
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i>Add new customer</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i>Delete customer</a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Attendance</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-fw fa-wrench"></i> Logout</a>
                    </li>

 <?php       
    }
    elseif ($utype==2) {
        ?>
        <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i>Take a Order</a>
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i>Profile</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i>Salary</a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Attendance</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-fw fa-wrench"></i> Logout</a>
                    </li>

<?php       
    }
    else
    {



?>
  <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Balance</a>
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i> Recharge</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Transaction</a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Profile</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-fw fa-wrench"></i> Logout</a>
                    </li>
<?php
}
}
?>                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>



