<?php

require_once 'core.inc.php';

$title = $_POST['title'];
$file = $_FILES['file']['name'];
$tmp_name = $_FILES['file']['tmp_name'];
$location = '../docs/';

if(move_uploaded_file($tmp_name, $location.$file))
{
    $query = "INSERT INTO download VALUES(NULL,:title,:file,:created_at)";
    $statement = $con->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':file', $file);
    $statement->bindValue(':created_at', date('Y-m-d h:i:s'));
    $statement->execute();

    echo '<script>alert("New File Added."); window.location.href="download.php";</script>';

}
else
{
    echo 'There was an error.';
}


