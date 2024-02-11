<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform login authentication (you can replace this with your own logic)
    // For simplicity, this example checks against a hard-coded username and password
    $validUsername = "example";
    $validPasswordHash = password_hash("password", PASSWORD_DEFAULT); // Replace "password" with the actual hashed password

    // Check if the provided username exists and the password is correct
    if ($username === $validUsername && password_verify($password, $validPasswordHash)) {
        // Redirect to a success page
        header("Location: success.html");
        exit();
    } else {
        // Redirect back to the login page with an error message
        header("Location: login.html?error=invalid");
        exit();
    }
} else {
    // Handle unsupported request method (optional)
    http_response_code(405);
    exit("Method Not Allowed");
}
?>