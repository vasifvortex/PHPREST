<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration</title>
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
          <li><a href="./index.php">home</a></li>
          <li><a href="bikes.php">services</a></li>
          <li><a href="./contact.php">contact</a></li>
          <li><a href="">account</a></li>
        </ul>
      </div>
    </div>
    <main>
      <div class="container">
        <div class="contact-container">
          <h2>Get in touch with us !</h2>
          <section>
            <div class="contact-image">
              <img src="../assets//contact-us.png" alt="" />
            </div>
            <div class="contact-body">
              <form class="" action="" method="post" autocomplete="off">
                <div class="auth-field">
                  <label for="name">Name:</label>
                  <input
                    type="text"
                    name="name"
                    required
                    value=""
                    placeholder="Enter your name..."
                  />
                </div>

                <div class="auth-field">
                  <label for="email">email:</label>
                  <input
                    type="email"
                    name="email"
                    required
                    value=""
                    placeholder="Enter your email..."
                  />
                </div>

                <div class="auth-field">
                  <label for="phone">phone:</label>
                  <input
                    type="text"
                    name="phone"
                    required
                    value=""
                    placeholder="Enter your phone..."
                  />
                </div>
                <div class="auth-field">
                  <label for="comment">Comment:</label>
                  <textarea
                    name="comment"
                    placeholder="Enter your comment..."
                    required
                  >
                  </textarea>
                </div>

                <button type="submit" name="submit">Send</button>
              </form>
            </div>
          </section>
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
  </body>
</html>
