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
    $discordId = $_POST["discord_id"];
    $data = $_POST["data"];
    $balance = $_POST["balance"];
    $donation = $_POST["donation"];
    $unclaimed = $_POST["unclaimed"];

    // Insert data into the "participants" table
    $sql = "INSERT INTO participants (discord_id, data, balance, donation, unclaimed)
            VALUES ('$discordId', '$data', '$balance', '$donation', '$unclaimed')";

    if (mysqli_query($conn, $sql)) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Retrieve participants data from the "participants" table
$sql = "SELECT * FROM participants";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Error: " . mysqli_error($conn);
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Participants</title>
</head>
<body>
    <h2>Participants</h2>
    <table>
        <tr>
            <th>Participant ID</th>
            <th>Discord ID</th>
            <th>Data</th>
            <th>Balance</th>
            <th>Donation</th>
            <th>Unclaimed</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['participant_id']; ?></td>
            <td><?php echo $row['discord_id']; ?></td>
            <td><?php echo $row['data']; ?></td>
            <td><?php echo $row['balance']; ?></td>
            <td><?php echo $row['donation']; ?></td>
            <td><?php echo $row['unclaimed']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>Add Participant</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="discord_id">Discord ID:</label>
        <input type="text" name="discord_id" id="discord_id" required><br>

        <label for="data">Data:</label>
        <input type="text" name="data" id="data"><br>

        <label for="balance">Balance:</label>
        <input type="text" name="balance" id="balance"><br>

        <label for="donation">Donation:</label>
        <input type="text" name="donation" id="donation"><br>

        <label for="unclaimed">Unclaimed:</label>
        <input type="text" name="unclaimed" id="unclaimed" required><br>

        <input type="submit" value="Add Participant">
    </form>
</body>
</html>