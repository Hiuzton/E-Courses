<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/log-style.css">
	<title>eCourses</title>    

   
</head>
<body>
<div class="main-screen">
        <div class="reg-form">
            <div class="logo">
                <img src="icons/logo.png" alt="logo" />
                <h1>eCourses</h1>
            </div>
          <h2>Log in</h2>
            <form action="" method="POST">
              <input class="text-form" type="email" name="email" placeholder="Email" required /><br /><br />

              <input class="text-form" type="password" name="password" placeholder="Password" required /><br />
              <div class="forgot-pass">
              <a href="mail-form.php">forgot your password?</a>
              </div>
              

              <input class="submit-form" type="submit" value="Log in" />
            </form>
            <div class="bottom">
              <hr><br />
              <div>
              <p>Don't have an account? </p>  
              <p><a href="create-acc.php">Create account</a></p>
              </div>
              
            </div>
            
        </div>
    </div>
      

        <?php
        session_start();

        require("mysql.php");

        if (isset($_POST['email']) && isset($_POST['password'])) {
            
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($conexiune, $sql);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $hashed_password = $row['parola'];
                if (password_verify($password, $hashed_password)) {
                    $_SESSION['email'] = $email;
                    $_SESSION['name'] = $row['name'];
                    header("Location: index.php");
                    exit();
                } else {
                    echo "Parola incorecta.";
                }
            } else {
                echo "User not found.";
            }
        }
        ?>
</body>
</html>

