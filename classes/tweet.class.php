<?php
class Tweet {
    private $id;
    private $user_id;
    private $text;
    private $tweet_img;
    
    function getId() {
        return $this->id;
    }
    
    function getUser_id() {
        return $this->user_id;
    }

    function getText() {
        return $this->text;
    }
   
    function getTweet_img() {
        return $this->tweet_img;
    }

    function setTweet_img($tweet_img) {
        
        $target = "img/";
        $target = $target . basename($tweet_img['name']) ; 
        $ok=1;
            
        
        //Here we check that $ok was not set to 0 by an error 
        if ($ok==0) { 
            echo "Sorry your file was not uploaded"; 
        }
        
        //If everything is ok we try to upload it 
        else { 
            if(move_uploaded_file($tweet_img['tmp_name'], $target)) { 
                echo "The file ". basename( $tweet_img['name']). " has been uploaded"; 
                $this->tweet_img = $target;
            } else { 
                echo "Sorry, there was a problem uploading your file."; 
            } 
        } 
        
            
        
    }
    
    function setUser_id($user_id) {
        if(isset($_SESSION['email'])) {
            $this->user_id = $user_id;
        } else { 
            return;
        }
    }

    function setText($text, $conn) {
        if(strlen($text)===0 || strlen($text)>140) {
            
            return false;
        } 
        $this->text = $conn->escape_string($text);
    }

    function __construct() {
        $this->id = -1;
        $this->user_id;
        $this->text;
    }

    private function loadDataFromDb(){
        
    }
    
    public function register($tweet_text, $user_id, $file, $conn) {

        $this->setText($tweet_text, $conn);
        $this->setUser_id($user_id);
        $this->setTweet_img($file);
        if($this->setText($tweet_text, $conn)===false) {
            echo 'Nie można wysłać pustego tweeta';
            
        } elseif($this->setTweet_img($file)===false) {
        
        $sql="INSERT INTO Tweet(user_id, text) VALUES ('$this->user_id', '$this->text');";
        $conn->query($sql);
        //header('Location: index.php');
        }
        
        else {
        
        $sql="INSERT INTO Tweet(user_id, text, tweet_img) VALUES ('$this->user_id', '$this->text', '$this->tweet_img');";
        $conn->query($sql);
        //header('Location: index.php');
        }
    }
    
    public function update(){
        
    }
    
    public function show($conn){    
        
        $sql="SELECT Tweet.user_id, Tweet.text, Tweet.tweet_img, User.user_img FROM Tweet, User WHERE Tweet.user_id=User.email ORDER BY Tweet.id DESC";
        $result=$conn->query($sql);       
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                if(!empty($row['user_img'])) {
                    $user_img=$row['user_img'];
                    if(!empty($row['tweet_img'])) {
                        $tweet_img="<img class='twit-maxiphoto' src='" . $row['tweet_img'] . "'/>";
                    } else {
                        $tweet_img='';
                    }
                } else {
                    $user_img='img/images.png';
                    if(!empty($row['tweet_img'])) {
                        $tweet_img="<img class='twit-maxiphoto' src='" . $row['tweet_img'] . "'/>";
                    } else {
                        $tweet_img='';
                    }
                }
                
                echo "<div class='twits'>" .
                        "<div class='twit-header'>" . 
                            "<div class='miniphoto-container'>" .
                                "<img class='twit-miniphoto' src='" . $user_img . "'/>" .
                            "</div>" .
                            "<div class='twit-user'>" .
                                $row['user_id'] .
                            "</div>" .
                        "</div>" .
                        "<div class='twit-text'>" .
                            "<p>" .
                                $row['text'] .
                            "</p>" .
                        "</div>" .
                        $tweet_img . 
                        "<div class='twit-comment'>" .
                            "<p>" . "comments" . "</p>" .
                        "</div>" .        
                    "</div>";
            }
        }
    }
    
    public function showMyTweets($conn){    
        $user=$_SESSION['email'];
        $sql="SELECT Tweet.user_id, Tweet.text, Tweet.tweet_img, User.user_img FROM Tweet, User WHERE Tweet.user_id=User.email AND Tweet.user_id='$user' ORDER BY Tweet.id DESC";
        $result=$conn->query($sql);       
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                if(!empty($row['user_img'])) {
                    $user_img=$row['user_img'];
                    if(!empty($row['tweet_img'])) {
                        $tweet_img="<img class='twit-maxiphoto' src='" . $row['tweet_img'] . "'/>";
                    } else {
                        $tweet_img='';
                    }
                } else {
                    $user_img='img/images.png';
                    if(!empty($row['tweet_img'])) {
                        $tweet_img="<img class='twit-maxiphoto' src='" . $row['tweet_img'] . "'/>";
                    } else {
                        $tweet_img='';
                    }
                }
                
                echo "<div class='twits'>" .
                        "<div class='twit-header'>" . 
                            "<div class='miniphoto-container'>" .
                                "<img class='twit-miniphoto' src='" . $user_img . "'/>" .
                            "</div>" .
                            "<div class='twit-user'>" .
                                $row['user_id'] .
                            "</div>" .
                        "</div>" .
                        "<div class='twit-text'>" .
                            "<p>" .
                                $row['text'] .
                            "</p>" .
                        "</div>" .
                        $tweet_img . 
                        "<div class='twit-comment'>" .
                            "<p>" . "comments" . "</p>" .
                        "</div>" .        
                    "</div>";
            }
        }
    }

    
    public function getAllComments() {
        
    }
    
    public function numOfTwits ($conn) {
        $user=$_SESSION['email'];
        $sql="SELECT text FROM Tweet WHERE user_id='$user'";
        $result=$conn->query($sql);       
        if ($result->num_rows > 0) {
            $count=0;
            while($row = $result->fetch_assoc()) {
            $count+=1;
            }
            echo $count;
        }
    }
    
    
    
    
}
