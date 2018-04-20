<?php
include('connect.php');

$add_column="ALTER TABLE state ADD country_name VARCHAR(255) AFTER country_id";
mysqli_query($conn,$add_column);


?>