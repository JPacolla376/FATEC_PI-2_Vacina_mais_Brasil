<?php
session_start();

header("location: ../HTML/login.php");

session_destroy();

exit;