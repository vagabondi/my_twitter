<?php
class Tweet {
    private $id;
    private $user_id;
    private $text;
    
    function getId() {
        return $this->id;
    }
    
    function getUser_id() {
        return $this->user_id;
    }

    function getText() {
        return $this->text;
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
    
    public function create($new_text, $user_id, $conn){
//        $userid=  $this->setUser_id($user_id);
//        $text=$this->setText($new_text);
        
        $this->setText($new_text, $conn);
        $this->setUser_id($user_id);
        if($this->setText($new_text, $conn)===false) {
            echo 'Nie można wysłać pustego tweeta';
            
        } else {
        
        $sql="INSERT INTO Tweet(user_id, text) VALUES ('$this->user_id', '$this->text');";
        $conn->query($sql);
        header('Location: index.php');
        }
    }
    
    public function update(){
        
    }
    
    public function show($conn){    
        
        $sql="SELECT user_id, text FROM Tweet";
        $result=$conn->query($sql);       
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<div class='twit'><div>" . $row['text'] . "</div><p>" . 
                        $row['user_id'] . "</p></div>";
            }
        }
    }
    
    public function getAllComments(){
        
    }
    
    
    
    
}
