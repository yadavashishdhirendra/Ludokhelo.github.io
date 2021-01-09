<?php
// Connection to the database.
$username = "root";
$password = "";
$server = "localhost";
$database = "ludokhelo";

$con = mysqli_connect($server, $username, $password, $database);
if($con){
    ?>
    <script>
        alert("Database Successfully Connected!");
    </script>
    <?php
}
else{
    ?>
    <script>
        alert("Error Establishing Connection..!");
    </script>
    <?php
}
?>