<?php
$hostname="localhost";
$username="root";
$psw="";

$conn=mysqli_connect($hostname,$username,$psw) or mysql_error("Server Connection Failed");

$db_name="formdb";
$sql_conn=mysqli_select_db($conn,$db_name) or mysql_error("DATABASE NOT FOUND");
//error_reporting(E_ALL ^ E_NOTICE);
?>