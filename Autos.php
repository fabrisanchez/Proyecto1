<?php


class Autos{

    //Coneexion 

    private $conn;
    private $tablename = "automoviles";

    public $placa;
    public $modelo;
    public $identidad;
    public $nombreprop;
    public $fechanac;
    public $sexo;
    public $tipoprop;
    public $departamento;


    // Construuctor de Clase
    
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Crear un Auto
        public function createAutos(){
            $sqlQuery = "INSERT INTO
                        ". $this->tablename ."
                    SET
                    placa = :placa, 
                    modelo = :modelo, 
                    identidad = :identidad, 
                    nombreprop = :nombreprop , 
                    fechanac = :fechanac,
                    sexo = :sexo,
                    tipoprop = :tipoprop,
                    departamento = :departamento"; 
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->placa=htmlspecialchars(strip_tags($this->placa));
            $this->modelo=htmlspecialchars(strip_tags($this->modelo));
            $this->identidad=htmlspecialchars(strip_tags($this->identidad));
            $this->nombreprop=htmlspecialchars(strip_tags($this->nombreprop));
            $this->fechanac=htmlspecialchars(strip_tags($this->fechanac));
            $this->sexo=htmlspecialchars(strip_tags($this->sexo));
            $this->tipoprop=htmlspecialchars(strip_tags($this->tipoprop));
            $this->departamento=htmlspecialchars(strip_tags($this->departamento));
          
        
            // bind data
            $stmt->bindParam(":placa", $this->placa);
            $stmt->bindParam(":modelo", $this->modelo);
            $stmt->bindParam(":identidad", $this->identidad);
            $stmt->bindParam(":nombreprop", $this->nombreprop);
            $stmt->bindParam(":fechanac", $this->fechanac);
            $stmt->bindParam(":sexo", $this->sexo);
            $stmt->bindParam(":tipoprop", $this->tipoprop);
            $stmt->bindParam(":departamento", $this->departamento);
           
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
}

?> 