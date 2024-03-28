<style>
 footer {
    background-color: #333;
    padding: 10px;
    
    text-align: center;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
 }

.left-section, .center-section, .right-section {
    display: flex;
    align-items: center;
  }

  .left-section a, .center-section img, .right-section a {
    margin: 0 10px;
    color: azure;
    text-decoration: none;
  }

  .left-section a:hover, .right-section a:hover {
    text-decoration: underline;
  }

  .center-section {
    display: flex;
    align-items: center; /* Center items vertically */
  }

  .center-section img {
    width: 80px; 
    height: 80px;
  }


  .copyright {
    text-align: center;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
  }
  </style>
  
  <footer>
    <div class="left-section">
      <a href="user_management.php">User Management</a>
      <a href="settings.php">Settings</a>
      <a href="#">Privacy Policy</a>
    </div>

    <div class="center-section">
      <img src="images/logo.jpg" alt="Small Image">
    </div>

    <div class="right-section">
    <a href="#">Terms of Service</a>
      <a href="https://realkabuu.wordpress.com">Blog</a>
      <a href="logout.php">LogOut</a>
    </div>
   
  </footer>

  <div class="copyright">
    <p>&copy; 2024 Acacia Market Directory. All Rights Reserved.</p>
  </div>