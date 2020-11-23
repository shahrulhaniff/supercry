<?php
$hn      = 'localhost';
$un      = 'supercry_root';
$pwd     = 'supercry_root'; /* MyP@eYGB24 */
$db      = 'supercry_master';
$cs      = 'utf8';
$conn=mysqli_connect($hn, $un, $pwd, $db) or die(mysqli_error());


$email = $_POST['username'];
$email = $_POST['email'];
$username= $_POST['username'];
$pwd = $_POST['pwd'];
$repwd = $_POST['repwd'];
$imageData = mysqli_real_escape_string($conn,file_get_contents($_FILES["userkp"]["tmp_name"]));

$sql="INSERT INTO userpro2 (id,email,username,pwd,image) values('$username','$email','$username','$pwd','$imageData')";

$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

if($result){
echo "<script>alert('Success!');document.location.href='page_register.php';</script>";
}
else 
{
echo "your picture is not uploaded ";
}
?>