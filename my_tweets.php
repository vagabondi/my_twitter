    <?php
    include_once 'DB/top.inc.php';
    require_once 'classes/user.class.php';
    require_once 'classes/tweet.class.php';
    session_start();
    if (!$user->isLogged()){
        header('Location: intro.php');
    }
    if(isset($_POST['logout'])) { 
            $user->logout();
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
<div class="idx-container">
    <?php    include 'header.php'; ?>
    
    <div class="user-info">
        <img src="
             <?php 
                $user->getUserImg($conn);
             ?>
             " class="photo">
        <p class='user-name'><?php echo $_SESSION['email']; ?></p>
        <div><p class='twits-info'>Tweets(<?php $tweet->numOfTwits($conn); ?>)</p></div>
        
            
    </div>
    
    <?php
    $tweet->showMyTweets($conn);
    ?>       
    
</div>
</body>
</html>
