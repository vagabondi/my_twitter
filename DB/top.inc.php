<?php

$conn = new mysqli('localhost', 'root', 'coderslab', 'twit_db');
$conn->set_charset("utf8");
if ($conn->connect_error) {
    die("Polaczenie nieudane. Blad: " . $conn->connect_error);
}

include_once (__DIR__. '../../classes/user.class.php');

$user = new User();

include_once (__DIR__. '../../classes/tweet.class.php');

$tweet = new Tweet();
