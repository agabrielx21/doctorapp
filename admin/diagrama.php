
<?php
include "../db_conn.php";
require '../jpgraph/jpgraph/src/jpgraph.php';
require '../jpgraph/jpgraph/src/jpgraph_pie.php';
require '../jpgraph/jpgraph/src/jpgraph_pie3d.php';
require '../jpgraph/jpgraph/src/jpgraph_line.php';
require '../jpgraph/jpgraph/src/jpgraph_bar.php';

$roleAdmin = "ADMIN";
$roleDoctor = "DOCTOR";
$roleUser = "USER";
$stmt = mysqli_prepare($conn, "SELECT * FROM USERS where role=?");
mysqli_stmt_bind_param($stmt,"s", $roleAdmin);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$cntAdmin = mysqli_num_rows($result);

$stmt = mysqli_prepare($conn, "SELECT * FROM USERS where role=?");
mysqli_stmt_bind_param($stmt,"s", $roleDoctor);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$cntDoctor = mysqli_num_rows($result);

$stmt = mysqli_prepare($conn, "SELECT * FROM USERS where role=?");
mysqli_stmt_bind_param($stmt,"s", $roleUser);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$cntUser = mysqli_num_rows($result);

$data   = array($cntUser,$cntDoctor,$cntAdmin);
$labels = array("Useri\n(%.1f%%)",
                "Doctori\n(%.1f%%)","Admini\n(%.1f%%)");
 

$graph = new PieGraph(300,300);
$graph->SetShadow();
 
$graph->title->Set('Tipuri de utilizatori ale platformei');
$graph->title->SetFont(FF_VERDANA,FS_BOLD,12);
$graph->title->SetColor('black');
 
$p1 = new PiePlot($data);
$p1->SetCenter(0.5,0.5);
$p1->SetSize(0.3);

$p1->SetLabels($labels);

$p1->SetLabelPos(0.8);
 
$p1->SetLabelType(PIE_VALUE_PER);
$p1->value->Show();
$p1->value->SetFont(FF_ARIAL,FS_NORMAL,9);
$p1->value->SetColor('darkgray');
 
// Add and stroke
$graph->Add($p1);
$graph->Stroke("dg.jpg");
?>