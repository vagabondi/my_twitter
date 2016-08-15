<?php
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
        <div class="welcoming">
            <h1>Witaj na Twitterze!</h1>
            <p> Połącz się ze swoimi znajomymi – i innymi ciekawymi ludźmi. 
                Otrzymuj natychmiastowe aktualizacje na tematy, które Cię 
                interesują. Obserwuj rozwój wydarzeń w czasie rzeczywistym, 
                z każdej strony.</p>
        </div>
        <div class="buttons">
            <a href="register.php"><button class="button">Zarejestruj się</button></a>
            <a href="login.php"><button class="button">Zaloguj się</button></a>
        </div>
        
    </div>

</body>
</html>