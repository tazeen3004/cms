<?php
include_once('config.inc.php');
include_once('Database.php');
$db = new Database(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);
//$uid=false;
if(isset($_GET['uid']))
{
$uid = $_GET['uid'];
}
//$eid=false;
if(isset($_SESSION['id'])){
$eid= $_SESSION['id'];
}
if(!isset($_COOKIE['oid']))
{
$result = $db->insert('orders',['user_id'=>$uid,'employee_id'=>$eid]);
$o = $result;
echo $o;
setcookie("oid",$o);

}
else
{
	echo "inside elses";
    $oid = $_COOKIE['oid'];
}


?>