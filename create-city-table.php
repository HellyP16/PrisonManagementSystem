<?php
include('connect.php');

$create_table="CREATE TABLE city (
`city_id` INT(10) AUTO_INCREMENT PRIMARY KEY,
`city_name` VARCHAR(255),
`city_status` VARCHAR(255),
`state_id` VARCHAR(255),
`country_id` VARCHAR(255)
)";
mysqli_query($conn,$create_table);
?>