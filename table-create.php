<?php
include('connect.php');

$create_table="CREATE TABLE `register_here`(
`id` INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`fname` VARCHAR(50),
`mname` VARCHAR(50),
`lname` VARCHAR(50),
`email` VARCHAR(150),
`phone_num` VARCHAR(12),
`gender` ENUM('male','female'),
`dob` DATE,
`country` VARCHAR(255),
`state` VARCHAR(255),
`city` VARCHAR(255),
`area` VARCHAR(255),
`hobby` VARCHAR(25),
`height` VARCHAR(50),
`password` VARCHAR(15),
`confirm_psw` VARCHAR(15)
)";

mysqli_query($conn,$create_table);
?>