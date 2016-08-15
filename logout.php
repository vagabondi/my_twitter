 <?php
    require_once 'DB/top.inc.php';
    require_once 'classes/user.class.php';

    
    session_start();
    if(isset($_SESSION['email'])) { 
        $user->logout();
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
        
    </div>
</body>
</html>