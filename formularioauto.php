<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
	<title>Programacion Web</title>
</head>
<body>

    <div class="container mt-3">
     <h2>INGRESO DE AUTOMOVILES</h2>
     <h2>Complete los siguientes campos:</h2>

    <form action="crearauto.php" method="POST">

            <div class= "mb-3 mt-3">
            <label>Numero de Placa:</label>
            <input type="tel" name="placa" class="form-control " placeholder="Ingrese numero de placa:">
            </div>
        
            <div class="mb-3 mt-3">
            <label class="cont">Modelo</label>
            <select name="modelo" id="">
                 <option value="0">Selecciona</option>
            <?php

                include_once 'Database.php';
                


              $database = new Database();
              $db = $database->getConnection();

              $sql = "SELECT modelo FROM modelos;";

              $stmt = $db->prepare($sql);
              $result = $stmt->execute();
              $rows = $stmt->fetchALL(\PDO::FETCH_OBJ);

              foreach($rows as $row){
              ?>
              <option value="<?php print($row->modelo); ?>"><?php print($row->modelo); ?></option>
              <?php 
                }
              ?>
            </select>     
            </div>

            <div class= "mb-3 mt-3">
            <label>Identidad Propietario:</label>
            <input type="text" name="identidad" class="form-control " placeholder="Ingrese la Id del propietario:">
            </div>

            <div class= "mb-3 mt-3">
            <label>Nombre del Propietario:</label>
            <input type="text" name="nombreprop" class="form-control " placeholder="Ingrese el nombre:">
            </div>

            <div class= "mb-3 mt-3">
            <label>Fecha Nacimiento:</label>
            <input type="date" name="fechanac">
            </div>
  
            <label for="sexo">sexo:</label>
            <select name ="sexo" >
              <option value="M">Masculino</option>
              <option value="F">Femenino</option>
              <option value="O">otro</option>
            </select>
         </br>
         </br>
            <div class="mb-3 mt-3">
            <label class="cont">Tipo de Propietario</label>
            <select name="tipoprop" id="">
                 <option value="0">Selecciona</option>
             <?php

               include_once 'Database.php';
               
              $database = new Database();
              $db = $database->getConnection();

              $sql = "SELECT tipoprop FROM tipopropietario;";

              $stmt = $db->prepare($sql);
              $result = $stmt->execute();
              $rows = $stmt->fetchALL(\PDO::FETCH_OBJ);

              foreach($rows as $row){
              ?>
              <option value="<?php print($row->tipoprop); ?>"><?php print($row->tipoprop); ?></option>
              <?php 
                }
              ?>
            </select>   
            </div>


            <div class="mb-3 mt-3">
            <label class="cont">Departamento</label>
            <select name="departamento" id="">
            <option value="0">Selecciona</option>
            <?php

              include_once 'Database.php';
               
              $database = new Database();
              $db = $database->getConnection();

              $sql = "SELECT departamento FROM departamentos;";

              $stmt = $db->prepare($sql);
              $result = $stmt->execute();
              $rows = $stmt->fetchALL(\PDO::FETCH_OBJ);

              foreach($rows as $row){
              ?>
              <option value="<?php print($row->departamento); ?>"><?php print($row->departamento); ?></option>
              <?php 
                }
              ?>
            </select>   
            </div>
     <input type="submit" name="Enviar"class="btn btn-primary">

     </form>

    </div>
 </body>
</html>