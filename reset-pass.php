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
                <h2>Reset Password</h2>
                <p>Please, enter a new password and make sure <br />you write it correctly and remember it</p>
                    <form action="" method="POST">
                    <input class="text-form" type="email" name="email" placeholder="Email" required /><br /><br />

                    <input class="text-form" type="password" name="password" placeholder="Password" required /><br /><br />

                    <input class="text-form" type="password" name="conf_password" placeholder="Confirm Password" required /><br /><br />
                    
                    <input class="submit-form" type="submit" value="Reset Password" />
                    </form>
            </div>
    </div>
    
    <?php
          require("mysql.php");
          
          use PHPMAiler\PHPMAiler\PHPMAiler;
          use PHPMAiler\PHPMAiler\Exception;

          require 'PHPMailer/src/Exception.php';
          require 'PHPMailer/src/PHPMailer.php';
          require 'PHPMailer/src/SMTP.php';

         if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['conf_password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $conf_password=$_POST['conf_password'];

            $sql = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($conexiune, $sql);

            
            if($conf_password==$password){
                    if (mysqli_num_rows($result) > 0) {
                        $hashed_password = password_hash($conf_password, PASSWORD_DEFAULT);
                        $sql = "UPDATE users set parola='$hashed_password' where email='$email'";
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
                
                        $mail->Subject='New Password';
                        $mail->Body='Hello, '.$row['name'].'<br /><br />Your password was reseted successfully.';
                        if(!$mail->send()){
                            echo 'Mailer error: '.$mail->ErrorInfo;
                        }  
                        if (mysqli_query($conexiune, $sql)) {
                            echo "Password reset successful. Please log in.";
                            header("Location: login.php"); 
                            exit();
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conexiune);
                        }
                    } else {
                        
                       echo "Don't found the user!";                      
                    }
            }else{
                echo "Please enter correct confirmation password!";
            }
            
         }
    ?>

</body>
</html>