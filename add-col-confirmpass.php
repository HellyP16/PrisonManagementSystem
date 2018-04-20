<?php

include('connect.php');

$add_col="ALTER TABLE `register_here` ADD confirm_psw VARCHAR(20) AFTER password";

mysqli_query($conn,$add_col);

?>
