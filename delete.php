<?php
include_once('config.inc.php');
include_once('Database.php');
$db = new Database(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);
?>
<?php
$id=$_GET['iid'];
			$result = $db->delete('inventory'," iid = $id ");
			header("Location: inventory.php");




?>