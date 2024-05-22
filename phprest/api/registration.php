<?php
session_start();
include_once('../core/initialize.php');
if(!empty($_SESSION["id"])){
    header("Location: index.php");
}
if(isset($_POST["submit"])){
$name = $_POST["name"];
$surname = $_POST["surname"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$repeat_password = $_POST["repeat_password"];

$stmt = $db->prepare("SELECT * FROM user1 WHERE username = :username OR email = :email");
$stmt->execute(['username' => $username, 'email' => $email]);
if($stmt->rowCount() > 0){
    echo
    "<script>alert('Username or Email is has already taken');</script>";
}
else{
    if($password==$repeat_password){
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $db->prepare("INSERT INTO user1 (name, surname, username, email, password) VALUES (:name, :surname, :username, :email, :password)");
        $stmt->execute([
            'name' => $name,
            'surname' => $surname,
            'username' => $username,
            'email' => $email,
            'password' => $passwordHash
        ]);
       
        echo
    "<script>alert('Registration successfull');</script>";
    }
    else{
        echo
    "<script>alert('Password does not match');</script>";
    }

}
}
?>
<!DOCTYPE HTML >
<HTML lang="en">
   <HEAD>
      <TITLE>REGISTRATION</TITLE>
   </HEAD>
   <BODY>
   <h2>Registration </h2>
    <form class="" action="" method="post" autocomplete="off">
    <label for="name">Name:</label>
    <input type="text" name="name" required value=""><br>
    <label for="surname">Surname:</label>
    <input type="text" name="surname" required value=""><br>
    <label for="username">Username:</label>
    <input type="text" name="username" required value=""><br>
    <label for="email">email:</label>
    <input type="email" name="email" required value=""><br>
    <label for="password">Password:</label>
    <input type="password" name="password" required value=""><br>
    <label for="repeat_password">repeat_password:</label>
    <input type="password" name="repeat_password" required value=""><br>
    <button type="submit" name="submit">Register</button>
    </form>
    <br>
    <a href="login.php">Login</a>
   </BODY>
</HTML>
