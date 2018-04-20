<?php
$hostname="localhost";
$username="root";
$psw="";

$conn=mysqli_connect($hostname,$username,$psw) or mysql_error("Server Connection Failed");

$create_database="CREATE DATABASE formdb";
mysqli_query($conn,$create_database);
?>