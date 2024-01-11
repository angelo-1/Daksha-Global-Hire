<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST["send"])){
    $name = $_POST["username"];
    $email = $_POST["usermail"];
    $message = $_POST["usermessage"];
    $phone = $_POST["userphone"];
    $mail = new PHPMailer(true);                              // Passing `true` enables
    // exceptions to be thrown if an error occurs.
    try {
        // Specify main and backup SMTP servers.
        $mail->isSMTP();                                      // Set mailer to use SMTP.
        $mail->Host = "smtp.gmail.com";  //"smtp1
        $mail->SMTPAuth = true;                               // Enable SMTP authentication.
        $mail->Username = "ww5152796@gmail.com";                 // SMTP username
        $mail->Password = "vfuc zvsp ygfa uhxr";                           // SMTP password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;                                    // TCP port to connect to
        $mail->setFrom('ww5152796@gmail.com');
        $mail->addAddress("angelorajesh24820@gmail.com");     // Add a recipient
        $mail->isHTML(true);
        $subject = "Message From Website";
        $content = "Name: $name
                    Email: $email 
                    Phone: $phone
                    Message:$message";
        $mail->Subject = htmlspecialchars($subject, ENT_QUOTES);
        $mail->Body    = htmlspecialchars($content, ENT_QUOTES);
        $mail->AltBody = strip_tags($content);
        $mail->send();
        echo '<script>
        alert("Thank you for getting in touch, we will reach back to you in a short time");
        window.location="index.php";
        </script>';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            }else{
                echo '';

                }
?>