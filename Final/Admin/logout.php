<?php
session_start();
unset($_SESSION["logon"]);
header("Location: ../index.php");
?>