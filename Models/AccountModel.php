<?php

class Account{
    private $Username;
    private $Password;
    private $Email;
    private $Role;

    public function __construct($Username, $Password, $Email, $Role){
        $this->$Username = $Username;
        $this->$Password = $Password;
        $this->$Email = $Email;
        $this->$Role = $Role;
    }

    public function getUsername(){
        return $this->$Username;
    }

    public function getPassword(){
        return $this->$Password;
    }
    
    public function getEmail(){
        return $this->$Email
    }
    
    public function getRole(){
        return $this->$Role;
    }    

    public function setUsername($Username){
        $this->$Username = $Username;
    }

    public function setPassword($Password){
        $this->$Password = $Password;
    }

    public function setEmail($Email){
        $this->$Email = $Email;
    }

    public function setRole($Role){
        $this->$Role = $Role;
    }
}
?>