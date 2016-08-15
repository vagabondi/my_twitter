<?php

class User {
    private $email;
    private $pwd;
    private $user_img;
    
    function getEmail() {
        return $this->email;
    }

    function getPwd() {
        return $this->pwd;
    }
    
    function getUser_img() {
        return $this->user_img;
    }

    function setUser_img($user_img) {
        $this->user_img = $user_img;
    }

    function setEmail($email, $conn) {
        
        $sql="SELECT email FROM User WHERE email='$email';";
        $result=$conn->query($sql);
        if ($result->num_rows > 0){
            echo "E-mail jest juz zajety! Wybierz inny.";
        } else {
            $this->email = $conn->escape_string($email);
        } 
    }

    public function setPwd($pwd, $pwd2, $conn) {
        if ($pwd == $pwd2){
            $this->pwd = $conn->escape_string(sha1($pwd));
        } 
    }
    
    public function register($email, $pwd, $pwd2, $conn){
        if ($pwd !== $pwd2) {
            echo 'Hasla roznia sie! Sprobuj jeszcze raz.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo 'Niepoprawny e-mail!';
        }  elseif ($pwd=='') {
            echo 'Wypełnij pole hasła!';
        } else {
            $this->setEmail($email, $conn);
            $this->setPwd($pwd, $pwd2, $conn);
            if($this->email == $email) {
                $sql="INSERT INTO User(email, pwd, user_img) VALUES ('$this->email', '$this->pwd', 'img/images.png');";
                $conn->query($sql);
                header('Location: login.php');
            }
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
            
            $message = "Zle haslo lub e-mail, sprobuj jeszcze raz.";
            echo "<script type='text/javascript'>alert('$message');</script>";
            
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
       if(!is_null($_SESSION['email']) || isset($_SESSION['email'])) {
           return true;
       }  
    }
    
    public function logout(){
        $_SESSION['email'] = null;
        $_SESSION['pwd'] = null;

        session_destroy();
        header('Location: intro.php');
    }
    
    public function getMyEntries(){
        
    }
    
    public function getUserImg($conn){
       $user=$_SESSION['email'];
       $sql="SELECT user_img FROM User WHERE email='$user';";
       $result=$conn->query($sql);       
        if ($result->num_rows > 0){
            $row = $result->fetch_assoc();
            echo $row['user_img'];
        }
    }
    
    
    
    
}