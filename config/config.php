<?php 
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "clan-treasury";
$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if($conn){
	//echo "Connected";

}
else{
	echo "Connection Failed";
}
function addActionToLog($actionId, $userId, $eventId = null)
{
    // Get the current timestamp
    $timestamp = date("Y-m-d H:i:s");

    // Insert data into the "actionlog" table
    $sql = "INSERT INTO actionlog (action_id, user_id, event_id, timestamp)
            VALUES ('$actionId', '$userId', '$eventId', '$timestamp')";

    if (mysqli_query($conn, $sql)) {
        echo "Action added to log successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Example usage:
$actionId = 123; // Replace with the actual action ID from the treasury table
$userId = 456; // Replace with the actual user ID
$eventId = 789; // Replace with the actual event ID (optional)

// Call the function to add the action to the log
addActionToLog($actionId, $userId, $eventId);
?>