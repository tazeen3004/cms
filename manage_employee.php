<?php
require_once("header.php")
?>
	<div id="page-wrapper">

            <div class="container-fluid">
            	<div class="row">
            		<div class="col-lg-12">
                        <h1 class="page-header">
                            Manage Employee
                        </h1>
                        
                    </div>
                </div>

		                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div button type="button" class="btn btn-lg btn-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-plus fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">ADD</div>
                                        <div>New Employee</div>
                                    </div>
                                </div>
                            </div>
                            <a href="add_employee.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Add!</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div button type="button" class="btn btn-lg btn-danger">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-trash fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Delete</div>
                                        <div>Employee</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div button type="button" class="btn btn-lg btn-warning">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Check</div>
                                        <div>Attendance</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div button type="button" class="btn btn-lg btn-success">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-inr fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Update</div>
                                        <div>Salary</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->




<?php
require_once("footer.php")
?>