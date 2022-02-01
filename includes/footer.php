
<section class="footer" style="background-color: #eee">
    <div class="box-container" style="background-color: #eee">
        <div class="box" style="background-color: #eee">
            <h3>quick links</h3>
            <a href="index.php"> <i class="fas fa-angle-right"></i> home</a>
            <a href="products.php"> <i class="fas fa-angle-right"></i> products</a>
            <a href="contact.php"> <i class="fas fa-angle-right"></i> contact</a>
            <?php 
                if(isset($_SESSION['user'])){
                } else {
                    echo '
                        <a href="login.php"> <i class="fas fa-angle-right"></i> login</a>
                        <a href="signup.php"> <i class="fas fa-angle-right"></i> register</a>
                    ';
                }
            ?>
            <a href="cart_view.php"> <i class="fas fa-angle-right"></i> cart</a>
        </div>

        <div class="box" style="background-color: #eee">
            <h3>extra links</h3>
            <a href="profile.php"> <i class="fas fa-angle-right"></i> my account </a>
            <a href="profile.php"> <i class="fas fa-angle-right"></i> my order </a>
            <a href="wishlist_view.php"> <i class="fas fa-angle-right"></i> my wishlist </a>
        </div>

        <div class="box" style="background-color: #eee">
            <h3>follow us</h3>
            <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
            <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
            <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
            <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
        </div>
    </div>
</section>
