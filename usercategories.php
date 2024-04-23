<body>

<?php
// Database connection
$servername = "localhost";
$username = "";
$password = "";
$dbname = "acaciamarketdirectory";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch beauty markets
$beautyMarketsQuery = "SELECT MarketID, Marketname, category, location, contacts, description, ratings, status, image, link FROM markets WHERE category = 'beauty'";
$beautyMarketsResult = $conn->query($beautyMarketsQuery);

// Fetch bakery markets
$bakeryMarketsQuery = "SELECT MarketID, Marketname, category, location, contacts, description, ratings, status, image, link FROM markets WHERE category = 'bakery'";
$bakeryMarketsResult = $conn->query($bakeryMarketsQuery);

// Fetch Home & garden markets
$homeandgardenMarketsQuery = "SELECT MarketID, Marketname, category, location, contacts, description, ratings, status, image, link FROM markets WHERE category = 'home & garden'";
$homeandgardenMarketsResult = $conn->query($homeandgardenMarketsQuery);

// Fetch electronics markets
$electronicsMarketsQuery = "SELECT MarketID, Marketname, category, location, contacts, description, ratings, status, image, link FROM markets WHERE category = 'electronics'";
$electronicsMarketsResult = $conn->query($electronicsMarketsQuery);

// Fetch grocery markets
$groceryMarketsQuery = "SELECT MarketID, Marketname, category, location, contacts, description, ratings, status, image, link FROM markets WHERE category = 'grocery'";
$groceryMarketsResult = $conn->query($groceryMarketsQuery);

// Fetch food and dining markets
$foodanddiningMarketsQuery = "SELECT MarketID, Marketname, category, location, contacts, description, ratings, status, image, link FROM markets WHERE category = 'food & dining'";
$foodanddiningMarketsResult = $conn->query($foodanddiningMarketsQuery);

// Fetch retail shopping markets
$retailandshoppingMarketsQuery = "SELECT MarketID, Marketname, category, location, contacts, description, ratings, status, image, link FROM markets WHERE category = 'retail & shopping'";
$retailandshoppingMarketsResult = $conn->query($retailandshoppingMarketsQuery);

// Fetch entertainment & arts markets
$entertainmentandartsMarketsQuery = "SELECT MarketID, Marketname, category, location, contacts, description, ratings, status, image, link FROM markets WHERE category = 'Entertainment & Arts'";
$entertainmentandartsMarketsResult = $conn->query($entertainmentandartsMarketsQuery);

// Fetch business to business markets
$businesstobusinessMarketsQuery = "SELECT MarketID, Marketname, category, location, contacts, description, ratings, status, image, link FROM markets WHERE category = 'business to business'";
$businesstobusinessMarketsResult = $conn->query($businesstobusinessMarketsQuery);

// Fetch education markets
$educationMarketsQuery = "SELECT MarketID, Marketname, category, location, contacts, description, ratings, status, image, link FROM markets WHERE category = 'education'";
$educationMarketsResult = $conn->query($educationMarketsQuery);

// Fetch recreation markets
$recreationMarketsQuery = "SELECT MarketID, Marketname, category, location, contacts, description, ratings, status, image, link FROM markets WHERE category = 'recreation'";
$recreationMarketsResult = $conn->query($recreationMarketsQuery);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/icon.jpg" type="image/jpg">
    <title>ACACIA MARKETS</title>
    <style>
        body{
            align-items: center;
            
        }
        
.row {
  display: flex;
  flex-wrap: wrap;
  margin: 0 -20px; 
}
h2{
    align-items: center;
  margin: 0;
  background-color:#ff69b4;
  font-size: 18px;
        border-radius: 15px;
        color: black;
        display: inline-block;
        font-family: 'Arial', sans-serif;
        padding: 20px 40px;
        text-decoration: none;
        margin-top: 50px;

}
.col-md-4 {
  flex: 0 0 33.333333%;
  max-width: 33.333333%;
  padding: 0 15px; 
}
.categories-card {
  border: 1px solid #e0e0e0;
  padding: 15px;
  margin-bottom: 20px;
  text-align: center;
  margin-left: 50px;
}

