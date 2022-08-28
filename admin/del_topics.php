<?php

require_once 'core.inc.php';

$id = $_GET['id'];

$query = "DELETE FROM topics WHERE id=$id";
$statement = $con->prepare($query);
$statement->execute();

header('Location: topics.php');