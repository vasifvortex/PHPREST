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
</HTML>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../style.css" />
  </head>
  <body>
    <header>
      <div class="container">
        <nav class="header-nav">
          <div class="nav-logo">
            <a href="./index.php">
              <img src="../assets/logo.png" alt="" />
            </a>
          </div>
          <i class="fa-solid fa-bars burger-menu"></i>
          <ul class="nav-links">
            <li><a href="./index.php">home</a></li>
            <li><a href="bikes.php">services</a></li>
            <li><a href="./contact.php">contact</a></li>
            <li class="accounts-trigger">
              <a>account </a>
              <div class="accounts-modal">
             
              <?php if(empty($_SESSION["id"])):?>
                <a href="./login.php" class="account-login">Login</a>
                <a href="./registration.php" class="account-register">Register</a>
                <?php else : ?>
                  <form action="./logout.php" method="post" style="display:inline;">
                  <button type="submit" >
                  Logout
                  <i class="fa-solid fa-right-from-bracket" ></i>
                 </button>
                 </form>
              <?php endif; ?>
              </div>
            </li>
          </ul>
          <div class="dark-mode-wrapper">
            <i class="fa-solid fa-moon"></i>
          </div>
        </nav>
      </div>
    </header>
    <div class="burger-menu-wrapper">
      <div class="burger-header container">
        <div class="dark-mode-wrapper dark-mode-wrapper-mobile">
          <i class="fa-solid fa-moon"></i>
        </div>
        <i class="fa-solid fa-xmark burger-menu-closer"></i>
      </div>
      <div class="burger-body container">
        <div class="burger-welcome">
          <img src="../assets/logo.png" alt="" />
          <h2>Welcome to Rent2Ride !</h2>
        </div>
        <ul>
          <li><a href="./index.html">home</a></li>
          <li><a href="bikes.html">services</a></li>
          <li><a href="./contact.html">contact</a></li>
          <li class="accounts-trigger">
              <a>account </a>
              <div class="accounts-modal">
             
              <?php if(empty($_SESSION["id"])):?>
                <a href="./login.php" class="account-login">Login</a>
                <a href="./registration.php" class="account-register">Register</a>
                <?php else : ?>
                  <form action="./logout.php" method="post" style="display:inline;">
                  <button type="submit" >
                  Logout
                  <i class="fa-solid fa-right-from-bracket" ></i>
                 </button>
                 </form>
              <?php endif; ?>
             
              </div> 
            </li>
        </ul>
      </div>
    </div>
    <main>
      <div class="container">
        <div class="auth-container">
          <div class="auth-header">
            <a href="./registration.php" class="register-header">Register</a>
            <a href="./login.php" class="login-header auth-h-active">Login</a>
          </div>
          <div class="auth-body">
            <h2>Login</h2>
            <form class="" action="" method="post" autocomplete="off">
              <div class="auth-field">
                <label for="usernameemail">Username or Email : </label>
                <input type="text" name="usernameemail" required value="" />
              </div>
              <div class="auth-field">
                <label for="password">Password : </label>
                <input
                  id="auth-password"
                  type="password"
                  name="password"
                  required
                  value=""
                />
                <i class="fa-regular fa-eye show-password-btn"></i>
              </div>

              <button type="submit" name="submit">Login</button>
            </form>
          </div>
        </div>
      </div>
    </main>
    <footer>
      <div class="container">
        <div class="footer-left">
          <div class="subscribe-side">
            <h4>Subscribe</h4>
            <span
              >Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam,
              sint?</span
            >
            <form>
              <input type="text" placeholder="E-mail..." />
              <input type="submit" value="SEND" />
            </form>
          </div>
          <div class="footer-social-links">
            <h4>stay in touch</h4>
            <div class="social-links">
              <div class="social-link-box fb">
                <i class="fa-brands fa-facebook-f"></i>
              </div>
              <div class="social-link-box twit">
                <i class="fa-brands fa-x-twitter"></i>
              </div>
              <div class="social-link-box insta">
                <i class="fa-brands fa-instagram"></i>
              </div>
              <div class="social-link-box yt">
                <i class="fa-brands fa-youtube"></i>
              </div>
            </div>
            <span
              >Questions? Get in touch with
              <a href="">smth@youremail.com</a></span
            >
          </div>
        </div>
        <div class="footer-right">
          <div class="footer-infos">
            <div class="ft-info">
              <h5>info</h5>
              <section>
                <div>
                  <a href="">FAQ</a>
                  <a href="">contacts</a>
                  <a href="">exchanges</a>
                </div>
                <div>
                  <a href="">FAQ</a>
                  <a href="">contacts</a>
                  <a href="">exchanges</a>
                </div>
              </section>
            </div>
            <div class="ft-info">
              <h5>shop</h5>
              <section>
                <div>
                  <a href="">FAQ</a>
                  <a href="">contacts</a>
                  <a href="">exchanges</a>
                </div>
                <div>
                  <a href="">FAQ</a>
                  <a href="">contacts</a>
                  <a href="">exchanges</a>
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script src="../js/common.js"></script>
    <script type="" src="../js/auth.js"></script>
  </body>
</html>
