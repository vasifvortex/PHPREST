<?php
session_start();
include_once('../core/initialize.php');
$_SESSION=[];
session_unset();
session_destroy();
header("Location: index.php");
?>;
