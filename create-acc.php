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
          <h2>Create account</h2>
            <form action="" method="POST">
              <input class="text-form" type="name" name="name" placeholder="Name" required /><br /><br />

              <input class="text-form" type="email" name="email" placeholder="Email" required /><br /><br />

              <input class="text-form" type="password" name="password" placeholder="Password" required /><br /><br />

              <input class="submit-form" type="submit" name="create" value="Create" />
            </form>
            <div class="bottom">
              <hr><br />
              <div>
              <p>Already have an account? </p>  
              <p><a href="login.php">Log in here</a></p>
              </div>
              
            </div>
            
        </div>
    </div>
    
    

    <?php
          session_start();
          use PHPMAiler\PHPMAiler\PHPMAiler;
          use PHPMAiler\PHPMAiler\Exception;

          require 'PHPMailer/src/Exception.php';
          require 'PHPMailer/src/PHPMailer.php';
          require 'PHPMailer/src/SMTP.php';
          
          require("mysql.php");

         if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $name=$_POST['name'];

            $sql = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($conexiune, $sql);

            

            if (mysqli_num_rows($result) > 0) {
                echo "User already exists.";
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (email, parola, name) VALUES ('$email', '$hashed_password', '$name')";
                
                  $mail=new PHPMailer();
        
                  $mail->isSMTP();
                  $mail->Host='smtp.sendgrid.net';
                  $mail->SMTPAuth=true;
                  $mail->Username='apikey';
                  $mail->Password='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';
                  $mail->SMTPSecure='ssl';
                  $mail->Port=465;
        
                  $mail->setFrom('ethernet.courses@gmail.com', 'eCourses');
                  $mail->addAddress($email, 'User');
                  $mail->isHTML(true);
        
                  $mail->Subject='your account was created successfully!';
                  $mail->Body='Hello '.$name.'.<br> Your account was created successfully. Wellcome to our team!';
                  if(!$mail->send()){
                    echo 'Mailer error: '.$mail->ErrorInfo;
                  }
                
                if (mysqli_query($conexiune, $sql)) {
                    echo "Registration successful. Please log in.";
                    header("Location: login.php"); 
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conexiune);
                }
            }
         }
    ?>

  </body>
</html>