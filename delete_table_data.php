<?php

include('connect.php');

$truncate="TRUNCATE TABLE form_registration";

mysqli_query($conn,$truncate);

?>