<?php

require 'core.inc.php';


if (loggedin()) {
    $id = getuserfield('id');
    $email = getuserfield('email');
    $name = getuserfield('name');
    $created_at = getuserfield('created_at');
?>
<?php

}
else{
    header('Location: login.php');
}