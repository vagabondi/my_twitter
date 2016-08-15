<?php

include_once 'DB/top.inc.php';

session_start();
if(!isset($_SESSION['email'])) {
    header('Location: intro.php');
}

?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<meta charset="UTF-8">
	<title> My_Twitter </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
    <div class="login-form">
        <h1>Dodaj nowego Tweeta</h1>
        <form method='POST' action='#' enctype="multipart/form-data">
            <textarea id='new_tweet' placeholder='Tekst...' name='tweet_text' cols="28" rows="5" maxlength="140"></textarea><br />
            <input type="file" name="uploaded"/>
            <input class="form_center" type="submit" name="create_tweet" value="Upload">
        </form>
        <div class="alert"><?php 
            if($_SERVER['REQUEST_METHOD']==='POST') {
    
                
                $tweet_text = $conn->escape_string($_POST['tweet_text']);
                $user_id = $_SESSION['email'];
                $file = $_FILES['uploaded'];
                

                $tweet->register($tweet_text, $user_id, $file, $conn);
            }
            
            include_once 'DB/foot.inc.php';
        ?></div>
    </div>
</div>
</body>
</html>

