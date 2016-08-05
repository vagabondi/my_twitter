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
        $this->user_id = $user_id;
    }

    function setText($text) {
        $this->text = $text;
    }

    function __construct() {
        $this->id = -1;
        $this->user_id;
        $this->text;
    }

    private function loadDataFromDb(){
        
    }
    
    public function create(){
        
    }
    
    public function update(){
        
    }
    
    public function show(){
        
    }
    
    public function getAllComments(){
        
    }
    
    
    
    
}
