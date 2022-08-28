<?php

require_once 'core.inc.php';

$title = $_POST['title'];
$topic_id = $_POST['topic_id'];
$correct = $_POST['correct'];
$value = $_POST['value'];

$query = "INSERT INTO tests VALUES(NULL,:title,:topic_id,:correct,:value,:created_at)";
$statement = $con->prepare($query);
$statement->bindValue(':title', $title);
$statement->bindValue(':topic_id', $topic_id);
$statement->bindValue(':correct', $correct);
$statement->bindValue(':value', $value);
$statement->bindValue(':created_at', date('Y-m-d h:i:s'));
$statement->execute();

echo '<script>alert("New Question Added."); window.location.href="questions.php";</script>';




