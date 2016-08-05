<?php

class User {
    private $email;
    private $pwd;
    
    function getEmail() {
        return $this->email;
    }

    function getPwd() {
        return $this->pwd;
    }

    function setEmail($email, $conn) {
        $this->email = $email;
        $sql="SELECT email FROM User WHERE email='$email';";
        $result=$conn->query($sql);
        if ($result->num_rows > 0){
            echo "E-mail jest już zajęty! Wybierz inny.";
        }
    }

    public function setPwd($pwd, $pwd2) {
        if ($pwd == $pwd2){
            $this->pwd = sha1($pwd);
        } else {
            echo 'Hasła różnią się! Spróbuj jeszcze raz.';
        }
    }
    
    public function register($email, $pwd, $pwd2, $conn){
        if ($pwd != $pwd2) {
            echo 'Hasla roznią sie';
        } 
        //pwd2 - potwierdzenie?
        
        
        //Dzięki linijce niżej mamy w $pwdHashed bezpiecznie hasło
        $pwdHashed = sha1($pwd); //32 znaki!
        $sql="INSERT INTO User(email, pwd) VALUES ('$email', '$pwdHashed');";
        $result=$conn->query($sql);
            if($result!=FALSE) {
                header("Location: login.php");
            } else {
                echo "Błąd podczas dodawania użytkownika.<br>" . $conn->error;
            }
        
    }

    public function login($email, $pwd, $conn) {
        
        $sql="SELECT*FROM User WHERE email='$email' AND pwd='$pwd';";
        $result=$conn->query($sql);
        
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $_SESSION['email']=$row['email'];
                
                $_SESSION['pwd'] =$row['pwd'];
                
                header('Location: index.php');
            }    
        } else {
            echo 'Zle haslo lub e-mail, sprobuj jeszcze raz.';
        }
    }
    
    public function autoLogin(){
        session_start();
        
        if(!isset($_SESSION['email']) || !isset($_SESSION['pwd'])) {
            $this->login($_SESSION['email'], $_SESSION['pwd']);
        } else {
            header('Location: login.php');
        }
    }
    
    public function isLogged(){
       if(!is_null($_SESSION['email']) && isset($_SESSION['email'])) {
           return true;
       }  
    }
    
    public function logout(){
        $_SESSION['email'] = null;
        $_SESSION['pwd'] = null;
        
        session_destroy();
    }
    
    
    
}