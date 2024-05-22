<?php
session_start();
include_once('../core/initialize.php');
if(!empty($_SESSION["id"])){
    header("Location: index.php");
}
if(isset($_POST["submit"])){
$usernameemail = $_POST["usernameemail"];
$password = $_POST["password"];
$stmt = $db->prepare("SELECT * FROM user1 WHERE username = :usernameemail");
$stmt->execute(['usernameemail' => $usernameemail]);

   
if($stmt->rowCount() > 0){
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if(password_verify($password, $row["password"])){
       
        $_SESSION["login"]=true;
        $_SESSION["id"]=$row["user_id"];
        header("Location: index.php");
       //exit();
     }
else{
   
        echo
    "<script>alert('Wrong password');</script>";
    }
}
    else{
        echo
    "<script>alert('User not registered');</script>";
    }

}

?>
<!DOCTYPE HTML >
<HTML lang="en">
   <HEAD>
      <TITLE>Login</TITLE>
   </HEAD>
   <BODY>
    <h2>Login</h2>
    <form class="" action="" method="post" autocomplete="off">
    <label for="usernameemail">Username or Email : </label>
    <input type="text" name="usernameemail" required value=""><br>
    <label for="password">Password : </label>
    <input type="password" name="password" required value=""><br>
    <button type="submit" name="submit">Login</button>
    </form>
    <br>
    <a href="registration.php">Registration</a>
   </BODY>
</HTML>
