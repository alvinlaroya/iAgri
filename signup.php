<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }

  if(isset($_SESSION['captcha'])){
    $now = time();
    if($now >= $_SESSION['captcha']){
      unset($_SESSION['captcha']);
    }
  }

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition layout-top-nav">
<?php include 'includes/navbar.php';?>
  <section class="heading" style="background-color: #1279b8">
    <h1>account</h1>
    <p> <a href="index.php">home</a> >> login </p>
  </section>
  <section class="register-form">
    <?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
    <form action="register.php" method="POST">
          <h3>register now</h3>
          <div class="inputBox">
              <span class="fas fa-user"></span>
              <input type="text" name="firstname" placeholder="Enter your first name" value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>" required>
          </div>
          <div class="inputBox">
              <span class="fas fa-user"></span>
              <input type="text" name="lastname" placeholder="Enter your last name" value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>" required>
          </div>
          <div class="inputBox">
              <span class="fas fa-envelope"></span>
              <input type="email" name="email" placeholder="Enter your email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
          </div>
          <div class="inputBox">
              <span class="fas fa-lock"></span>
              <input type="password" name="password" placeholder="Enter your password" required>
          </div>
          <div class="inputBox">
              <span class="fas fa-lock"></span>
              <input type="password" name="repassword" placeholder="Confirm your password" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="signup"><i class="fa fa-pencil"></i> Sign Up</button>
          <a href="login.php" class="btn">already have an account</a>
      </form>

  </section>
	<?php include 'includes/footer.php'; ?>
<?php include 'includes/scripts.php' ?>
</body>
</html>