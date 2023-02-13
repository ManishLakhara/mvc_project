<?php

class EmployeesController{

    private $conectar;
    private $mysqliConectar;
    private $Connection;
    private $mysqliConnection;
    private $checked=false;
    public function __construct() {
        //require_once __DIR__ . "/../core/Conectar.php";
        require_once __DIR__ . "/../core/mysqliConectar.php";
        require_once __DIR__ . "/../model/employee.php";
        require_once __DIR__ . "/../model/security.php";

        //$this->conectar= new Conectar();
        //$this->Connection=$this->conectar->Connection();
        $this->mysqliConectar = new MysqliConectar();
        $this->mysqliConnection = $this->mysqliConectar->Connection();
    }

/**
    * Ejecuta la acción correspondiente.
    *
    */

public function run($accion) {
    switch($accion){
        case "login" :
            $this->login();
            break;
        case "check" :
            $this->check();
            break;
        case "index" :
            $this->index();
            break;
        case "alta" :
            $this->crear();
            break;
        case "detalle" :
            $this->detalle();
            break;
        case "actualizar" :
            $this->actualizar();
            break;
        default:
            //$this->index();
           // break;
    }
}

    public function check(){
        if($this->checked==false){
            $security=new Security($this->mysqliConnection);
            $result=$security->getByUsername($_POST["username"]);
            if($result==$_POST["password"]){
                $this->checked=true;
                $this->index();

            }else{
                $this->view("login",array(
                    "error"=>"Incorrect Password"
            ));          
            }         
        }else{
        $this->index();
        } 
    }

    public function login(){
        $this->view("login",array());
    }

/**
    * Loads the employees home page with the list of
    * employees getting from the model.
    *
    */ 
    public function index(){

        //We create the employee object
        $employee=new Employee($this->mysqliConnection);
        //We get all the employees
        $employees=$employee->getAll();
       
        //We load the index view and pass values to it
        $this->view("index",array(
            "employees"=>$employees,
            "titulo" => "PHP MVC"
        ));
    }

/**
    * Loads the employees home page with the list of
     * employees getting from the model.
    *
    */ 


public function detalle(){
        
    //We load the model
    $modelo = new Employee($this->mysqliConnection);
    //We recover the employee from the BBDD
    $employee = $modelo->getById($_GET["id"]);
    //We load the detail view and pass values to it
    $this->view("detalle",array(
        "employee"=>$employee,
        "titulo" => "Detalle Employee"
    ));
}
/**
    * Create a new employee from the POST parameters
     * and reload the index.php.
    *
    */

public function crear(){
    if(isset($_POST["Name"])){
         
    //Creamos un usuario
        $employee=new Employee($this->mysqliConnection);
        $employee->setName($_POST["Name"]);
        $employee->setSurname($_POST["Surname"]);
        $employee->setEmail($_POST["email"]);
        $employee->setphone($_POST["phone"]);
        $save=$employee->save();
    }
    $this->index();
}

    /**
    * Update employee from POST parameters
     * and reload the index.php.
    *
    */

public function actualizar(){
        if(isset($_POST["id"])){
            
            //We create a user
            $employee=new Employee($this->mysqliConnection);
            $employee->setId($_POST["id"]);
            $employee->setName($_POST["Name"]);
            $employee->setSurname($_POST["Surname"]);
            $employee->setEmail($_POST["email"]);
            $employee->setphone($_POST["phone"]);
            $save=$employee->update();
        }
        $this->index();
}

     /**
    * Create the view that we pass to it with the indicated data.
    *
    */

    public function view($vista,$datos){
        $data = $datos;  
        require_once  __DIR__ . "/../view/" . $vista . "View.php";

    }
}