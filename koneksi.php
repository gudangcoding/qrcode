<?php
$serverName = "192.168.1.4\SQLTPICS"; 
$connectionInfo = array( "Database"=>"QR Code Application", "UID"=>"sa", "PWD"=>"P@ssword.1");
$konek = sqlsrv_connect( $serverName, $connectionInfo);

// if( $conn ) {
//      echo "Connection established.<br />";
// }else{
//      echo "Connection could not be established.<br />";
//      die( print_r( sqlsrv_errors(), true));
// }

?>