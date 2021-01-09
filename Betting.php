<!doctype html>
<html lang="en">

<head>
    <?php include 'links1.php';?>

    <?php include 'connection.php' ; ?>

    <title>LudoKhelo-Betting</title>
</head>

<body>
  <!-- Navbar Starts Here. -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="#">Welcome</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
       aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item">
       <a class="nav-link" href="#">Play</a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="#">Help</a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="#">Terms & Condition</a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="Login.php">Login</a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="#">Register</a>
      </li>
    </ul>
    <a href="Login.php" style="text-decoration:none;" id="logo">user<i class="fas fa-user-shield"></i></a>
  </div>
</nav>
<!-- Navbar End. -->
  <div class="container text-center">
      <div class="wrapper">
          <h3>WELCOME TO THE LUDO KHELO WEBSITE.</h3>
          <p>Site is under Construction? <a href="">Try again later</a></p>
          <a href="">
              <img src="Images/Error.png" id="danger" alt="">
          </a>
      </div>
  </div>

  <?php  if (isset($_SESSION['fullname'])) : ?> 
            <p> 
                Welcome  
                <strong> 
                    <?php echo $_SESSION['fullname']; ?> 
                </strong> 
            </p> 
            <p>  
                <a href="index.php?logout='1'" style="color: red;"> 
                    Click here to Logout 
                </a> 
            </p> 
        <?php endif ?> 
</body>

</html>