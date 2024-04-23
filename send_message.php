<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "acaciamarketadmin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    // Retrieve form data
    $sendername = $_POST['sendername'];
    $sendertype = $_POST['sendertype'];
    $senderemail = $_POST['senderemail'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $recipient_Id = 'admin'; // You need to set the admin's user ID here
    $createdAt = date('Y-m-d H:i:s'); // Current timestamp

    // Insert message into database
    $sql = "INSERT INTO messages (sendername, sendertype, senderemail, recipient_id, subject, message, createdAt)
            VALUES ('$sendertype', '$sendername', '$senderemail', '$recipient_Id', '$subject', '$message', '$createdAt')";
    
    if ($conn->query($sql) === TRUE) {
        echo "messages sent successfully";
    } else {
        echo "Error : " . $conn->error;
    }
    // Close database connection
    $conn->close();
?>
