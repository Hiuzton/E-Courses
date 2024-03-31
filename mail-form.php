<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          <h2>Enter Email</h2>
          <p>Please, enter your email to send link to reset <br /> your password</p>
            <form action="" method="POST">
              <input class="text-form" type="email" name="email" placeholder="Email" required /><br /><br />

              <input class="submit-form" type="submit" value="Send" />
            </form>
                       
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

         if (isset($_POST['email'])) {
            $email = $_POST['email'];            

            $sql = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($conexiune, $sql);
            $row = mysqli_fetch_assoc($result);
             
            if (mysqli_num_rows($result) > 0) {
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
        
                  $mail->Subject='Password reset link';
                  $mail->Body='Hello, '.$row['name'].'<br /><br />If you forgot your password and want to reset your password click on the link below: <br /><br />
                  <a href="http://localhost/final_project/reset-pass.php">tap to reset</a>';
                  if(!$mail->send()){
                    echo 'Mailer error: '.$mail->ErrorInfo;
                  } else {
                    if (mysqli_query($conexiune, $sql)) {
                        echo "Registration successful. Please log in.";
                        header("Location: login.php"); 
                        exit();
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conexiune);
                    }
                }
            }
        }        
    ?>
</body>
</html>