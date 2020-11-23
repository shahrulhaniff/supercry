<?php

include "database/server.php";
include "functions.php";

$data = mysqli_query($conn,"SELECT * FROM invest ORDER BY created_date DESC") or die(mysqli_error($conn));
while($info = mysqli_fetch_array( $data )) {
$lapan   = $info['id'];
//$lapan="2";
$refr = refreshPortf($lapan);
echo "<br>";
echo $refr;
}
	
?>