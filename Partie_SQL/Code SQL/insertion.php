<?php 
 
include("connect.php");

$j = 1;
for ($i=1; $i<=411; $i++) {
	if ($i == 15 || $i == 59 || $i == 103 || $i == 147 || $i == 191 || $i == 235 || $i == 279 || $i == 279 || $i 		== 323 || $i == 367) {
		$j = $j + 1;	
	};
	$insertCarte = "INSERT INTO CARTE(id_carte, chemin_carte, id_collection) VALUES ($i, 'CARTE$i' ,$j)";
	$insertCarte2 = oci_parse($dbConn, $insertCarte);
	if ( !oci_execute($insertCarte2) ){
		echo 'Query failed: ' . $err['message'], E_USER_ERROR;
		$err = oci_error($insertCarte2);
		trigger_error('Query failed: ' . $err['message'], E_USER_ERROR);
	};
};
?>


