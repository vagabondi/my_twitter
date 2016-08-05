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

<form method='POST' action='login.php'>
    <label>E-mail: 
        <input type="text" name="email"><br />
    </label>
    <label>Haslo: 
        <input type="password" name="pwd"><br /> 
        <input type="submit" value="Send"><br />
</form><br />

<form method="GET" action="register.php">
    <label>Nie masz konta? Zarejestruj sie!</label><br />
    <input type='submit' value='Register'> 
    
</form>



