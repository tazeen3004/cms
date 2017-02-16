<?php
include_once('config.inc.php');
include_once('Database.php');
$db = new Database(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);
?>
<?php
if(!isset($_COOKIE['cart']) && !isset($_COOKIE['total']))
{
$total=0;
}
else
{
	$total = $_COOKIE['total'];
	$cart = $_COOKIE['cart'];
}
$mid = $_GET['mid'];
$qty = $_GET['qty'];
$action = $_GET['action'];

$referer = basename($_SERVER['HTTP_REFERER']);
switch($_GET['action'])
{
	case "add":
	{		
		
		$cart[$qty]=$mid;
		$result = $db->query("SELECT tprice FROM menu WHERE mid = ':value'",['value'=>$mid])->fetch();
		$total+=$result['tprice']*$qty;
		setcookie("cart['$qty']",$mid);
		setcookie("total",$total);	

		
		break;
	}
	case "delete":
	{	
		$mid=$_GET['mid'];
		
		$total = $_COOKIE['total'];
		$result = $db->query("SELECT tprice FROM menu WHERE mid = ':value'",['value'=>$mid])->fetch();	
		$total-=$result['tprice']*$qty;
		setcookie("cart['$qty']","",time()-3600);
		setcookie("total",$total);	
		
	}
	
}
exit("<script>location.href='$referer'</script>");


?>