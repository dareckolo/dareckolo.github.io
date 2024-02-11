<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Hash and encrypt the password (you may use a stronger encryption method)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Save the username and hashed password to a file (you may use a database for better security)
    $data = "$username:$hashedPassword\n";
    file_put_contents("users.txt", $data, FILE_APPEND);

    // Redirect to a success page
    header("Location: success.html");
    exit();
} else {
    // Handle unsupported request method (optional)
    http_response_code(405);
    exit("Method Not Allowed");
}
?>
