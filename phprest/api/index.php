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
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rent 2 Ride</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />

    <link rel="stylesheet" href="../style.css" />
  </head>
  <body>
    <header>
      <div class="container">
        <nav class="header-nav">
          <div class="nav-logo">
            <a href="./index.php">
              <img src="../Tecrube/assets/logo.png" alt="" />
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
          <li><a href="./bikes.php">services</a></li>
          <li><a href="./contact.php">contact</a></li>
          <li><a href="">account</a></li>
        </ul>
      </div>
    </div>
    <main>
      <div class="swiper carousel">
        <div class="swiper-wrapper">
          <div class="swiper-slide slide">
            <img
              class="slider-bg"
              src="../assets/bike-slide-1.jpg"
              alt="Nature Image #1"
            />
            <div class="slider-details">
              <img src="../assets/logo.png" alt="" />
              <h4>Rent2Ride</h4>
              <h3>Ride to your happiness !</h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores
                hic nulla distinctio dolorum nemo ducimus ea eveniet unde
                accusamus eaque?
              </p>
            </div>
          </div>
          <div class="swiper-slide slide">
            <img
              class="slider-bg"
              src="../assets/bike-slide-2.jpg"
              alt="Nature Image #1"
            />
            <div class="slider-details">
              <img src="../assets/logo.png" alt="" />
              <h4>Rent2Ride</h4>
              <h3>Ride to your happiness !</h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores
                hic nulla distinctio dolorum nemo ducimus ea eveniet unde
                accusamus eaque?
              </p>
            </div>
          </div>
          <div class="swiper-slide slide">
            <img
              class="slider-bg"
              src="../assets/bike-slide-3.jpg"
              alt="Nature Image #1"
            />
            <div class="slider-details">
              <img src="../assets/logo.png" alt="" />
              <h4>Rent2Ride</h4>
              <h3>Ride to your happiness !</h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores
                hic nulla distinctio dolorum nemo ducimus ea eveniet unde
                accusamus eaque?
              </p>
            </div>
          </div>
        </div>

        <button class="carousel-button-prev carousel-button">
          <i class="fa-solid fa-left-long"></i>
        </button>

        <button class="carousel-button-next carousel-button">
          <i class="fa-solid fa-right-long"></i>
        </button>
      </div>
      <div class="container">
        <div class="boxes">
          <div class="box">
            1 Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            Obcaecati, fuga!
          </div>
          <div class="box">
            2 Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            Obcaecati, fuga!
          </div>
          <div class="box">
            3 Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            Obcaecati, fuga!
          </div>
          <div class="box">
            4 Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            Obcaecati, fuga!
          </div>
        </div>
      </div>
      <div class="our-advantages-wrapper">
        <div class="container">
          <h3>Our advantages</h3>
          <div class="advantages">
            <div class="advantage">
              <i class="fa-solid fa-cart-shopping"></i>
              <span>Free shipping from $750</span>
            </div>
            <div class="advantage">
              <i class="fa-solid fa-gear"></i>
              <span>Warrantly service for 2 months</span>
            </div>
            <div class="advantage">
              <i class="fa-solid fa-wallet"></i>
              <span>Exchange and return within 18 days</span>
            </div>
            <div class="advantage">
              <i class="fa-solid fa-tag"></i>
              <span>Discount for customers</span>
            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="../js/common.js"></script>
    <script type="module" src="../js/index.js"></script>
  </body>
</html>
