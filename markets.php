<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/icon.jpg" type="images/jpg">

    <title>Market Cover Page</title>
    <style>
body {
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F5F5DC;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .cover img {
            width: 50vh;
            max-height: 300px;
            object-fit: cover;
            border-radius: 5px;
        }
        h1 {
            margin: 10px 0;
            color: #333;
        }
        p {
            margin: 5px 0;
            color: #666;
        }
        .about-section, .faq-section {
            margin-top: 20px;
        }
        .about-section h2, .faq-section h2 {
            margin-bottom: 10px;
            color: #333;
        }
        /* Media Query for responsiveness */
        @media (max-width: 600px) {
            .container {
                padding: 10px;
            }
            .cover img {
                max-height: 200px;
            }
        }
    </style>
</head>
<body>
    <?php
    // Assuming you have a database connection established
    $dbHost = 'localhost';
    $dbUser = '';
    $dbPass = '';
    $dbName = 'acaciamarketdirectory';

    // Connect to the database
    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
  $MarketID = '103'; 

  // Query the database
  $sql = "SELECT image, MarketName, about, workinghours, FAQs FROM markets WHERE MarketID = '$MarketID'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo "<div class='container'>";
      echo "<div class='cover'>";
      echo "<img src='{$row['image']}' alt='Market Image'>";
      echo "<h1>{$row['MarketName']}</h1>";
      echo "</div>";
      echo "<div class='market-info'>";
      echo "<p><strong>Working Hours:</strong> {$row['workinghours']}</p>";
      echo "<div class='about-section'>";
      echo "<h2>About</h2>";
      echo "<p>{$row['about']}</p>";
      echo "</div>";
      echo "<div class='faq-section'>";
      echo "<h2>FAQs</h2>";
      echo "<p>{$row['FAQs']}</p>";
      echo "</div>";
      echo "</div>";
      echo "</div>";
  } else {
      echo "<div class='container'>";
      echo "<div class='cover'>";
      echo "<img src='default_cover_image.jpg' alt='Default Cover Image'>";
      echo "<h1>Market Not Found</h1>";
      echo "</div>";
      echo "</div>";
  }

  ?>
</body>
</html>
<style>
.user-review-box {
    margin: 20px;
   
    padding: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    max-width: 300px; 
}

.user-review-box form {
    display: flex;
    flex-direction: column;
    text-align: center;
    align-items: center;
}

.user-review-box label {
    font-weight: bold;
}

.user-review-box input[type="text"],
.user-review-box textarea {
    margin: 10px 0;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    width: 100%;
    box-sizing: border-box; 
}

.star-rating {
    margin: 10px 0;
}

.star-rating input[type="radio"] {
    display: none; 
}

.star-rating label {
    font-size: 25px;
    color: #aaa;
    cursor: pointer;
}

.star-rating label:before {
    content: '\2605'; 
}

.star-rating input[type="radio"]:checked ~ label {
    color: #fbc02d; 
}

.user-review-box textarea {
    resize: vertical; }

.user-review-box input[type="submit"] {
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    width: 150px;
}
.message-container {
    display: flex;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
}

.profile-image {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-right: 10px;
}

.message-content {
    display: flex;
    flex-direction: column;
    flex: 1;
}

.message-header {
    font-weight: bold;
    display: flex;
    align-items: center;
}

.message-header p {
    margin: 0;
    font-size: 14px; 
}

.message-info {
    display: flex;
    flex-direction: column;
    margin-left: 10px; 
}

.message-rating {
    color: #f39c12;
    margin-top: 5px; 
}

.message-review {
    margin-top: 5px; 
}


</style>

<!-- User Review Box -->
<div class="user-review-box">
    <h1>Add a Review</h1>
    <form action="userreviews.php" method="post">
        <input type="text" id="username" name="username" placeholder="Your Name:" required><br>
        <input type="text" id="MarketName" name="MarketName" placeholder="Markets Name:" required><br>
        <input type="text" id="Location" name="Location" placeholder="Location:" required><br>
        <div class="star-rating">
            <input type="radio" id="star5" name="rating" value="5"><label for="star5"></label>
            <input type="radio" id="star4" name="rating" value="4"><label for="star4"></label>
            <input type="radio" id="star3" name="rating" value="3"><label for="star3"></label>
            <input type="radio" id="star2" name="rating" value="2"><label for="star2"></label>
            <input type="radio" id="star1" name="rating" value="1"><label for="star1"></label>
        </div>
        
        <textarea name="comment" placeholder="Your Review" required></textarea><br>
        <input type="submit" name="submit_review" value="Submit Review">
    </form>
</div>

<div class="review-container">
  
    <?php
    $servername = "localhost";
    $username = "";
    $password = "";
    $dbname = "acaciamarketadmin";

    // Creating connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Inserting a review into the database
    if (isset($_POST['submit_review'])) {
        $username = $_POST['username'];
        $MarketName = $_POST['MarketName '];
        $Location = $_POST['Location'];
        $review = $_POST['comment'];
        $rating = $_POST['rating'];
        $CreatedAt = $_POST['CreatedAt'];

        $sql = "INSERT INTO userreviews (username, MarketName, Location, Review, Rating, CreatedAt) VALUES ('$username', '$MarketName', '$Location', '$review', '$rating', NOW())";

        if ($conn->query($sql) === TRUE) {
            echo "";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Displaying reviews
    $sql = "SELECT username, MarketName, Location, Review, Rating, CreatedAt FROM userreviews";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="message-container">';
            echo '<img src="images/profile.png" alt="Profile Image" class="profile-image">';
            echo '<div class="message-content">';
            echo '<div class="message-header">';
            echo '<div class="message-info">';
            echo '<p> ' . $row["username"] . '</p>';
            echo '<p> ' . $row["MarketName"] . '</p>';
             echo '<p> ' . $row["Location"] . '</p>';
            echo '<p> ' . $row["CreatedAt"] . '</p>';
            echo '</div>';
            echo '</div>';
            echo '<div class="message-rating">';
            echo '<p>Rating: ' . $row["Rating"] . ' Stars</p>';
            echo '</div>';
            echo '<div class="message-review">';
            echo '<p>' . $row["Review"] . '</p>';
        
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }    
    } else {
        echo "No reviews yet.";
    }

    $conn->close();
    ?>
</div>
</div>
<?php include('includes/map.php'); ?>
<?php include('includes/footer.php'); ?>
