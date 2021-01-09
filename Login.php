<?php 
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <?php include 'links1.php';?>

    <title>Ludo Khelo</title>
</head>

<body>
   <?php include 'connection.php';
       if(isset($_POST['submit'])){
         $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
         $password = mysqli_real_escape_string($con, $_POST['password']);

         $mobile_search = "select *from signup where mobile = '$mobile'";
         $query = mysqli_query($con, $mobile_search);

         $mobile_count = mysqli_num_rows($query);

         if($mobile_count){
           $mobile_pass = mysqli_fetch_assoc($query);
           $dbpass = $mobile_pass['password'];
           $_SESSION['fullname'] = $mobile_pass['fullname'];
           $pass_decode = password_verify($password, $dbpass);
           if($pass_decode){
             ?>
             <script>
               alert("Login Succesffully..!");
               location.replace("Betting.php");
             </script>
             <?php
           }
           else{
             ?>
             <script>
             alert("Incorrect Password..!");
             </script>
             <?php
           }
         }
         else{
           ?>
           <script>
             alert("Invalid Email..!");
           </script>
           <?php
         }
       }
   ?>
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
        <a class="nav-link" href="#">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Register.php">Register</a>
      </li>
    </ul>
  </div>
</nav>
<!-- Navbar Ends. -->


<!-- Login Form. -->
<div class="container text-center">
  <div class="wrapper mt-4">
  <h4>Login</h4>
  <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
  <div class="form-group">
    <input type="number" class="form-control text-center" id="mobile" name="mobile" placeholder="Mobile Number" required>
  </div>
  <div class="form-group">
    <input type="password" class="form-control text-center" id="password" name="password" placeholder="Password" required>
  </div>
  <button type="submit" name="submit" class="btn btn-success">Login</button>
</form>
<p>New here? <a href="Register.php">Sign up now >></a></p>
<a href="Recovery.php">Forgot password?</a>
  </div>
</div>
</body>

</html>