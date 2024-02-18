<!-- login.php -->

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
        // Debugging
        var_dump($_POST);  // Check the values being received in $_POST
    
        $email = $_POST['email'] ?? '';  // Use the null coalescing operator to provide a default value
        $password = $_POST['password'] ?? '';

        // Validate email and password (add more validation as needed)

        $stmt = $db->prepare("SELECT * FROM access_table WHERE email = :email AND password = :password");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Authentication successful
            $_SESSION['user'] = $user;  // Store user data in session
            header('Location: index.html');  // Redirect to index.html
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
