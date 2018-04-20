<?php

include('connect.php');

$add_column="ALTER TABLE register_here ADD id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY before fname";

mysqli_query($conn,$add_column);

?>
