<?php

include('connect.php');

$add_column="ALTER TABLE register_here ADD image TEXT AFTER confirm_psw";

mysqli_query($conn,$add_column);

?>