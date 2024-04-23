
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/icon.jpg" type="images/png">
    <title>User Management</title>
    <h1>Weclome to the User Management dashboard!</h1>

     <header>
    <h1>User-Management!</h1>
    <nav>
        <ul>
            <li><a href="includes/dashboard.php">Home</a></li>
            <li><a href="../usermanagement.php">Users</a></li>
            <li class="dropdown">
                <a href="includes/settings.php">Settings</a>
                <div class="dropdown-content">
                    <a href="../admin.php">Profile</a>
                   
                </div>
            </li>
            <li><a href="includes/logout.php">Logout</a></li>
        </ul>
    </nav>
</header>
    <style>
        .markets {
            background-color: #f2f2f2;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        nav ul li {
            margin-right: 20px;
        }
        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        nav ul li a:hover {
            background-color: #555;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 120px;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown-content a {
            color: #fff;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .dropdown-content a:hover {
            background-color: #555;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
</style>

<body>

<!-- User Management Section -->
<section id="user-management">
    <h2>User Management</h2>
<div class="styling">

<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "acaciamarketdirectory";

$conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    
    //  existing users
    $sql = "SELECT UserID, email, username, password, createdAt, UpdatedAt FROM usersauthentication ";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<h2>Users List</h2>";
        echo "<table class='user-table'>";
        echo "<tr><th>User ID</th><th>Email</th><th>Password</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
    
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<tr>";
            echo "<td>" . $row['UserID'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>" . $row['createdAt'] . "</td>";
            echo "<td>" . $row['UpdatedAt'] . "</td>";
echo "<td><div class='btn-delete'><a href='includes/delete_users.php?id=" . $row['UserID'] . "'>Delete</a></div></td>";
echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No users found.";
    }
    ?>

</div>
</section>
<hr>
<section id="featured-businesses">
    <h2>Featured Businesses</h2>
    <div class="featuredbusinesses">
        <style>
            body{
                background-color: #f4f4f4;
            }
#featured-businesses {
    margin-top: 30px;
    padding: 20px;
    background-color: #f4f4f4;
}

.featuredbusinesses {
    margin-top: 20px;
}

.business-form {
    margin-top: 20px;
    max-width: 400px;
}

.form-header {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
}

.form-group {
    margin-bottom: 15px;
}

.user-table {
    border-collapse: collapse;
  width: 100%;
  margin-top: 20px;
}

.user-table th, .user-table td {
    text-align: left;
  padding: 8px;
  border: 1px solid #ddd;
}

.user-table th {
    background-color: #f2f2f2;
}

.success-message {
    color: green;
    font-weight: bold;
}

.error-message {
    color: red;
    font-weight: bold;
}
.btn {
  background-color: #000;
  color: white;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
}
.btn-edit,
.btn-delete {
    display: inline-block;
    padding: 5px 10px;
    background-color: #000; 
    color: white;
    text-decoration: none;
    border-radius: 5px;
}
.btn-edit a,
.btn-delete a{
    color: white;
}
.btn-edit:hover,
.btn-delete:hover {
    background-color: #45a049;
}

            </style>
        <?php
        $servername  = 'localhost';
        $username = '';  
        $password = ''; 
        $dbname = 'acaciamarketdirectory';

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
     
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_business"])) {
                        $image_url = $conn->real_escape_string($_POST['image_url']);
                        $name = $conn->real_escape_string($_POST['name']);
                    $description = $conn->real_escape_string($_POST['description']);
                    $link = $conn->real_escape_string($_POST['link']);


                        $sql = "INSERT INTO featuredbusinesses (image_url, name, description, link, CreatedAt, UpdatedAt)
                                VALUES ('$image_url)', '$name', '$description', '$link', NOW(), NOW())";
        
                        if ($conn->query($sql) === TRUE) {
                            echo "<p class='success-message'>Business added successfully</p>";
                        } else {
                            echo "<p class='error-message'>Error adding Business: " . $conn->error . "</p>";
                        }
                    }
        
                    echo "<form method='post' action='usermanagement.php' class='business-form'>";
                    echo "<div class='form-header'><b>Add New Featured Business</b></div>";
                    echo "<div class='form-group'>Image: <input type='text' name='image_url'></div>";
                    echo "<div class='form-group'>Name: <input type='text' name='name'></div>";
                    echo "<div class='form-group'>Description: <input type='text' name='description'></div>";
                    echo "<div class='form-group'>Website Link: <input type='text' name='link'></div>";
                    echo "<input type='submit' name='add_business' value='Add Business' class='btn'>";
                    echo "</form>";
        
                    $sql = "SELECT FeaturedID, VendorID, image_url, name, description, link, CreatedAt, UpdatedAt FROM featuredbusinesses";
                    $result = $conn->query($sql);
        
                    if ($result->num_rows > 0) {
                        echo "<h2>List of featured Businesses</h2>";
                        echo "<table class='user-table'>";
                        echo "<tr><th>FeaturedID</th><th>Vendor ID</th><th>Name</th><th>Description<th>link</th></th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
        
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['FeaturedID'] . "</td>";
                            echo "<td>" . $row['VendorID'] . "</td>";
                            echo "<td>" . $row['image_url'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['description'] . "</td>";
                            echo "<td>" . $row['link'] . "</td>";
                            echo "<td>" . $row['CreatedAt'] . "</td>";
        echo "<td>" . $row['UpdatedAt'] . "</td>";
        echo "<td><div class='btn-delete'><a href='includes/delete_business.php?id=" . $row['FeaturedID'] . "'>Delete</a></div></td>";
        echo "</tr>";
        
                        }
                        echo "</table>";
                    } else {
                        echo "<p>No businesses found.</p>";
                    }
        
                    ?>
                </div>
            </section>     
