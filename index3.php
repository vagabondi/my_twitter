
<!DOCTYPE html>
<html>
<head>
    <title>My_twitter</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
    <div class="container_index">
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
    $tweet->show($conn);

     
    
    if($_SERVER['REQUEST_METHOD']==='POST') {
        $text=$_POST['tweet_text'];
        $tweet->create($text, $_SESSION['email'], $conn);
    }
    include_once 'DB/foot.inc.php';
    ?>
    <div class="form_center">
    <form method='POST' action='index.php'>
        <label>Dodaj nowy tweet:</label><br />
        <textarea id='new_tweet' name='tweet_text' cols="28" rows="5" maxlength="140"></textarea><br />
        <input class="form_center" type="submit" name="create_tweet" value="Dodaj">
    </form>
    <form method='POST' action='index.php'>
        <input class="form_center" type="submit" name="logout" value="Wyloguj">
    </form>
    </div>
    </div>
</body>
</html>

