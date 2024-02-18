<?php
session_start();

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'portfolioaccess';

try {
    $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $stmt = $db->prepare("SELECT * FROM access_table WHERE email = :email AND password = :password");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Authentication successful
            $_SESSION['user'] = $user;

            // Send email to the website owner
            $to = 'owner@example.com'; // Replace with the owner's email address
            $subject = 'New Login Notification';
            $message = "A user with the email {$email} has just logged in.";
            $headers = 'From: webmaster@example.com' . "\r\n" .
                       'Reply-To: webmaster@example.com' . "\r\n" .
                       'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);

            header('Location: index.html');
            exit();
        } else {
            // Authentication failed
            echo "Invalid email or password";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
