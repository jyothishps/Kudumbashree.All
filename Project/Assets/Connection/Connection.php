<?php
$server="localhost";
$user="root";
$password="";
$DB="db_kms";
$con=mysqli_connect($server,$user,$password,$DB);
if(!$con)
{
	echo "not connected";
}
?>
