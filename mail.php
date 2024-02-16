<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = 'ravindupbalasooriya@gmail.com';
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 0; // Disable debugging in production
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls'; // Change to 'tls'
        $mail->Port = 587; // Update port for 'tls'

        // Replace with your actual Gmail email and password, ideally stored securely
        $mail->Username = 'arunodyapawuluarachchi@gmail.com'; // YOUR gmail email
        $mail->Password = 'djci ewry moac wmvk'; // YOUR gmail password

        // Sender and recipient settings
        $mail->setFrom($email, $name);
        $mail->addAddress('arunodyapawuluarachchi@gmail.com', 'Arunodya'); // Change to your email and name

        // Setting the email content
        $mail->isHTML(true); 
        $mail->Subject = $subject;
        $mail->Body = nl2br($message);
        $mail->AltBody = strip_tags($message);

        $mail->send();
        echo json_encode(['status' => 'success', 'message' => 'Email message sent.']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => "Error in sending email. Mailer Error: {$mail->ErrorInfo}"]);
    }
}
?>
