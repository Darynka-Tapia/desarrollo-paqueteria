<?php
  $servidor = "localhost";
  $usuario = "root";
  $password = "";

    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=vdesarrollo", $usuario, $password);      
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        //function getOrigen($conexion) {
            $sql = 'SELECT * FROM distancia_entre_capitales group by capital1';
            $capital1=[];
            foreach ($conexion->query($sql) as $key => $row) {
                $capital1[$key] = $row ;
            }
        //}



        }
        catch(PDOException $e){
            echo "<script>console.log('La conexión ha fallado:  " . $e->getMessage() . "' );</script>";
    }
?>