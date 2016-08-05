<form method='POST' action='#'>
    <label>E-mail: 
        <input type="text" name="email"><br />
    </label>
    <label>Haslo: 
        <input type="password" name="pwd"><br /> 
    </label>
    <label>Potwierdź hasło:
        <input type="password" name="pwd2"><br />
    </label>
        <input type="submit" value="Register"><br />
</form>

<?php

include_once 'DB/top.inc.php';


if($_SERVER['REQUEST_METHOD']==='POST') {
    
    session_start();
    $email = $conn->escape_string($_POST['email']);
    $pwd = $conn->escape_string($_POST['pwd']);
    $pwd2 = $conn->escape_string($_POST['pwd2']);
    
    
    $user->register($email, $pwd, $pwd2);
}


include_once 'DB/foot.inc.php';