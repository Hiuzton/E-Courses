<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/courses.css" />
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

    <!-- courses -->
    <div class="courses" >
        <form class="header-content" action="" method="POST">
            <input type="text" name="text" placeholder="Search..">
            <input id="search_btn" type="submit" name="search" value="Search" />
        </form>

        <div class="items">
                <div class="left-container">
                    <h2>Category: </h2>
                    <ul>
                        <li><form action="" method="POST">
                            <input id="cat_list" type="submit" name="all_btn" value="All courses" />
                            </form>
                        </li>
                        <li><form action="" method="POST">
                            <input id="cat_list" type="submit" name="dev_btn" value="Development" />
                            </form>
                        </li>
                        <li><form action="" method="POST">
                            <input id="cat_list" type="submit" name="photo_btn" value="Photography" />
                            </form>
                        </li>
                        <li><form action="" method="POST">
                            <input id="cat_list" type="submit" name="music_btn" value="Music" />
                            </form>
                        </li>
                        <li><form action="" method="POST">
                            <input id="cat_list" type="submit" name="design_btn" value="Design" />
                            </form>
                        </li>
                        <li><form action="" method="POST">
                            <input id="cat_list" type="submit" name="business_btn" value="Business" />
                            </form>
                        </li>
                        <li><form action="" method="POST">
                            <input id="cat_list" type="submit" name="marketing_btn" value="Marketing" />
                            </form>
                        </li>
                    </ul>
                </div>

            <div class="container">
            <?php
                   require("mysql.php");

                   if (isset($_POST['text'])) {
                    $search = $_POST['text'];
        
                    if(isset($_POST['search'])){
                    $sql = $conexiune->query("SELECT * FROM courses 
                     WHERE  categorie LIKE '%$search%'
                     OR name LIKE '%$search%'");
                    
        
                         while($info = mysqli_fetch_array($sql)){
                          echo "<article>";
                          echo "<article class=\"course\">";
                                  echo "<img src=".$info["images"]." />";
                              echo " <div class=\"description\">";
                                      echo "<h1>".$info["name"]."</h1>";
                                      echo "<p><span>Category:</span>".$info["categorie"]."</p>";
                                      echo "<p id=\"descrip\"><span>Description:</span>".$info["description"]."</p>";
                                      echo "<p><span>Price:</span>".$info["price"]."$</p>";
                              echo "</div>";
                              echo "<form action=\"addToCart.php?id=".$info["id"]."\" method=\"POST\">
                              <input id=\"add_cart\" type=\"submit\" name=\"addCart\" value=\"Add To Cart\" />
                            </form>";
                          echo "</article>";
                          echo " <hr>";
                          echo "</article>";
                        }

                    }                 
                     else {
                        echo "Enter your text";
                    }
                }else{
                  if(isset($_POST['all_btn'])){
                            $date = $conexiune->query("SELECT * FROM courses");
                             while($info = mysqli_fetch_array($date)){
                               echo "<article>";
                               echo "<article class=\"course\">";
                                       echo "<img src=".$info["images"]." />";
                                   echo " <div class=\"description\">";
                                           echo "<h1>".$info["name"]."</h1>";
                                           echo "<p><span>Category:</span>".$info["categorie"]."</p>";
                                           echo "<p id=\"descrip\"><span>Description:</span>".$info["description"]."</p>";
                                           echo "<p><span>Price:</span>".$info["price"]."$</p>";
                                   echo "</div>";
                                   echo "<form action=\"addToCart.php?id=".$info["id"]."\" method=\"POST\">
                                   <input id=\"add_cart\" type=\"submit\" name=\"addCart\" value=\"Add To Cart\" />
                                 </form>";
                               echo "</article>";
                               echo " <hr>";
                               echo "</article>";
                           }
                           }else if(isset($_POST['photo_btn'])){
                            $date = $conexiune->query("SELECT * FROM courses Where categorie=\"Photography\"");
                            while($info = mysqli_fetch_array($date)){
                              echo "<article>";
                              echo "<article class=\"course\">";
                                      echo "<img src=".$info["images"]." />";
                                  echo " <div class=\"description\">";
                                          echo "<h1>".$info["name"]."</h1>";
                                          echo "<p><span>Category:</span>".$info["categorie"]."</p>";
                                          echo "<p id=\"descrip\"><span>Description:</span>".$info["description"]."</p>";
                                          echo "<p><span>Price:</span>".$info["price"]."$</p>";
                                  echo "</div>";
                                  echo "<form action=\"addToCart.php?id=".$info["id"]."\" method=\"POST\">
                                  <input id=\"add_cart\" type=\"submit\" name=\"addCart\" value=\"Add To Cart\" />
                                </form>";
                              echo "</article>";
                              echo " <hr>";
                              echo "</article>";
                            }
                           }else if(isset($_POST['music_btn'])){
                            $date = $conexiune->query("SELECT * FROM courses Where categorie=\"Music\"");
                            while($info = mysqli_fetch_array($date)){
                              echo "<article>";
                              echo "<article class=\"course\">";
                                      echo "<img src=".$info["images"]." />";
                                  echo " <div class=\"description\">";
                                          echo "<h1>".$info["name"]."</h1>";
                                          echo "<p><span>Category:</span>".$info["categorie"]."</p>";
                                          echo "<p id=\"descrip\"><span>Description:</span>".$info["description"]."</p>";
                                          echo "<p><span>Price:</span>".$info["price"]."$</p>";
                                  echo "</div>";
                                  echo "<form action=\"addToCart.php?id=".$info["id"]."\" method=\"POST\">
                                  <input id=\"add_cart\" type=\"submit\" name=\"addCart\" value=\"Add To Cart\" />
                                </form>";
                              echo "</article>";
                              echo " <hr>";
                              echo "</article>";
                            }
                           }else if(isset($_POST['design_btn'])){
                            $date = $conexiune->query("SELECT * FROM courses Where categorie=\"Design\"");
                            while($info = mysqli_fetch_array($date)){
                              echo "<article>";
                              echo "<article class=\"course\">";
                                      echo "<img src=".$info["images"]." />";
                                  echo " <div class=\"description\">";
                                          echo "<h1>".$info["name"]."</h1>";
                                          echo "<p><span>Category:</span>".$info["categorie"]."</p>";
                                          echo "<p id=\"descrip\"><span>Description:</span>".$info["description"]."</p>";
                                          echo "<p><span>Price:</span>".$info["price"]."$</p>";
                                  echo "</div>";
                                  echo "<form action=\"addToCart.php?id=".$info["id"]."\" method=\"POST\">
                                  <input id=\"add_cart\" type=\"submit\" name=\"addCart\" value=\"Add To Cart\" />
                                </form>";
                              echo "</article>";
                              echo " <hr>";
                              echo "</article>";
                            }
                           }else if(isset($_POST['business_btn'])){
                            $date = $conexiune->query("SELECT * FROM courses Where categorie=\"Business\"");
                            while($info = mysqli_fetch_array($date)){
                              echo "<article>";
                              echo "<article class=\"course\">";
                                      echo "<img src=".$info["images"]." />";
                                  echo " <div class=\"description\">";
                                          echo "<h1>".$info["name"]."</h1>";
                                          echo "<p><span>Category:</span>".$info["categorie"]."</p>";
                                          echo "<p id=\"descrip\"><span>Description:</span>".$info["description"]."</p>";
                                          echo "<p><span>Price:</span>".$info["price"]."$</p>";
                                  echo "</div>";
                                  echo "<form action=\"addToCart.php?id=".$info["id"]."\" method=\"POST\">
                                  <input id=\"add_cart\" type=\"submit\" name=\"addCart\" value=\"Add To Cart\" />
                                </form>";
                              echo "</article>";
                              echo " <hr>";
                              echo "</article>";
                            }
                           }else if(isset($_POST['marketing_btn'])){
                            $date = $conexiune->query("SELECT * FROM courses Where categorie=\"Marketing\"");
                            while($info = mysqli_fetch_array($date)){
                              echo "<article>";
                              echo "<article class=\"course\">";
                                      echo "<img src=".$info["images"]." />";
                                  echo " <div class=\"description\">";
                                          echo "<h1>".$info["name"]."</h1>";
                                          echo "<p><span>Category:</span>".$info["categorie"]."</p>";
                                          echo "<p id=\"descrip\"><span>Description:</span>".$info["description"]."</p>";
                                          echo "<p><span>Price:</span>".$info["price"]."$</p>";
                                  echo "</div>";
                                  echo "<form action=\"addToCart.php?id=".$info["id"]."\" method=\"POST\">
                                  <input id=\"add_cart\" type=\"submit\" name=\"addCart\" value=\"Add To Cart\" />
                                </form>";
                              echo "</article>";
                              echo " <hr>";
                              echo "</article>";
                            }
                           }else if (isset($_POST['dev_btn'])){
                            $date = $conexiune->query("SELECT * FROM courses Where categorie=\"Programing\"");
                            while($info = mysqli_fetch_array($date)){
                              echo "<article>";
                              echo "<article class=\"course\">";
                                      echo "<img src=".$info["images"]." />";
                                  echo " <div class=\"description\">";
                                          echo "<h1>".$info["name"]."</h1>";
                                          echo "<p><span>Category:</span>".$info["categorie"]."</p>";
                                          echo "<p id=\"descrip\"><span>Description:</span>".$info["description"]."</p>";
                                          echo "<p><span>Price:</span>".$info["price"]."$</p>";
                                  echo "</div>";
                                  echo "<form action=\"addToCart.php?id=".$info["id"]."\" method=\"POST\">
                                  <input id=\"add_cart\" type=\"submit\" name=\"addCart\" value=\"Add To Cart\" />
                                </form>";
                              echo "</article>";
                              echo " <hr>";
                              echo "</article>";
                            }
                           }else{
                            $date = $conexiune->query("SELECT * FROM courses");
                            while($info = mysqli_fetch_array($date)){
                              echo "<article>";
                              echo "<article class=\"course\">";
                                      echo "<img src=".$info["images"]." />";
                                  echo " <div class=\"description\">";
                                          echo "<h1>".$info["name"]."</h1>";
                                          echo "<p><span>Category:</span>".$info["categorie"]."</p>";
                                          echo "<p id=\"descrip\"><span>Description:</span>".$info["description"]."</p>";
                                          echo "<p><span>Price:</span>".$info["price"]."$</p>";
                                  echo "</div>";
                                  echo "<form action=\"addToCart.php?id=".$info["id"]."\" method=\"POST\">
                                  <input id=\"add_cart\" type=\"submit\" name=\"addCart\" value=\"Add To Cart\" />
                                </form>";
                              echo "</article>";
                              echo " <hr>";
                              echo "</article>";
                            }
                           }
                }
                          
                          
                       ?> 
            </div>
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