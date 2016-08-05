<?php
include_once 'DB/top.inc.php';
require_once 'classes/user.class.php';
session_start();
if (!$user->isLogged()){
    header('Location: login.php');
}
if(isset($_POST['logout'])) { 
        $user->logout();
        
    }



include_once 'DB/foot.inc.php';

?>

<form method='POST' action='index.php'>
    <input type="submit" name="logout" value="Wyloguj">
</form>
