<?php
require_once("header.php")
?>
<?php
	setcookie("uid");
	header("Location: index.php");
?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Logout
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->

                <!-- Main jumbotron for a primary marketing message or call to action -->
                <div class="jumbotron">
                 
                    <p>You have logged out successfully</p>
                    <p><a href="login.php" class="btn btn-primary btn-lg" role="button">Login again</a>
                    </p>
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