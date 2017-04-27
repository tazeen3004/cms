<?php
include_once('config.inc.php');
include_once('Database.php');
$db = new Database(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);
?>

<?php
$uid=$_GET['uid'];
$credit=0;
$total=$_COOKIE['total'];
$oid=$_COOKIE['oid'];
            $debit=0;
                     $result_array1 = $db->query("SELECT * FROM transaction WHERE user_id = ':uid'",['uid'=>$uid])->fetch_all();
  
                foreach ($result_array1 as $result_array1)
                 {
                    if ($result_array1['type']=="debit")
                    {
                    $debit += $result_array1['amount'];
                  
                   }
                 
                 else
                 {
                     $credit += $result_array1['amount'];
                 }
               }
               $balance = $credit-$debit;
             
               if($total>$balance)
               {
                 $msg="no sufficient balance";

               }
               else
               {
                
                $result = $db->insert('transaction',['amount'=>$total,'type'=>'debit', 'user_id'=>$uid]);

               }
       $cart =$_COOKIE['cart'];
foreach($cart as $mid => $qty)
        {
    setcookie("cart['$mid']","",time()-3600);
}
              setcookie("total","",time()-3600);
              setcookie("oid","",time()-3600);
			   header("Location: user_balance.php");
            ?>