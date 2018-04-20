<?php

include('connect.php');

$rename_table="ALTER TABLE form_registration RENAME register_here";

mysqli_query($conn,$rename_table);

?>