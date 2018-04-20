<?php

include('connect.php');

$drop_db="DROP DATABASE formdb";

mysqli_query($conn,$drop_db);

?>