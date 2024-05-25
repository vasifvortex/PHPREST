<?php
session_start();
include_once('../core/initialize.php');
if(!empty($_SESSION["id"])){
$id=$_SESSION["id"];
$stmt = $db->prepare("SELECT * FROM user1 WHERE user_id = :user_id");
$stmt->execute(['user_id' => $id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
}
else{
    header("Location: login.php");
}
?>
<!DOCTYPE HTML >
<HTML lang="en">
   <HEAD>
      <TITLE>Index</TITLE>
   </HEAD>
   <BODY>
    <h1>Welcome <?php echo $row["name"];?> </h1>
    <a href="logout.php">Logout</a>
   </BODY>
</HTML>