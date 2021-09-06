<?php
header('Content-Type: application/json');

require '../../conn.php';


$COUNT = array();

  $q="select COUNT(1) as num from population where NHIF=1";
  $r=sqlsrv_query($con, $q);
  $NHIF = sqlsrv_fetch_array($r);

  $COUNT['التامين الصحي']=$NHIF['num'];

  $q="select COUNT(1) as num from population where POVERTY=1";
  $r=sqlsrv_query($con, $q);
  $POVERTY = sqlsrv_fetch_array($r);

  $COUNT['b']=$POVERTY['num'];


  $q="select COUNT(1) as num from population where zakat=1";
  $r=sqlsrv_query($con, $q);
  $zakat = sqlsrv_fetch_array($r);

  $COUNT['c']=$zakat['num'];


  $q="select COUNT(1) as num from population where DIRECT=1";
  $r=sqlsrv_query($con, $q);
  $DIRECT = sqlsrv_fetch_array($r);

  $COUNT['d']=$DIRECT['num'];


  $q="select COUNT(1) as num from population where NHIF_KRT=1";
  $r=sqlsrv_query($con, $q);
  $NHIF_KRT = sqlsrv_fetch_array($r);


  $COUNT['e']=$NHIF_KRT['num'];


  echo json_encode($COUNT);


?>