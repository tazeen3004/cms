<?php
require_once("header.php")
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
                 
              <form>
                     <div class="form-group">
                     <label for="exampleInputEmail1">Enter Email </label>
                     <input type="email" class="form-control" id="exampleInputEmail1" >
                 </div>
                          <h3> OR </h3>
                     <label for="exampleInputEmail1">Enter Mobile Number </label>
                     <input type="tel" class="form-control" id="exampleInputEmail1" >
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