<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/style.css" />
    <title>eCourses</title>
  </head>
  <body>

      <!-- nav bar -->
    <header>
      <nav class="navbar">
        <div class="bar-logo">
          <img src="icons/logo.png" alt="logo" />
          <a href="#home">eCourses</a>
        </div>

        <ul class="nav-menu">
          <li class="nav-item">
            <a href="courses.php" class="nav-link">Courses</a>
          </li>
          <li class="nav-item">
            <a href="#about" class="nav-link">About</a>
          </li>
          <li class="nav-item">
            <a href="faq.php" class="nav-link">FAQ</a>
          </li>
          <li class="nav-item">
            <a href="cart.php" name="cart" class="nav-link">
              <img src="icons/cart.png" alt="cart" class="nav-link"
            /></a>
          </li>
          <?php
            session_start();

            if (!isset($_SESSION['email'])) {
                echo "<li class=\"nav-item\">
                <a href=\"login.php\" class=\"nav-link\" id=\"login\">Log in</a></li>";
            }else {
                $name = $_SESSION['name'];
                echo "<li class=\"nav-item\">
                <a href=\"#\" class=\"nav-link\" id=\"log-nav\">Hello,<br />".$name."</a>
                <div class=\"dropdown-content\"> 
                    <form action=\"\" method=\"POST\">
                    <input id=\"logout\" type=\"submit\" name=\"logout\" value=\"Log out\" />
                    </form>
                </div>
                </li>";

                if (isset($_POST['logout'])){
                    unset($_SESSION['name']);
                    unset($_SESSION['email']);
                    header("Location: login.php");
                    exit();
                }
            }           
          ?>         
        </ul>

        <div class="hamburger">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </div>
      </nav>
    </header>

    
    <!-- hero -->
    <div class="hero" id="home">
      <div class="hero-text">
        <h1>
          Online <span>Courses</span> <br />
          That <span>You</span> Need
        </h1>
        <p>
          Lorem ipsum dolor sit, amet consectetur <br />
          adipisicing elit. Autem, culpa.
        </p>
      </div>
    </div>

    <!-- about -->
    <div class="about" id="about">
      <div class="container">
        <div class="about-text">
          <section class="header-section">
            <h2>Welcome to eCourses</h2>
            <p>
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis,
              obcaecati?
            </p>
          </section>
          <?php
            require("mysql.php");
                    $date = $conexiune->query("SELECT * FROM about");
                    while($info = mysqli_fetch_array($date)){
                        echo "<article class=\"feature\">";
                                echo "<img src=".$info["images"]." />";
                            echo " <div class=\"context\">";
                                    echo "<h3>".$info["name"]."</h3>";
                                    echo "<p>".$info["description"]."</p>";
                            echo "</div>";
                        echo "</article>";
                    }
                ?>
        </div>
        <div class="about-img">
          <img src="icons/about-image.jpg" alt="about-image" />
        </div>
      </div>
    </div>

    <!-- courses -->
    <div class="courses" id="courses">
      <div class="header">
        <h2>Explore courses</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
      </div>

      <div class="container">
      <?php
            require("mysql.php");
                    $date = $conexiune->query("SELECT * FROM courses LIMIT 8");
                    while($info = mysqli_fetch_array($date)){
                        echo "<article>";
                                echo "<div class=\"img-course\">";
                                    echo "<img src=".$info["images"]." >";
                                    echo "<p>".$info["name"]."</p>";
                                    echo "<hr />";
                                echo "</div>";
                                echo "<div class=\"course-desc\">";
                                    echo "<p>".$info["categorie"]."</p>";
                                    echo "<p>".$info["price"]."$</p>";
                                echo "</div>";
                                echo "<form action=\"addToCart.php?id=".$info["id"]."\" method=\"POST\">
                            <input id=\"addToCart\" type=\"submit\" name=\"addToCart\" value=\"Add To Cart\" />
                          </form>";
                        echo "</article>";
                    }
                    
                ?>
      </div>

      <div class="more-section">
        <a id="more-button" href="courses.php">More</a>
      </div>
    </div>

    <!-- faq -->
    <div class="faq" id="faq">
      <div class="faq-header">
        <h2>Frequently Asked Questions</h2>
      </div>

      <div class="container">
        <hr>
        <?php
            require("mysql.php");
                    $date = $conexiune->query("SELECT * FROM questions_answers LIMIT 4");
                    while($info = mysqli_fetch_array($date)){
                        echo "<article>
                            <div class=\"ques-ans\">
                                <div class=\"question\">
                                    <p>".$info["question"]."</p>
                                    <div class=\"plus\">
                                    <span class=\"line\"></span>
                                    <span class=\"line\"></span>
                                    </div>
                                </div>
                                <p class=\"answer\">".$info["answer"]."</p>
                            </div>
                        <hr>
                        </article>";
                    }
                    
                ?>
       
      </div>

      <div class="viewmore-section">
        <a id="view-more" href="faq.php">View More</a>
      </div>
    </div>

    <!-- footer -->
    <footer class="footer">
      <div class="row">
        <article class="company-descrip">
          <div class="logo-name">
            <img src="icons/logo.png" alt="footer-logo" />
            <h1>eCourses</h1>
          </div>

          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est velit
            deserunt molestias aliquid molestiae iste.
          </p>
          <p>
            Copyrite© 2023. Design și implementare: Hutsan Andrei. Toate
            drepturile rezervate.
          </p>
        </article>

        <article class="contactUs">
          <h4 class="item-title">Contact Us</h4>
          <div class="contact-address">
            <p>Tel: (+40) 720 598 448</p>
            <p>E-mail: ethernet.courses@gmail.com</p>
            <p>
              Address:Strada Vasile Alecsandri 108, Alba Iulia 510201, România
            </p>
          </div>
        </article>

        <article class="item-list">
          <h4 class="item-title">Page</h4>
          <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="courses.php">Courses</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="faq.php">FAQ</a></li>
          </ul>
        </article>
      </div>
    </footer>
    <script type="text/javascript" src="script/script.js"></script>
  </body>
</html>