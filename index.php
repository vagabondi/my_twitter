<?php
include_once 'DB/top.inc.php';
session_start();
if (!$user->isLogged()){
    header('Location: login.php');
}

include_once 'DB/foot.inc.php';