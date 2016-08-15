<?php
    require_once 'DB/top.inc.php';
    require_once 'classes/user.class.php';
    
    session_start();
    if(isset($_SESSION['email'])) {
        header('Location: index.php');
        
    }

    
    if($_SERVER['REQUEST_METHOD']==='POST') {
        
        $email = $conn->escape_string($_POST['email']);
        $pwd = $conn->escape_string(sha1($_POST['pwd']));
        $user-> login($email, $pwd, $conn);
    }
    require_once 'DB/foot.inc.php';
    
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
        <h1>Zaloguj się!</h1>
        <form method='POST' action='login.php'> 
            <input type="text" name="email" placeholder="e-mail" size="20"><br /> 
            <input type="password" name="pwd" placeholder="hasło" size="20"><br /> 
            <input type="submit" value="login"><br />
        </form>
        </div>
    </div>
</body>
</html>