<?php

include "database/server.php";

//mysql_connect("localhost", "root", "") or die(mysql_error());
 
//mysql_select_db("bitpro") or die(mysql_error());
 
$x=$_GET['q'];
$select=mysqli_query($conn,"SELECT * FROM pricetoken ORDER BY created_date DESC LIMIT 1");
$fetch=mysqli_fetch_array($select);
$data_x=$fetch['usd'];

/*if($data_x==$x)
{
echo "<center><font color='RED'>USD exist ".$data_x."</font></center>";
}
else
{
echo "<center><font color='Red'>Name not exist</font></center>";
}*/
$dapat=($x/$data_x);
$dapat=number_format((float)$dapat, 8, '.', '');
//echo "<center><font color='RED'>Token ".$x." X USD Price ".$data_x."=".$dapat."USD</font></center>";
echo "<h2><font color='black'><b> ".$dapat." SCFX</b></font></h2>";
?>