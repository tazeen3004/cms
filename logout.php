<?php
require_once("header.php")
?>
<?php
	session_destroy();
	header("Location: index.php");
?>

<?php
require_once("footer.php")
?>