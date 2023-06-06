<?php include_once('../config/config.php');
// Assuming you have already established a MySQL database connection

// Check if the user is authorized
// You need to implement your own logic to authenticate the user
$isAuthorized = true; // Set it to true if the user is authorized

if (!$isAuthorized) {
    echo "Unauthorized access!";
    exit;
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
</body>
</html>