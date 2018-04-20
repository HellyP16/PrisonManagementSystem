<?php

include('connect.php');

$add_col="ALTER TABLE `register_here` ADD password VARCHAR(20) AFTER height";

mysqli_query($conn,$add_col);

?>
