<?php
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);

    //print_r($_REQUEST); exit;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require './PHPMailer/src/Exception.php';
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';

    // Load Composer's autoloader
//require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.sendgrid.net';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'TradingGyan';                     // SMTP username
    $mail->Password   = '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';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('no-reply@trapatecnoziant.com');
    $mail->addAddress('paurushankit5@gmail.com.net');     // Add a recipient
    $mail->addReplyTo('no-reply@trapatecnoziant.com');

    // Attachments
    $mail->addAttachment($_FILES['userResume']['tmp_name']);         // Add attachments

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'New Resumed Posted from '.$_REQUEST['userName'];
    $mail->Body    = "<ul>
                        <li>Name: <b>".$_REQUEST['userName']."</b></li>
                        <li>Email: <b>".$_REQUEST['userEmail']."</b></li>
                        <li>Phone: <b>".$_REQUEST['userPhone']."</b></li>
                    </ul>";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: ";
}
?>