<?php

include('connect.php');
session_start();

session_destroy();
unset($_SESSION['email']);
echo"<script>;window.location='full-form.html';</script>";

?>