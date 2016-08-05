<?php
    require_once 'DB/top.inc.php';
    require_once 'classes/user.class.php';

    if($_SERVER['REQUEST_METHOD']==='POST') {
        session_start();
        $email = $conn->escape_string($_POST['email']);
        $pwd = $conn->escape_string(sha1($_POST['pwd']));
        $user-> login($email, $pwd, $conn);
    }
    require_once 'DB/foot.inc.php';
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>My_twitter</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
    <div id="container">    
        <div id="form-content">
            
        <form method='POST' action='login.php'>
            
            <div id="inputs">    
                <input type="text" name="email" placeholder="e-mail"><br />
                <input type="password" name="pwd" placeholder="hasło"><br />
            </div>
            <input class='center-btn' type="submit" value="Sign In"><br />
        </form><br />

        <form method="GET" action="register.php">
            <div class="center"><label>Nie masz konta? Zarejestruj się!</label></div>
            <input class='center-btn' type='submit' value='Sign Up'>     
        </form>
        </div>
    </div>
    </body>
</html>

