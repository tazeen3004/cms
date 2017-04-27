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
<?php
$id = $_SESSION['id'];
$result_array1 = $db->query("SELECT * FROM offers WHERE user_id = ':uid'",['uid'=>$id])->fetch_all();
  foreach ($result_array1 as $result_array1) 
                       {
                        echo $result_array1['offer_description'];
                      }
					  ?>
					  </div>
					  </div>
<?php
require_once("footer.php")
?>