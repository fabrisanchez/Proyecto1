<?php

include_once 'Database.php';
include_once 'Autos.php';


$database = new Database();
$db = $database->getConnection();

$item = new Autos($db);
	 	

if (isset($_POST['placa']) &&
    isset($_POST['modelo']) && 
    isset($_POST['identidad']) &&
    isset($_POST['nombreprop']) && 
    isset($_POST['fechanac']) && 
    isset($_POST['sexo']) &&
    isset($_POST['tipoprop']) &&
    isset($_POST['departamento']))
{
		$placa = $_POST['placa'];
	    $modelo = $_POST['modelo'];
	    $identidad = $_POST['identidad'];
	    $nombreprop = $_POST['nombreprop'];
	    $fechanac = $_POST['fechanac'];
	    $sexo = $_POST['sexo'];
	    $tipoprop = $_POST['tipoprop'];
	    $departamento = $_POST['departamento'];	

	    $item->placa = $placa;  
        $item->modelo = $modelo;
        $item->identidad = $identidad;
        $item->nombreprop = $nombreprop;
        $item->fechanac= $fechanac;
        $item->sexo = $sexo;
        $item->tipoprop = $tipoprop;
        $item->departamento = $departamento;


	if($item->createAutos())
	{
		echo "Se Ingreso correctamente";
		echo "<br>";
		echo "<a href='formularioauto.php'>REGRESAR ATRAS</a>";
	}else
 	{
 		echo "El auto no se ingreso.";
 	}
   }else{
	echo "<br>";
	echo "ERROR, the ejecution is stop";
}
?>