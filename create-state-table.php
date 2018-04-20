<?php
include('connect.php');

$create_table="CREATE TABLE state (
`state_id` INT(10) AUTO_INCREMENT PRIMARY KEY,
`state_name` VARCHAR(255),
`state_status` VARCHAR(255),
`country_id` VARCHAR(255)
)";

mysqli_query($conn,$create_table);
?>