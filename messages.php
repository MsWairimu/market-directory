
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/icon.jpg" type="image/jpg">
    <title></title>
    <h1>Inbox</h1>
    <style>
.messages-container {
  max-width: 600px;
  margin: 0 auto;
}

.message {
  background-color: #f9f9f9;
  border: 1px solid #ddd;
  margin-bottom: 20px;
  padding: 10px;
}

.message-header {
  display: flex;
  justify-content: space-between;
  margin-bottom: 10px;
}

.message-sender {
  font-weight: bold;
}

.message-time {
  color: #999;
}

.message-body p {
  margin: 5px 0;
}

.message-body a {
  color: #007bff;
  text-decoration: none;
}

.message-body a:hover {
  text-decoration: underline;
}

</style>
</head>
<body>

<section id="vendor">
  <div class="">
  <?php
$servername = "localhost";
$username = "localhost"; 
$password = "Kabuu@2024"; 
$dbname = "acaciamarketadmin";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT Your_name, Business_Description, Location, Phone, Business_Name, Business_type, Website, createdAt FROM vendor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Vendor Requests:</h2>";
    echo "<div class='messages-container'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='message'>";
        echo "<div class='message-header'>";
        echo "<span class='message-sender'>" . $row['Your_name'] . "</span>";
        echo "<span class='message-time'>" . $row['createdAt'] . "</span>";
        echo "</div>";
        echo "<div class='message-body'>";
        echo "<hr>";
        echo "<p><strong>Business Description:</strong> " . $row['Business_Description'] . "</p>";
        echo "<hr>";
        echo "<p><strong>Location:</strong> " . $row['Location'] . "</p>";
        echo "<hr>";
        echo "<p><strong>Phone:</strong> " . $row['Phone'] . "</p>";
        echo "<hr>";
        echo "<p><strong>Business Name:</strong> " . $row['Business_Name'] . "</p>";
        echo "<hr>";
        echo "<p><strong>Business Type:</strong> " . $row['Business_type'] . "</p>";
        echo "<hr>";
        echo "<p><strong>Website:</strong> <a href='" . $row['Website'] . "' target='_blank'>" . $row['Website'] . "</a></p>";
        echo "</div>"; 
        echo "</div>"; 
    }
    echo "</div>"; 
} else {
    echo "<p>No messages for the admin.</p>";
}
// Close connection
$conn->close();
?>
  </div>
</section>
</body>
</html>

<hr>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/icon.jpg" type="image/jpg">
    <h2>Messages</h2>
</head>
<style>

    body {
        background-color: #ddd;
    }
    h2{
        text-align: center;
    }
    h1 {
  border: 2px aquamarine;
  padding: 10px;
  display: inline-block;
background-color: aquamarine;
    }
.messages-container {
  max-width: 600px;
  margin: 0 auto;
}

.message {
  background-color: #f2f2f2;
  border: 1px solid #ddd;
  margin-bottom: 20px;
  padding: 10px;
}

.message-header {
  display: flex;
  justify-content: space-between;
  margin-bottom: 10px;
}

.message-sender {
  font-weight: bold;
}

.message-time {
  color: #999;
}

.message-body p {
  margin: 5px 0;
}

.message-body a {
  color: #007bff;
  text-decoration: none;
}

.message-body a:hover {
  text-decoration: underline;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
}

th, td {
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:nth-child(odd) {
    background-color: #ffffff;
}

</style>
<body>
<section id="users">
  <div class="">
  <?php
$servername = "localhost";
$username = "localhost"; 
$password = "Kabuu@2024"; 
$dbname = "acaciamarketadmin";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT sendername, sendertype, sender_id, subject, message, senderemail, createdAt FROM messages";
$result = $conn->query($sql);


if ($result->num_rows > 0)  { 
    echo "<h2></h2>";
echo "<div class='messages-container'>";
echo "<div class='table'>";
  while ($row = $result->fetch_assoc()) {
    echo "<div class='message'>";
    echo "<div class='message-header'>";
    echo "<span class='message-sender'>" . $row['sendername'] . "</span>";
    echo "<span class='message-time'>" . $row['createdAt'] . "</span>";
    echo "</div>";
    echo "<div class='message-body'>";
    echo "<hr>";
    echo "<p><strong>Subject:</strong> " . $row['subject'] . "</p>";
    echo "<hr>";
    echo "<p><strong>Message:</strong> " . $row['message'] . "</p>";
    echo "<hr>";
    echo "<p><strong>Email:</strong> " . $row['senderemail'] . "</p>";
    echo "</div>"; 
    echo "</div>"; 
  } 
  echo "</div>"; 
} else {
    echo "<p>No messages for the admin.</p>";
}
?>
  </div>
</section>
</body>
</html>
<hr>
