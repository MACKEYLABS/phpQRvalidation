<?php
include 'config.php';

// Start a new session or resume existing
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $pdo->prepare("SELECT * FROM login WHERE email = ?");
        $stmt->execute([$email]);
        
        $user = $stmt->fetch();
        $hashedPassword = hash('sha256', $password);
        
        if ($user && hash_equals($user['password'], $hashedPassword)) {
            // Login successful
            $_SESSION['user_id'] = $user['id'];  // Assuming there's an 'id' column in your table
            $_SESSION['logged_in'] = true;
            
            header("Location: purchase.php");
            exit;
        } else {
            $errorMessage = "Invalid credentials!";
        }

    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
}
?>

<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Consolidated Parking</title>
      <link rel="stylesheet" href="style.css">
   </head>
   <body>
      <div class="wrapper">
         <div class="title">
            Consolidated Parking
         </div>
         <?php
         if (isset($errorMessage) && !empty($errorMessage)) {
            echo '<div class = "error-message">' . $errorMessage . '</div>';
         }
         ?>
         <form action="index.php" method="post">
            <div class="field">
               <input type="text" name="email" required>
               <label>Email Address</label>
            </div>
            <div class="field">
               <input type="password" name="password" required>
               <label>Password</label>
            </div>
            <div class="content">
               <div class="checkbox">
                  <input type="checkbox" id="remember-me">
                  <label for="remember-me">Remember me</label>
               </div>
               <div class="pass-link">
                  <a href="#">Forgot password?</a>
               </div>
            </div>
            <div class="field">
               <input type="submit" value="Login">
            </div>
            <div class="signup-link">
               Not a member? <a href="#">Signup now</a>
            </div>
         </form>
      </div>
   </body>
</html>