.categories-card img {
        border-radius: 50%;
        margin-bottom: 10px;
        width: 100px;
        height: 100px;
    }

    .categories-card h3 {
        color: #333;
        font-family: 'Arial', sans-serif;
        font-size: 1.5em;
        margin-bottom: 5px;
    }
    .categories-card p {
        color: #777;
        font-family: 'Arial', sans-serif;
        font-size: 1em;
        margin-bottom: 5px;
    }

    .categories-card a {
        background-color: #ff69b4;
        border-radius: 5px;
        color: #fff;
        display: inline-block;
        font-family: 'Arial', sans-serif;
        font-size: 1em;
        padding: 10px 20px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .categories-card a:hover {
        background-color: #e05297;
    }

</style>


</head>
<body>
    <h2>Beauty Markets</h2>
    <ul>
        <div class="categories-container">
        <?php
      
      if ($beautyMarketsResult->num_rows > 0) {
        $count = 0;
        while ($row = $beautyMarketsResult->fetch_assoc()) {
            if ($count % 3 == 0) {
                echo '<div class="row">';
            }
            echo '<div class="col-md-4">';
            echo '<div class="categories-card">';
            echo '<img src="' . $row["image"] . '" alt="' . $row["Marketname"] . '">';
            echo '<h3>' . $row["Marketname"] . '</h3>';
            echo '<p>' . $row["location"] . '</p>';
            echo '<p>' . $row["contacts"] . '</p>';
            echo '<p>' . $row["ratings"] . '</p>';
            echo '<p>' . $row["status"] . '</p>';
            echo '<a href="' . $row["link"] . '">Visit Market</a>';
            echo '</div>';
            echo '</div>';
            if ($count % 3 == 2) {
                echo '</div>';
            }
            $count++;
        }
        if ($count % 3 != 0) {
            echo '</div>';
        }
      }
        ?>
    </ul>
    </div>

    <h2>Bakery Markets</h2>
    <ul>
    <div class="categories-container">
        <?php
        if ($bakeryMarketsResult->num_rows > 0) {
            $count = 0;
            while ($row = $bakeryMarketsResult->fetch_assoc()) {
                if ($count % 3 == 0) {
                    echo '<div class="row">';
                }
                echo '<div class="col-md-4">';
                echo '<div class="categories-card">';
                echo '<img src="' . $row["image"] . '" alt="' . $row["Marketname"] . '">';
                echo '<h3>' . $row["Marketname"] . '</h3>';
                echo '<p>' . $row["location"] . '</p>';
                echo '<p>' . $row["contacts"] . '</p>';
                echo '<p>' . $row["ratings"] . '</p>';
                echo '<p>' . $row["status"] . '</p>';
                echo '<a href="markets.php' . $row["link"] . '">Visit Market</a>';
                echo '</div>';
                echo '</div>';
                if ($count % 3 == 2) {
                    echo '</div>';
                }
                $count++;
            }
            if ($count % 3 != 0) {
                echo '</div>';
            }
        }
        ?>
    </ul>
    </div>

    <h2>Home & Garden Markets</h2>
    <ul>
        <div class="categories-container">
        <?php
      
      if ($homeandgardenMarketsResult->num_rows > 0) {
        $count = 0;
        while ($row = $homeandgardenMarketsResult->fetch_assoc()) {
            if ($count % 3 == 0) {
                echo '<div class="row">';
            }
            echo '<div class="col-md-4">';
            echo '<div class="categories-card">';
            echo '<img src="' . $row["image"] . '" alt="' . $row["Marketname"] . '">';
            echo '<h3>' . $row["Marketname"] . '</h3>';
            echo '<p>' . $row["location"] . '</p>';
            echo '<p>' . $row["contacts"] . '</p>';
            echo '<p>' . $row["ratings"] . '</p>';
            echo '<p>' . $row["status"] . '</p>';
            echo '<a href="' . $row["link"] . '">Visit Market</a>';
            echo '</div>';
            echo '</div>';
            if ($count % 3 == 2) {
                echo '</div>';
            }
            $count++;
        }
        if ($count % 3 != 0) {
            echo '</div>';
        }
      }
        ?>
    </ul>
    </div>
    <h2>Electronics Markets</h2>
    <ul>
        <div class="categories-container">
        <?php
      
      if ($electronicsMarketsResult->num_rows > 0) {
        $count = 0;
        while ($row = $electronicsMarketsResult->fetch_assoc()) {
            if ($count % 3 == 0) {
                echo '<div class="row">';
            }
            echo '<div class="col-md-4">';
            echo '<div class="categories-card">';
            echo '<img src="' . $row["image"] . '" alt="' . $row["Marketname"] . '">';
            echo '<h3>' . $row["Marketname"] . '</h3>';
            echo '<p>' . $row["location"] . '</p>';
            echo '<p>' . $row["contacts"] . '</p>';
            echo '<p>' . $row["ratings"] . '</p>';
            echo '<p>' . $row["status"] . '</p>';
            echo '<a href="' . $row["link"] . '">Visit Market</a>';
            echo '</div>';
            echo '</div>';
            if ($count % 3 == 2) {
                echo '</div>';
            }
            $count++;
        }
        if ($count % 3 != 0) {
            echo '</div>';
        }
      }
        ?>
    </ul>
    </div>

    <h2>Grocery Markets</h2>
    <ul>
        <div class="categories-container">
        <?php
      
      if ($groceryMarketsResult->num_rows > 0) {
        $count = 0;
        while ($row = $groceryMarketsResult->fetch_assoc()) {
            if ($count % 3 == 0) {
                echo '<div class="row">';
            }
            echo '<div class="col-md-4">';
            echo '<div class="categories-card">';
            echo '<img src="' . $row["image"] . '" alt="' . $row["Marketname"] . '">';
            echo '<h3>' . $row["Marketname"] . '</h3>';
            echo '<p>' . $row["location"] . '</p>';
            echo '<p>' . $row["contacts"] . '</p>';
            echo '<p>' . $row["ratings"] . '</p>';
            echo '<p>' . $row["status"] . '</p>';
            echo '<a href="' . $row["link"] . '">Visit Market</a>';
            echo '</div>';
            echo '</div>';
            if ($count % 3 == 2) {
                echo '</div>';
            }
            $count++;
        }
        if ($count % 3 != 0) {
            echo '</div>';
        }
      }
        ?>
    </ul>
    </div>

    <h2>Food & Dining Markets</h2>
    <ul>
        <div class="categories-container">
        <?php
      
      if ($foodanddiningMarketsResult->num_rows > 0) {
        $count = 0;
        while ($row = $foodanddiningMarketsResult->fetch_assoc()) {
            if ($count % 3 == 0) {
                echo '<div class="row">';
            }
            echo '<div class="col-md-4">';
            echo '<div class="categories-card">';
            echo '<img src="' . $row["image"] . '" alt="' . $row["Marketname"] . '">';
            echo '<h3>' . $row["Marketname"] . '</h3>';
            echo '<p>' . $row["location"] . '</p>';
            echo '<p>' . $row["contacts"] . '</p>';
            echo '<p>' . $row["ratings"] . '</p>';
            echo '<p>' . $row["status"] . '</p>';
            echo '<a href="' . $row["link"] . '">Visit Market</a>';
            echo '</div>';
            echo '</div>';
            if ($count % 3 == 2) {
                echo '</div>';
            }
            $count++;
        }
        if ($count % 3 != 0) {
            echo '</div>';
        }
      }
        ?>
    </ul>
    </div>
   
<h2>Retail & Shopping Markets</h2>
    <ul>
        <div class="categories-container">
        <?php
      
      if ($retailandshoppingMarketsResult->num_rows > 0) {
        $count = 0;
        while ($row = $retailandshoppingMarketsResult->fetch_assoc()) {
            if ($count % 3 == 0) {
                echo '<div class="row">';
            }
            echo '<div class="col-md-4">';
            echo '<div class="categories-card">';
            echo '<img src="' . $row["image"] . '" alt="' . $row["Marketname"] . '">';
            echo '<h3>' . $row["Marketname"] . '</h3>';
            echo '<p>' . $row["location"] . '</p>';
            echo '<p>' . $row["contacts"] . '</p>';
            echo '<p>' . $row["ratings"] . '</p>';
            echo '<p>' . $row["status"] . '</p>';
            echo '<a href="' . $row["link"] . '">Visit Market</a>';
            echo '</div>';
            echo '</div>';
            if ($count % 3 == 2) {
                echo '</div>';
            }
            $count++;
        }
        if ($count % 3 != 0) {
            echo '</div>';
        }
      }
        ?>
    </ul>
    </div>

    <h2>Entertainment & Arts Markets</h2>
    <ul>
        <div class="categories-container">
        <?php
      
      if ($entertainmentandartsMarketsResult->num_rows > 0) {
        $count = 0;
        while ($row = $entertainmentandartsMarketsResult->fetch_assoc()) {
            if ($count % 3 == 0) {
                echo '<div class="row">';
            }
            echo '<div class="col-md-4">';
            echo '<div class="categories-card">';
            echo '<img src="' . $row["image"] . '" alt="' . $row["Marketname"] . '">';
            echo '<h3>' . $row["Marketname"] . '</h3>';
            echo '<p>' . $row["location"] . '</p>';
            echo '<p>' . $row["contacts"] . '</p>';
            echo '<p>' . $row["ratings"] . '</p>';
            echo '<p>' . $row["status"] . '</p>';
            echo '<a href="' . $row["link"] . '">Visit Market</a>';
            echo '</div>';
            echo '</div>';
            if ($count % 3 == 2) {
                echo '</div>';
            }
            $count++;
        }
        if ($count % 3 != 0) {
            echo '</div>';
        }
      }
        ?>
    </ul>
    </div>
   
    <h2>Education</h2>
    <ul>
        <div class="categories-container">
        <?php
      
      if ($educationMarketsResult->num_rows > 0) {
        $count = 0;
        while ($row = $educationMarketsResult->fetch_assoc()) {
            if ($count % 3 == 0) {
                echo '<div class="row">';
            }
            echo '<div class="col-md-4">';
            echo '<div class="categories-card">';
            echo '<img src="' . $row["image"] . '" alt="' . $row["Marketname"] . '">';
            echo '<h3>' . $row["Marketname"] . '</h3>';
            echo '<p>' . $row["location"] . '</p>';
            echo '<p>' . $row["contacts"] . '</p>';
            echo '<p>' . $row["ratings"] . '</p>';
            echo '<p>' . $row["status"] . '</p>';
            echo '<a href="' . $row["link"] . '">Visit Market</a>';
            echo '</div>';
            echo '</div>';
            if ($count % 3 == 2) {
                echo '</div>';
            }
            $count++;
        }
        if ($count % 3 != 0) {
            echo '</div>';
        }
      }
        ?>
        </ul>
    </div>

    <h2>Recreation</h2>
    <ul>
        <div class="categories-container">
        <?php
      
      if ($recreationMarketsResult->num_rows > 0) {
        $count = 0;
        while ($row = $recreationMarketsResult->fetch_assoc()) {
            if ($count % 3 == 0) {
                echo '<div class="row">';
            }
            echo '<div class="col-md-4">';
            echo '<div class="categories-card">';
            echo '<img src="' . $row["image"] . '" alt="' . $row["Marketname"] . '">';
            echo '<h3>' . $row["Marketname"] . '</h3>';
            echo '<p>' . $row["location"] . '</p>';
            echo '<p>' . $row["contacts"] . '</p>';
            echo '<p>' . $row["ratings"] . '</p>';
            echo '<p>' . $row["status"] . '</p>';
            echo '<a href="' . $row["link"] . '">Visit Market</a>';
            echo '</div>';
            echo '</div>';
            if ($count % 3 == 2) {
                echo '</div>';
            }
            $count++;
        }
        if ($count % 3 != 0) {
            echo '</div>';
        }
      }
        ?>
        </ul>
    </div>

    <h2>Business to Business</h2>
    <ul>
        <div class="categories-container">
        <?php
      
      if ($businesstobusinessMarketsResult->num_rows > 0) {
        $count = 0;
        while ($row = $businesstobusinessMarketsResult->fetch_assoc()) {
            if ($count % 3 == 0) {
                echo '<div class="row">';
            }
            echo '<div class="col-md-4">';
            echo '<div class="categories-card">';
            echo '<img src="' . $row["image"] . '" alt="' . $row["Marketname"] . '">';
            echo '<h3>' . $row["Marketname"] . '</h3>';
            echo '<p>' . $row["location"] . '</p>';
            echo '<p>' . $row["contacts"] . '</p>';
            echo '<p>' . $row["ratings"] . '</p>';
            echo '<p>' . $row["status"] . '</p>';
            echo '<a href="' . $row["link"] . '">Visit Market</a>';
            echo '</div>';
            echo '</div>';
            if ($count % 3 == 2) {
                echo '</div>';
            }
            $count++;
        }
        if ($count % 3 != 0) {
            echo '</div>';
        }
      }
        ?>
        </ul>
    </div>
</body>
</html>
<?php
$conn->close();
?>



