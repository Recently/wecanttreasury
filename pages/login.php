<?php include_once('../config/config.php');
// Assuming you have already established a MySQL database connection

// Check if the user is authorized
// You need to implement your own logic to authenticate the user
$isAuthorized = true; // Set it to true if the user is authorized

if (!$isAuthorized) {
    echo "Unauthorized access!";
    exit;
}


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $ipAddress = $_SERVER["REMOTE_ADDR"];
    $currentDateTime = date("Y-m-d H:i:s");

    // Check if the username and password are valid
    // You need to implement your own logic to authenticate the user
    if ($username === "admin" && $password === "password") {
        // Update user's last login IP address and date/time
        $sql = "UPDATE users SET ipaddr = '$ipAddress', last_login = '$currentDateTime' WHERE username = '$username'";

        if (mysqli_query($conn, $sql)) {
            echo "Login successful! Last login: $currentDateTime";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>