<?php include_once('../config/config.php');
// Assuming you have already established a MySQL database connection

// Check if the user is authorized
// You need to implement your own logic to authenticate the user
$isAuthorized = true; // Set it to true if the user is authorized

if (!$isAuthorized) {
    echo "Unauthorized access!";
    exit;
}


// Retrieve users data from the "users" table
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Error: " . mysqli_error($conn);
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Administer Users</title>
</head>
<body>
    <h2>Administer Users</h2>
    <table>
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>IP Address</th>
            <th>Last Login</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['ipaddr']; ?></td>
            <td><?php echo $row['last_login']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>