</div>
</section>
<hr>
<section id="event-management">
        <h2>Event Management</h2>
        <div class="event-management">
            <?php
            $servername = 'localhost';
            $username = '';  
            $password = ''; 
            $dbname = 'acaciamarketdirectory';

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["add_event"])) {
                    $image_path = $conn->real_escape_string($_POST['image_path']);
                    $eventName = $conn->real_escape_string($_POST['event_name']);
                    $eventDate = $conn->real_escape_string($_POST['event_date']);
                    $location = $conn->real_escape_string($_POST['location']);
                    $description = $conn->real_escape_string($_POST['description']);

                    $sql = "INSERT INTO events (image_path, eventname, eventdate, location, description)
                            VALUES ('$image_path', '$eventName', '$eventDate', '$location', '$description')";

                    if ($conn->query($sql) === TRUE) {
                        echo "<p class='success-message'>Event added successfully</p>";
                    } else {
                        echo "<p class='error-message'>Error adding Event: " . $conn->error . "</p>";
                    }
                } elseif (isset($_POST["edit_event"])) {
                   
                }
            }
            echo "<form method='post' action='usermanagement.php' class='event-form'>";
            echo "<div class='form-header'><b>Add New Event</b></div>";
            echo "<div class='form-group'>Event Name: <input type='text' name='event_name'></div>";
            echo "<div class='form-group'>Image: <input type='text' name='image_path'></div>";
            echo "<div class='form-group'>Event Date: <input type='date' name='event_date'></div>";
            echo "<div class='form-group'>Location: <input type='text' name='location'></div>";
            echo "<div class='form-group'>Description: <input type='text' name='description'></div>";
            echo "<input type='submit' name='add_event' value='Add Event' class='btn'>";
            echo "</form>";

            $sql = "SELECT eventID, image_path, eventname, eventdate, location, description FROM events";
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {
                echo "<h2>List of Events</h2>";
                echo "<table class='user-table'>";
                echo "<tr><th>Event ID</th><th>Image</th><th>Event Name</th><th>Event Date</th><th>Location</th><th>Description</th><th>Action</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<tr>";
                    echo "<td>" . $row['eventID'] . "</td>";
                    echo "<td>" . $row['image_path'] . "</td>";
                    echo "<td>" . $row['eventname'] . "</td>";
                    echo "<td>" . $row['eventdate'] . "</td>";
                    echo "<td>" . $row['location'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
        echo "<td><div class='btn-delete'><a href='includes/delete_event.php?id=" . $row['eventID'] . "'>Delete</a></div></td>";
        echo "</tr>";
        
                }
                echo "</table>";
            } else {
                echo "<p>No events found.</p>";
            }

            ?>
        </div>
    </section>



</body>

</html>
