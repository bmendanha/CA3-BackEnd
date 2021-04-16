<?php
require 'includes/Database.php';
  $instance = Database::getInstance();
    $conn = $instance->getConnection();
?>
<html>
  <head>
  <title>Authentication Administrator</title>
  <script type="text/javascript">
     //Function to redirect to index.php
     function loginsuccessfully() {
       setTimeout("window.location='index.php'", 2000);
     }
     //Function to return to login.php
     function loginfailed() {
       setTimeout("window.location='login.php'", 4000);
     }
  </script>
  </head>

<body>
<?php

  if(isset($_POST['acao'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query_users = "SELECT * FROM users WHERE users.username='$username' AND users.password='$password'";
    $result = $conn->query($query_users);
    $row = $result->fetchAll(PDO::FETCH_NUM);
// check the SELECT query.
//IF exists redirect to index.php otherwise return to login.php
    if (count($row) == 1){
      session_start();
      $_SESSION['username'] = $username;
      $_SESSION['password'] = $password;
      echo "<center>SUCCESSFUL AUTHENTICATION!!! Wait for redirect</center>";       
      echo "<script>loginsuccessfully()</script>";
    } else {
      echo "<center>invalid USERNAME or PASSWORD!!! Wait for redirect</center>";     
      echo "<script>loginfailed()</script>";  
    }
  }
   
?>
</body>
</html>