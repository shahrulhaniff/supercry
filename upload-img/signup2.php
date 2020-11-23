<?php
$hn      = 'localhost';
$un      = 'supercry_root';
$pwd     = 'supercry_root'; /* MyP@eYGB24 */
$db      = 'supercry_master';
$cs      = 'utf8';
$conn=mysqli_connect($hn, $un, $pwd, $db) or die(mysqli_error());
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
//header("Access-Control-Allow-Headers: Authorization, Content-Type");
//header("Access-Control-Allow-Origin: *");
//header('content-type: application/json; charset=utf-8');

$email = $_POST['username'];
$email = $_POST['email'];
$username= $_POST['username'];
$pwd = $_POST['pwd'];
$repwd = $_POST['repwd'];

$upload_image=$_FILES["userkp"]["name"];  //image name
$folder="Photo/";  // folder name where image will be store
move_uploaded_file($_FILES["userkp"]["tmp_name"], "$folder".$_FILES["userkp"]["name"]);

$sql="INSERT INTO userpro2 (id,email,username,pwd,image_name,image_path) values('$username','$email','$username','$pwd','$upload_image','$folder')";

$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

if($result){
    
echo "<script>alert('Success!');document.location.href='signup.php';</script>";

}
else 
{
echo "your picture is not uploaded ";
}


					
//mysql_close($con);

?>