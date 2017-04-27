<?php 
include_once('config.inc.php');
include_once('Database.php');
$db = new Database(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);                
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');
$id=$_SESSION['id'];
$datay1 = array();
$datay2 = array();
$result_array1 = $db->query("SELECT * FROM transaction WHERE user_id = ':uid'",['uid'=>$id])->fetch_all();
            foreach ($result_array1 as $result_array1)
                 {
                    if ($result_array1['type']=="debit")
                    {
                    array_push($datay1,$result_array1['amount']);
                    
                   }
                 
                 else
                 {
                     array_push($datay2,$result_array1['amount']);
                 }
               }

// content="text/plain; charset=utf-8"



// Setup the graph
$graph = new Graph(800,800);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Filled Y-grid');
$graph->SetBox(false);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);
$graph->yaxis->SetTickLabels(array(200,400,600,800,1000,1200,1400,1600,1800,1900,2000,2200,2400,2600,2800,3000));

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels(array('1/15','2/15','3/15','4/15','5/15','6/15','7/15','8/15','9/15','10/15','11/15','12/15','1/16','2/16','3/16','4/16','5/16','6/16','7/16','8/16','9/16','10/16','11/16','12/16','1/17','2/17','3/17','4/17','5/17','6/17','7/17','8/17','9/17', ));
$graph->xgrid->SetColor('#E3E3E3');
// Create the first line
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend('Line 1 Expenditure');
$p2 = new LinePlot($datay2);
$graph->Add($p2);
$p2->SetColor("#FF1493");
$p2->SetLegend('Line 2 Recharge');
// Output line
$graph->Stroke();
?>

