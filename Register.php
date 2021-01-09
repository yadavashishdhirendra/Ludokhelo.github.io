<!doctype html>
<html lang="en">

<head>
    <?php include 'links1.php';?>

    <title>Ludo Khelo</title>
</head>

<body>
   <?php include 'connection.php';
   if(isset($_POST['submit'])){
     $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
     $email = mysqli_real_escape_string($con, $_POST['email']);
     $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
     $password = mysqli_real_escape_string($con, $_POST['password']);
     $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    //  Password Secure.
     $pass = password_hash($password, PASSWORD_BCRYPT);
     $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

     $token = bin2hex(random_bytes(15));

    //  Checking whether email is already exist or not.
     $emailquery = "select *from signup where email = '$email'";
     $query = mysqli_query($con, $emailquery);

     $emailcount = mysqli_num_rows($query);
     if($emailcount > 0){
       ?>
       <script>
          alert("Email aLready exist!");
       </script>
       <?php
     }
     else{
      //  Here if the password and cpassword will match then the user data will send to the db.
       if($password == $cpassword){
         $res = mysqli_query($con, "INSERT into signup values('', '$fullname', '$email', '$mobile', '$pass', '$cpass', '$token')");
         if($res){
           ?>
           <script>
          //  Some alerts.
             alert("Data Successfully Submitted!");
           </script>
           <?php
         }
         else{
           ?>
           <script>
             alert("Data Not Submitted!");
           </script>
           <?php
         }
       }
       else{
         ?>
         <script>
           alert("Password Not Matching!");
         </script>
         <?php
       }
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
       <a class="nav-link" href="Login.php">Login</a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="#">Register</a>
      </li>
    </ul>
  </div>
</nav>
<!-- Navbar End. -->

<!-- Register Form. -->
<div class="container text-center">
   <div class="wrapper">
     <h4>Register</h4>
 <form method="POST">
   <div class="form-group">
    <input type="text" class="form-control text-center" id="fullname" name="fullname" placeholder="Full Name" required>
  </div>
  <div class="form-group">
    <input type="email" class="form-control text-center" id="email" name="email" placeholder="Email address" required>
  </div>
  <div class="form-group">
    <input type="number" class="form-control text-center" id="mobile" name="mobile" placeholder="Mobile Number" required>
  </div>
  <div class="form-group">
    <input type="password" class="form-control text-center" id="password" name="password" placeholder="Password" required>
  </div>
  <div class="form-group">
    <input type="password" class="form-control text-center" id="cpassword" name="cpassword" placeholder="Confirm password" required>
  </div>
  <button type="submit" name="submit" class="btn btn-success" onclick="myFunction()">Register</button>
</form>
  </div>
  <p>Already Have an account? <a href="Login.php">Login</a></p>
</div>
</body>

</html>