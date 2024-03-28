<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/icon.jpg" type="image/jpg">
    <title>Acacia Market Directory</title>
</head>
<body>

    <!-- Header Section -->
    <?php include('includes/header.php'); ?>

    <!-- Main Content -->
    <!-- Categories -->
    <h1>Categories ♥</h1>

    <div class="main-content">
        <section class="categories">
<div class="icon-container">
    <div class="icon" onclick="navigateTo('home-garden')">
      <img src="images/home.jpg" alt="Home and Garden">
      <p>Home & Garden</p>
    </div>

    <div class="icon" onclick="navigateTo('electronics')">
      <img src="images/electricians.jpg" alt="electronics">
      <p>Electronics</p>
    </div>  

  <div class="icon" onclick="navigateTo('bakery')">
      <img src="images/bakery.jpg" alt="bakery">
      <p>Bakery</p>
    </div>   

 <div class="icon" onclick="navigateTo('groceries')">
      <img src="images/groceryicon.jpg" alt="groceries">
      <p>Groceries</p>
    </div>  

 <div class="icon" onclick="navigateTo('food-and-dining')">
      <img src="images/dining.jpg" alt="dining">
      <p>Food & Dining</p>
    </div>

  <div class="icon" onclick="navigateTo('retail-shopping')">
      <img src="images/shopping.jpg" alt="Retail Shopping">
      <p>Retail Shopping</p>
    </div>  

  <div class="icon" onclick="navigateTo('Entertainment-and-arts')">
      <img src="images/entertainment.jpg" alt="entertainment and Arts">
      <p>Entertainment & Arts</p>
    </div>  

  <div class="icon" onclick="navigateTo('beauty')">
      <img src="images/beauty.jpg" alt="beauty">
      <p>Beauty</p>
    </div>   

 <div class="icon" onclick="navigateTo('business-to-business')">
      <img src="images/business.jpg" alt="Business to business">
      <p>Business to Business</p>
    </div>  

  <div class="icon" onclick="navigateTo('education')">
      <img src="images/education.jpg" alt="education">
      <p>Education</p>
    </div> 

   <div class="icon" onclick="navigateTo('recreation')">
      <img src="images/recreation.jpg" alt="recreation">
      <p>Recreation</p>
    </div>   
</div>
</section>
    </div>
    <?php include ('includes/featured.php'); ?>

    <?php include ('includes/events.php'); ?>

<?php include ('includes/map.php'); ?>
    <!-- Footer Section -->
    <?php include('includes/footer.php'); ?>

   
    <script src="js/script.js"></script>
</body>
</html>
