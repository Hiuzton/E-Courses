<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/cart-style.css" />
    <title>eCourses</title>
  </head>
  <body>

      <!-- nav bar -->
    <header>
      <nav class="navbar">
        <div class="bar-logo">
          <img src="icons/logo.png" alt="logo" />
          <a href="index.php#home">eCourses</a>
        </div>

        <ul class="nav-menu">
          <li class="nav-item">
            <a href="courses.php" class="nav-link">Courses</a>
          </li>
          <li class="nav-item">
            <a href="index.php#about" class="nav-link">About</a>
          </li>
          <li class="nav-item">
            <a href="faq.php#faq" class="nav-link">FAQ</a>
          </li>
          <li class="nav-item">
            <a href="#cart" name="cart" class="nav-link">
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
    
    <!-- cart -->
    <div class="container">
        <div class="info">
            <h1>Shoping cart</h1> <br/>
            <div class="cart_course">
                <?php
                    require("mysql.php");
                            $date = $conexiune->query("SELECT * FROM cart");
                            while($info = mysqli_fetch_array($date)){
                                echo "<article>";
                                echo " <hr>";
                                echo "<article class=\"course\">";
                                        echo "<img src=".$info["images"]." />";
                                    echo " <div class=\"description\">";
                                            echo "<h1>".$info["name"]."</h1>";
                                            echo "<p><span>Category:</span>".$info["categorie"]."</p>";
                                            echo "<p id=\"desc\"><span>Description:</span>".$info["description"]."</p>";
                                            echo "<p><span>Price:</span>".$info["price"]."$</p>";
                                    echo "</div>";
                                    echo "<form action=\"delete.php?id=".$info["id"]."\" method=\"POST\">
                                    <input id=\"del_but\" type=\"submit\" name=\"delete\" value=\"Delete\" />
                                  </form>";
                                echo "</article>";
                                echo "</article>";
                            }
                        ?> 
                
            </div>
            <?php
            require("mysql.php");
            $sql = "SELECT SUM(price) AS total FROM cart";
            $result = mysqli_query($conexiune, $sql);

                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
                    $total = $row['total'];
                   echo " <div class=\"total-price\">
                    <p><span>Total Price: </span>".$total."$</p>
                    <button>Check out</button>
                </div>";
                    
                } else {
                    echo "Eroare la executarea interogării: " . mysqli_error($conexiune);
                }
            ?>
          
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
            <li><a href="index.php#home">Home</a></li>
            <li><a href="courses.php">Courses</a></li>
            <li><a href="index.php#about">About</a></li>
            <li><a href="faq.php">FAQ</a></li>
          </ul>
        </article>
      </div>
    </footer>
    <script type="text/javascript" src="script/script.js"></script>
   
  </body>
</html>