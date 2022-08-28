<title>Login - E-Learn</title>
<?php 

include('header.php');

if (loggedin()) {
    header('Location: home.php');
}else{
?>
<div class="container">
    <div class="col-md-6 offset-md-3 mb-5 pt-5">
        <h1 class="fw-bold text-center mb-4 pt-4">Admin Login</h1>
        <?php
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $password_hash = md5($password);

                $query  = "SELECT id FROM admins WHERE email=:email AND password=:password";
                $statement = $con->prepare($query);
                $statement->bindValue(':email', $email);
                $statement->bindValue(':password', $password_hash);
                $statement->execute();
                $user = $statement->fetch(PDO::FETCH_OBJ);
                $count = $statement->rowCount();

                if ($count > 0) {
                    $user_id = $user->id;
                    $_SESSION['admin_id'] = $user_id;
                    echo '<script>alert("You are now logged in."); window.location.href="home.php";</script>';
                }else{
                    echo '<div class="alert alert-danger">Invalid login credentials.</div>';
                }
            }
        ?>
        <form method="POST" action="login.php">
            <div class="form-floating mb-3">
                <input type="email" class="form-control rounded-3" name="email" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control rounded-3" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <button id="loginbtn" class="w-100 mb-2 btn btn-lg rounded-3 btn-dark" type="submit">Login</button>
        </form>
    </div>
</div>
<?php 
    include('footer.php'); 
}
?>