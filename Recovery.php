<!doctype html>
<html lang="en">

<head>
    <?php include 'links1.php';?>

    <title>Ludo Khelo</title>
</head>

<body>
<?php include 'connection.php';
   if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);

   //  Password Secure.
    // $pass = password_hash($newpassword, PASSWORD_BCRYPT);
    // $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    $token = bin2hex(random_bytes(15));

   //  Checking whether email is already exist or not.
    $emailquery = "select *from signup where email = '$email'";
    $query = mysqli_query($con, $emailquery);
    $emailcount = mysqli_num_rows($query);
     if($emailcount){
         $namedata = mysqli_fetch_array($query);
         $fullname = $namedata['fullname'];
         $token = $namedata['token'];

        $subject =  "Password Recovery";
        $body = "Hi, $fullname. click here to reset your account
        http://localhost/1emailverifregistr/reset_password.php?token=$token";
        $sender_email = "From: yadavashishdhirendra@gmail.com";

        if(mail($email, $subject, $body, $sender_email)){
            $_SESSION['msg'] = "Check your Mail to reset your account $email";
            header('location:Login.php');
        }else{
            echo "Email sending Failed..";
        }
   }
   else{
       echo "No Email found..";
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
        <a class="nav-link" href="Register.php">Register</a>
      </li>
    </ul>
  </div>
</nav>
<!-- Navbar Ends. -->


<!-- Login Form. -->
<div class="container text-center">
  <div class="wrapper mt-4">
  <h4>Recovery</h4>
  <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
  <div class="form-group">
    <input type="text" class="form-control text-center" id="email" name="email" placeholder="Email address" required>
  </div>
  <button type="submit" name="submit" class="btn btn-success">Recover</button>
</form>
  </div>
</div>
</body>

</html>