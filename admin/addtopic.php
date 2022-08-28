<?php

require_once 'core.inc.php';

$title = $_POST['title'];
$body = $_POST['body'];
$footer = $_POST['footer'];
$image = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];
$location = '../img/';

if(move_uploaded_file($tmp_name, $location.$image))
{
    $query = "INSERT INTO topics VALUES(NULL,:title,:body,:image,:footer,:created_at)";
    $statement = $con->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':body', $body);
    $statement->bindValue(':image', $image);
    $statement->bindValue(':footer', $footer);
    $statement->bindValue(':created_at', date('Y-m-d h:i:s'));
    $statement->execute();

    echo '<script>alert("New Topic Added."); window.location.href="topics.php";</script>';

}
else
{
    echo 'There was an error.';
}


