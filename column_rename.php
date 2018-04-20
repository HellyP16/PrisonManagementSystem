<?php

include('connect.php');

$rename_column_name="ALTER TABLE register_here CHANGE phone phone_num VARCHAR(12)";

mysqli_query($conn,$rename_column_name);

?>