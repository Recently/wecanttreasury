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
    $userId = $_POST["user_id"];
    $eventId = $_POST["event_id"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $type = $_POST["type"];
    $amount = $_POST["amount"];

    // Insert data into the "treasury" table
    $sql = "INSERT INTO treasury (user_id, event_id, title, description, type, amount)
            VALUES ('$userId', '$eventId', '$title', '$description', '$type', '$amount')";

    if (mysqli_query($conn, $sql)) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Data to Treasury</title>
</head>
<body>
    <h2>Add Data to Treasury</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="user_id">User ID:</label>
        <input type="text" name="user_id" id="user_id" required><br>

        <label for="event_id">Event ID:</label>
        <input type="text" name="event_id" id="event_id" required><br>

        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required><br>

        <label for="description">Description:</label>
        <input type="text" name="description" id="description" required><br>

        <label for="type">Type:</label>
        <input type="text" name="type" id="type" required><br>

        <label for="amount">Amount:</label>
        <input type="text" name="amount" id="amount" required><br>

        <input type="submit" value="Add Data">
    </form>
</body>
</html>