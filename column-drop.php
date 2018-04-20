<?php

include('connect.php');

$drop_column="ALTER TABLE register_here DROP id";

mysqli_query($conn,$drop_column);

?>
