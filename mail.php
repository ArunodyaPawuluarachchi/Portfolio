<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form fields are filled
    if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["subject"]) && !empty($_POST["message"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];
        
        // Define the recipient email address
        $recipient = "arunodyapawuluarachchi@gmail.com"; // Replace with your email address
        
        // Create the email headers
        $headers = "From: $email" . "\r\n" .
                   "Reply-To: $email" . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();
        
        // Subject and email body
        $emailSubject = "Contact Form Message: $subject";
        $emailBody = "You have received a new message from your website contact form.\n\n".
                     "Here are the details:\n\n".
                     "Name: $name\n\n".
                     "Email: $email\n\n".
                     "Subject: $subject\n\n".
                     "Message:\n$message";
        
        // Send the email using PHP's mail function
        if (mail($recipient, $emailSubject, $emailBody, $headers)) {
            echo "Thank you for contacting us. Your message has been sent.";
        } else {
            echo "Sorry, there was a problem sending your message. Please try again.";
        }
    } else {
        echo "Please fill in all the required fields.";
    }
} else {
    echo "Access denied.";
}
?>
