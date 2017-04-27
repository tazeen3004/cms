<?php
require_once("header.php")
?>
<div id="page-wrapper">
    <div class="container-fluid">
            	<div class="row">
            		<div class="col-lg-12">
                        <h1 class="page-header">
                            Offers
                        </h1> 
                    </div>
                </div>
<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="offers.php">Offers</a></li>
  <li role="presentation"><a data-toggle="modal" data-target="#myModal">Special Offers</a></li>
</ul>
<div class="media">
  <div class="media-left">
    <a href="#">
      <img class="media-object" src="M.jpg" alt="..." height="100px;" width="100px;">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><p class="text-primary">Magic Mondays</p></h4>
						<p>Buy any 2 Fried rice/Noodles & Get Rs.10 off on any juice</p>
						</div></div>
						 
						 <div class="media">
						 <div class="media-left">
    <a href="#">
      <img class="media-object" src="Tu.jpg" alt="..." height="100px;" width="100px;">
    </a>
  </div>
						<div class="media-body">
						<h4 class="media-heading"><p class="text-warning">Thoosdays</p></h4>
						<p>Buy any 2 Dosa/Uthappa & Get Rs 10 off on any soft drinks</p></div></div>
						 
						 <div class="media">
						 <div class="media-left">
    <a href="#">
      <img class="media-object" src="W.png" alt="..." height="100px;" width="100px;">
    </a>
  </div>
						
						<div class="media-body">
    <h4 class="media-heading"><p class="text-danger">Wow Wednesdays</p></h4>
						<p>Pay for 4 Dabeli/Vadapav/Samosa Pav & Get 5 </p></div>
						</div>
						
						
						
						<div class="media">
						<div class="media-left">
    <a href="#">
      <img class="media-object" src="Th.jpg" alt="..." height="100px;" width="100px;">
    </a>
  </div>
						<div class="media-body">
						<h4 class="media-heading"><p class="text-success">Triple Thursdays</p></h4>
						<p>Pay for 4 Chaat Plates & Get 5</p></div></div>
						
						<div class="media">
						<div class="media-left">
    <a href="#">
      <img class="media-object" src="F.jpeg" alt="..."  height="100px;" width="100px;">
    </a>
  </div>
  <div class="media-body">
						<h4 class="media-heading"><p class="text-info">Fantastic Fridays</p></h4>
						<p>Pay For 8 Roti/Puri & Get 2 free</p></div></div>
 
 <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Special Offers</h4>
      </div>
	  <?php
$id = $_SESSION['id'];
$result_array1 = $db->query("SELECT * FROM offers WHERE user_id = ':uid'",['uid'=>$id])->fetch_all();
  foreach ($result_array1 as $result_array1) 
                       {
						   ?>
                        
              
      <div class="modal-body">
        <p><?php echo $result_array1['offer_description'];?></p>
		
      </div> <?php
					   }
			?>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>
</div>
</div>
<?php
require_once("footer.php")
?>