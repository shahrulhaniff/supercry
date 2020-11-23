<?php

session_start();


if(isset($_GET['id'])) {
$getje = $_GET['id'];
$_SESSION['USER'] = $getje;
$_SESSION['USER_TYPE'] = 'MEMBER';
}
else {
	echo"<script>document.location.href='bms.php?id=shahrul8k';</script>";
}

?>

<a href="https://supercryptofinance.com/sys/index.php" target="blank">Lets Go!</a>