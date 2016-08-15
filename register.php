<?php

include_once 'DB/top.inc.php';

session_start();
if(isset($_SESSION['email'])) {
    header('Location: index.php');
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
        <form method='POST' action='#'>
                <input type="text" name="email" placeholder="e-mail"><br />
                <input type="password" name="pwd" placeholder="hasło"><br />             
                <input type="password" name="pwd2" placeholder="potwierdź hasło"><br />
                <input type="submit" value="Zarejestruj"><br />
        </form>
        <div class="alert"><?php 
            if($_SERVER['REQUEST_METHOD']==='POST') {
    
                session_start();
                $email = $conn->escape_string($_POST['email']);
                $pwd = $conn->escape_string($_POST['pwd']);
                $pwd2 = $conn->escape_string($_POST['pwd2']);


                $user->register($email, $pwd, $pwd2, $conn);
            }
            
            include_once 'DB/foot.inc.php';
        ?></div>
    </div>
</div>
</body>
</html>

