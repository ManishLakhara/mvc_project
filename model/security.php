<?php

class Security{
    private $table = "admin";
    private $Connection;
    private $id;
    private $username;
    private $password;
    public function __construct($Connection){
        $this->Connection = $Connection;
    }
    public function getId(){
        return $this->id;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setID($id){
        $this->$id=$id;
    }
    public function setUsername($username){
        $this->$username=$username;
    }
    public function setPassword($password){
        $this->$password=$password;
    }
    public function getByUsername($value){
        $sql="SELECT password FROM ". $this->table ." where username = '".$value."'";
        $result = $this->Connection->query($sql);
        if($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            return $data["password"];
        }
    }
}

?>