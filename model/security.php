<?php

class Security{
    private $table;
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
        $consultation = $this->Connection->prepare("SELECT * FROM admin WHERE username = ".$value);
        var_dump($consultation->execute());
        $resultados = $consultation->setFetchMode(PDO::FETCH_ASSOC);
        $this->Connection = null; //connection closure
        var_dump($resultados);
        return $resultados;
    }
}

?>