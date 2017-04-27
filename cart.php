<?php
include_once('config.inc.php');
include_once('Database.php');
$db = new Database(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);
?>
<?php
if(!isset($_COOKIE['total']))
{
$total=0;
}
else
{
	$total = $_COOKIE['total'];
	
}
$mid = $_GET['mid'];

$action = $_GET['action'];
$oid = $_COOKIE['oid'];
$referer = basename($_SERVER['HTTP_REFERER']);

switch($_GET['action'])
{
	case "add":
	{		
		$qty = 1;		
		$result = $db->query("SELECT amount FROM item WHERE id = ':value'",['value'=>$mid])->fetch();
		$tot=$result['amount']*$qty;
		$amount=$result['amount'];
		$total+=$result['amount']*$qty;
		$result = $db->insert('item_order',['order_id'=>$oid,'item_id'=>$mid, 'amount'=>$amount, 'quantity'=>$qty, 'total_amount'=>$tot]);
		setcookie("total",$total);	
		setcookie("cart['$mid']",$result);
		break;
	}
	case "delete":
	{	
		$total = $_COOKIE['total'];
		$cart=$_COOKIE['cart'];
		$result=$cart["'".$mid."'"];
		$result1 = $db->query("SELECT total_amount FROM item_order WHERE id = ':value'",['value'=>$result])->fetch();
		$total-=$result1['total_amount'];		
		$result = $db->delete('item_order'," item_id=$mid && order_id=$oid ");
		setcookie("total",$total);
		setcookie("cart['$mid']","",time()-3600);	

		
	}
	
}
	
exit("<script>location.href='$referer'</script>");


?>