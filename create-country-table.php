<?php

include('connect.php');

$create_table="CREATE TABLE country (
`id` INT(10) AUTO_INCREMENT PRIMARY KEY,
`country_name` VARCHAR(255),
`country_status` VARCHAR(255)
)";

mysqli_query($conn,$create_table);
?>