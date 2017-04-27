<?php
include_once('config.inc.php');
include_once('Database.php');
$db = new Database(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);
?>
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
    <link rel="stylesheet" type="text/css" href="css/search.css">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/toggle-switch.css" rel="stylesheet" type="text/css">
	<link href="css/sweetalert.css" rel="stylesheet" type="text/css">

	<script src="js/validator.js"> </script>
	<script src="js/validator.min.js"> </script>
    <script src="js/sweetalert.min.js"> </script>
	<script src="js/jquery-1.11.3.min.js"> </script>
	
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
-->

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
                <a class="navbar-brand" href="index.php">Rizvi Canteen</a>
            </div>
            

<?php
    

    function loggedin()
    {
            if (!empty($_SESSION['id']))
            return $_SESSION['id'];
            else
            return false;
    } 
             if(!loggedin())
            {    
?>
	   <ul class="nav navbar-right top-nav"  style="color:white;" link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
           <li>   <h5><i class="fa fa-user"></i><a href="index.php"> Login <br></a></h5> <li>

                   
               
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">

                 <ul class="nav navbar-nav side-nav">


                    <li>
                        <a href="menu.php"><i class="fa fa-fw fa-cutlery"></i> Menu</a>
                    </li>
                    <li>
                        <a href="offers.php"><i class="fa fa-fw fa-usd"></i> Offers</a>
                    </li>
              <?php
}
else      
{
    $uid =$_SESSION['id'];
               $result = $db->findByCol('users','id',$uid);
    ?>
     <ul class="nav navbar-right top-nav"  style="color:white;" link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
         <li>   <h5> <i class="fa fa-user"></i>&nbsp;<?php echo $result['uname']?> &nbsp;&nbsp; <h5> <li>
		 

                   
               
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">

                 <ul class="nav navbar-nav side-nav">

           
                    <li>
                        <a href="dashboard.php"><i class="fa fa-fw fa-dashboard" link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"></i> Dashboard</a>
                    </li>    
    <?php
               
    

    if($result['utype']==0)
    {
        ?>
				
                    <li>
                        <a href="inventory.php"link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"><i class="fa fa-fw fa-table"></i> Inventory</a>
                    </li>
                    
                     <li>
                        <a href="profile.php"link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="logout.php" link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"><i class="fa fa-fw fa-power-off"></i> Logout</a>
                    </li>

<?php
    }
    elseif ($result['utype']==1) {
        ?>
         <li>
                        <a href="inventory.php"link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"><i class="fa fa-fw fa-bar-chart-o"></i> Inventory</a>
                    </li>
                   
                    <li>
                        <a href="profile.php"link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"><i class="fa fa-fw fa-edit"></i> Profile</a>
                    </li>
                    <li>
                        <a href="logout.php"link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"><i class="fa fa-fw fa-power-off"></i> Logout</a>
                    </li>

 <?php       
    }
    elseif ($result['utype']==2) {
        ?>
                    
                    
                   
                    <li>
                        <a href="individual_attendance.php" link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"><i class="fa fa-fw fa-calendar"></i> Attendance</a>
                    </li>
                    <li>
                        <a href="profile.php" link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"><i class="fa fa-fw fa-edit"></i> Profile</a>
                    </li>
                    <li>
                        <a href="logout.php" link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"><i class="fa fa-fw fa-power-off"></i> Logout</a>
                    </li>

<?php       
    }
    else
    {



?>
                    <li>
                        <a href="transactions.php" link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"><i class="fa fa-fw fa-history"></i> Transaction</a>
                    </li>
                     <li>
                        <a href="menu.php" link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"><i class="fa fa-fw fa-list"></i> Menu</a>
                    </li>
                    <li>
                        <a href="profile.php" link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"><i class="fa fa-fw fa-edit"></i> Profile</a>
                    </li>
                    <li>
                        <a href="logout.php" link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"><i class="fa fa-fw fa-power-off"></i> Logout</a>
                    </li>
<?php
	}
}
?>                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>


