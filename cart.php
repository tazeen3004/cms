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
	$oid = $_COOKIE['oid'];
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
		$result = $db->query("SELECT amount FROM item WHERE id = ':value'",['value'=>$mid])->fetch();
		$tot=$result['amount']*$qty;
		$amount=$result['amount'];
		$total+=$result['amount']*$qty;
		$result = $db->insert('item_order',['order_id'=>$oid,'item_id'=>$mid, 'amount'=>$amount, 'quantity'=>$qty, 'total_amount'=>$tot]);
		setcookie("cart['$qty']",$mid);
		setcookie("total",$total);	
		break;
	}
	case "delete":
	{	
		$mid=$_GET['mid'];
		$total = $_COOKIE['total'];
		$result = $db->query("SELECT * FROM item_order WHERE id = ':value' AND item_id=':value2'",['value'=>$oid, 'value2'=>$mid])->fetch();	
		echo $total;
		echo $result;
		$total-=$result['total_amount']*$qty;
		echo $total;
		$result = $db->delete('item_order'," item_id=$mid && order_id=$oid ");
		setcookie("total",$total);	
		
	}
	
}
exit("<script>location.href='$referer'</script>");


?>