<?php
session_start();
include_once('../core/initialize.php');
$_SESSION=[];
session_unset();
session_destroy();
header("Location: login.php");
?>
<!DOCTYPE HTML >
<HTML lang="en">
   <HEAD>
      <TITLE>Index</TITLE>
   </HEAD>
   <BODY>
    <h1>Welcome </h1>
    <a href="logout.php">Logout</a>
   </BODY>
</HTML>