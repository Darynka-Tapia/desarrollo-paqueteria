<?php
    include 'sql.php';
    $capital1   = $_POST['capital1'];
    $capital2   = $_POST['capital2'];
    $alto       = $_POST['alto'];
    $ancho      = $_POST['ancho'];
    $largo      = $_POST['largo'];
    $peso       = $_POST['peso'];

    echo $capital1.' | ';
    echo $capital2.' | ';

    //Paso 1 -> Obtener la distancia entre zonas
    $distancias = 'SELECT * FROM distancia_entre_capitales where capital1="'.$capital1.'" and capital2="'.$capital2.'"';
    foreach ($conexion->query($distancias) as $key => $row) {
        $distancia = $row['distancia'];
    }
    echo $distancia.'Kms | ';
    //Paso 2 -> Obtener la zona 
    $zonas = 'SELECT * FROM distancia_zonas ';
    foreach ($conexion->query($zonas) as $key => $row) {
        if($row['id']==8){
            if($distancia >= $row['distancia_inicial']){
                $zona = $row['zona'];
            }
        }else{
            if($distancia >= $row['distancia_inicial'] && $distancia <= $row['distancia_final']){
                $zona = $row['zona'];
            }
        } 
    }
    // echo $zona.' zona | ';
    // Paso 3 -> Obtener el peso volumetrico 
    $pesoVolumetrico=($largo*$ancho*$alto)/5000;
    $pesoVolumetrico.' | ';

    echo $alto .' | ';         
    echo $ancho.' | ';     
    echo $largo.' | ';     

    // Paso 4 -> seleccionar el mayor entre el peso volumétrico y el peso real
    $pesoReal;
    if($pesoVolumetrico>$peso){
        $pesoReal = $pesoVolumetrico;
    }else{
        $pesoReal = $peso;
    }

    $pesoReal=round($pesoReal);
    echo $pesoVolumetrico.' | ';
    echo $zona.' | ';

    // Paso 5 -> ubicarlo en las tablas de peso/zonas de las tarifas de paquetería y regresar el costo para cada proveedor logístico
    $proveedores = 'SELECT proveedor, MAX(zona), MAX(tarifa) as tarifa, MAX(kilogramos) as kilogramos FROM zonas_tarifa where kilogramos<='.$pesoReal.' and zona='.$zona.' GROUP BY proveedor';
    $provOpciones=[];
    foreach ($conexion->query($proveedores) as $key => $row) {
        $item =  array (
            'proveedor' => $row['proveedor'],
            'tarifa' => $row['tarifa']
          );
        array_push($provOpciones, $item);
    }

    $proveedorminimo = min(array_column($provOpciones, 'tarifa')); 

    foreach ($provOpciones as $key => $row) {
        if($row['tarifa']==$proveedorminimo){
            $idProveedor = $row['proveedor'];
        }
    }

    echo $proveedorminimo.' | ';
    

?>
