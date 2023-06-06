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
    $eventDesc = $_POST["event_desc"];
    $eventBudget = $_POST["event_budget"];
    $creatorId = $_POST["creator_id"];
    $eventStartDate = $_POST["event_start_date"];
    $expiry = $_POST["expiry"];

    // Insert data into the "events" table
    $sql = "INSERT INTO events (event_desc, event_budget, creator_id, event_start_date, expiry)
            VALUES ('$eventDesc', '$eventBudget', '$creatorId', '$eventStartDate', '$expiry')";

    if (mysqli_query($conn, $sql)) {
        echo "Event inserted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Retrieve events data from the "events" table
$sql = "SELECT * FROM events";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Error: " . mysqli_error($conn);
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Events</title>
</head>
<body>
    <h2>Events</h2>
    <table>
        <tr>
            <th>Event ID</th>
            <th>Event Description</th>
            <th>Event Budget</th>
            <th>Creator ID</th>
            <th>Event Start Date</th>
            <th>Expiry</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['event_id']; ?></td>
            <td><?php echo $row['event_desc']; ?></td>
            <td><?php echo $row['event_budget']; ?></td>
            <td><?php echo $row['creator_id']; ?></td>
            <td><?php echo $row['event_start_date']; ?></td>
            <td><?php echo $row['expiry']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>Add Event</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="event_desc">Event Description:</label>
        <input type="text" name="event_desc" id="event_desc" required><br>

        <label for="event_budget">Event Budget:</label>
        <input type="text" name="event_budget" id="event_budget" required><br>

        <label for="creator_id">Creator ID:</label>
        <input type="text" name="creator_id" id="creator_id" required><br>

        <label for="event_start_date">Event Start Date:</label>
        <input type="datetime-local" name="event_start_date" id="event_start_date" required><br>

        <label for="expiry">Expiry:</label>
        <input type="datetime-local" name="expiry" id="expiry"><br>

        <input type="submit" value="Add Event">
    </form>
</body>
</html>