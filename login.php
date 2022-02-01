<?php include 'includes/session.php';?>
<?php
if (isset($_SESSION['user'])) {
    header('location: cart_view.php');
}
?>
<?php include 'includes/header.php';?>
<body class="hold-transition layout-top-nav">
  <div class="wrapper">
    <?php include 'includes/navbar.php';?>
    <section class="heading" style="background-color: #1279b8">
      <h1>account</h1>
      <p> <a href="index.php">home</a> >> login </p>
    </section>

    <section class="login-form">
      <?php
        if (isset($_SESSION['error'])) {
            echo "
                  <div class='callout callout-danger text-center'>
                    <p>" . $_SESSION['error'] . "</p>
                  </div>
                ";
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            echo "
                  <div class='callout callout-success text-center'>
                    <p>" . $_SESSION['success'] . "</p>
                  </div>
                ";
            unset($_SESSION['success']);
        }
        ?>
        <form action="verify.php" method="POST">
            <h3>user login</h3>
            <div class="inputBox">
                <span class="fas fa-user"></span>
                <input type="email" name="email" placeholder="enter your email" id="" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="inputBox">
                <span class="fas fa-lock"></span>
                <input type="password" name="password" placeholder="enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-flat" name="login">Sign In</button>
            <div class="flex">
                <input type="checkbox" name="" id="remember-me">
                <label for="remember-me">remember me</label>
                <a href="password_forgot.php">forgot password?</a>
            </div>
            <a href="signup.php" class="btn">create an account</a>
        </form>

    </section>
    <?php include 'includes/footer.php'; ?>
  </div>
  <?php include 'includes/scripts.php'?>
</body>
</html>