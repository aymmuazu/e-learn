<?php

require_once 'core.inc.php';

if (loggedin()) {
    $id = getuserfield('id');
    $name = getuserfield('name');
    $email = getuserfield('email');
    $created_at = getuserfield('created_at');

    include('header.php');
?>

<div class="container">
    <div class="col-md-6 offset-md-3 mb-5 pt-5">
        <h1 class="fw-bold text-center mb-4 pt-4">Dashboard</h1>
    </div>
</div>
<?php

include('footer.php'); 

}
else{
    header('Location: login.php');
}