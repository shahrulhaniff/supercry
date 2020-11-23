<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();
include "sys/database/server.php";
/*
include "sys/functions.php";

$data = mysqli_query($conn,"SELECT * FROM invest WHERE stat='Active' ORDER BY created_date DESC") or die(mysqli_error($conn));
while($info = mysqli_fetch_array( $data )) {
$lapan   = $info['id'];
//$lapan="2";
$refr = refreshPortf($lapan);
//echo "<br>";
//echo $refr;
}

$pr_array=  getPrice();
$BTC_P = $pr_array[0];
$USD_P = $pr_array[1];
$_SESSION['BTC_P'] = $pr_array[0];
$_SESSION['USD_P'] = $pr_array[1];
*/

//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
//header("Access-Control-Allow-Headers: Authorization, Content-Type");
//header("Access-Control-Allow-Origin: *");
//header('content-type: application/json; charset=utf-8');

$username = $_POST['id'];
$password = $_POST['pwd'];

$qry="SELECT * FROM userpro WHERE id='$username' and pwd='$password'";

	
$result=mysqli_query( $conn, $qry) or die(mysql_error($conn));
	
if($result) {
		    if(mysqli_num_rows($result) > 0) {
				
					//Login Successful
					session_regenerate_id();
					$row = mysqli_fetch_assoc($result);
					
					//session
					$_SESSION['USER'] = $row['id'];
					$_SESSION['pwd'] = $row['pwd'];
					$id = $row['id'];
					$survey = $row['aktif'];
					
					//Update IP and Last login --> $time=NOW();
					$ipaddress = $_SERVER['REMOTE_ADDR'];
					$qry2="UPDATE userpro SET lastlogin= NOW() , ipaddress ='$ipaddress' WHERE id='$id'";
					$result2=mysqli_query($conn,$qry2);

					//tetapkan position utk akses sistem
					$position = $row['akaun'];
					$_SESSION['USER_TYPE'] = $row['akaun'];
					
				
					//Go to home page
					 if ($_SESSION['USER_TYPE'] == 'MASTER') {
//echo"<script>alert('Login! ".$refr."');document.location.href='sys/index_master.php';</script>"; 
header("location: sys/index_master.php");//echo $position;
					 }
					
					else if ($_SESSION['USER_TYPE'] == 'MEMBER'){
						if($survey!='B') { header("location: sys/index.php"); }
						else { header("location: survey.php"); } 
						//echo $ipaddress;
					}
					
					else if ($_SESSION['USER_TYPE'] == 'LP'){
						header("location: sys/index_LP.php");
					}
					
					else{ 
						echo"<script>alert('Access Denied! 0');document.location.href='index.php';</script>"; 
					}
					
					exit();
					}
			
			else{
				echo"<script>alert('Access Denied!');document.location.href='index.php';</script>";
			}
	}
	
	else {
		die("Query failed");
	}

?>