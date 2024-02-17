<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once './vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $customTitle = $_POST['customTitle'];
    $name = $_POST['Name'];
    $email = $_POST['email'];
    $company = $_POST['company'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug =  2;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls'; // Use TLS
        $mail->Port =  587; // Standard port for TLS

        $mail->Username = 'arunodyapawuluarachchi@gmail.com';
        $mail->Password = 'sqpp xqax wkrv azsg'; // Use an App Password for Gmail

        $mail->setFrom($email, $name);
        $mail->addAddress('arunodyapawuluarachchi@gmail.com', 'Arunodya');

        $mail->isHTML(true);
        $mail->Subject = "New Message from {$name}";
        $mail->Body = "
        <p><strong>Title:</strong> {$title}</p>
        <p><strong>Custom Title:</strong> {$customTitle}</p>
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Company:</strong> {$company}</p>
        <p><strong>Message:</strong></p>
        <p>{$message}</p>
        ";

        $mail->AltBody = strip_tags($message);

        $mail->send();
        echo json_encode(['status' => 'success', 'message' => 'Email message sent.']);
    } catch (Exception $e) {
        // Log the error details to a file
        error_log("Error in sending email. Mailer Error: {$mail->ErrorInfo}");
        echo json_encode(['status' => 'error', 'message' => "Error in sending email."]);
    } finally {
        $mail->smtpClose();
    }
}
?>
