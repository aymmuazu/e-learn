<title>Register - E-Learn</title>
<?php 
include('header.php');

if (loggedin()) {
    header('Location: home.php');
}else{
?>
    <div class="container">
        <div class="col-md-6 offset-md-3 mb-5 pt-5">
            <h1 class="fw-bold text-center mb-4 pt-4">User Register</h1>
            <?php
                if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $password_hash = md5($password);

                    $query  = "SELECT email FROM users WHERE email=:email";
                    $statement = $con->prepare($query);
                    $statement->bindValue(':email', $email);
                    $statement->execute();
                    $count = $statement->rowCount();

                    if ($count > 0) {

                        echo '<div class="alert alert-danger">This Email Address exists.</div>';

                    }else{
                        $query = "INSERT INTO users VALUES(NULL,:name,:email,:password,:created_at,:updated_at)";
                        $statement = $con->prepare($query);
                        $statement->bindValue(':name', $name);
                        $statement->bindValue(':email', $email);
                        $statement->bindValue(':password', $password_hash);
                        $statement->bindValue(':created_at', date('y-m-d h:i:s'));
                        $statement->bindValue(':updated_at', date('y-m-d h:i:s'));
                        $statement->bindValue(':password', $password_hash);
                        $statement->execute();
                        
                        echo '<div class="alert alert-success">Registration Successfully. <a href="login.php">Login</a></div>';
                    }
                }
            ?>
            <form method="POST" action="register.php">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control rounded-3" name="name" placeholder="Your Name">
                    <label for="floatingInput">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control rounded-3" name="email" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control rounded-3" name="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button id="loginbtn" class="w-100 mb-2 btn btn-lg rounded-3 btn-dark" type="submit">Register</button>
            </form>
            <p></p>
            <small class="text-muted">Already have an account? <a href="login.php">Login</a></small>
        </div>
    </div>
<?php 
    include('footer.php'); 
}
?>
