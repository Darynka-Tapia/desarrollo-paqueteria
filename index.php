<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=StyleSheet href="style.css" type="text/css" >
    <title>Document</title>
</head>
<body>
    <nav>
        <img src="img/icon.png" alt="Logo">
    </nav>
    <section>
        <?php include "sql.php";?>
        
        <div id="form">
            <div id="opciones">
                <span id="labelOrigen">Ciudad de origen</span>
                <select name="" id="inputOrigen">
                    <?php
                        foreach ($capital1 as $valor) {
                           echo '<option value="'.$valor['capital1'].'">'.$valor['capital1'].'</option>';
                        }
                    ?>                    
                </select>
                <span id="labelDestino">Ciudad destino</span>
                <select name="" id="inputDestino">
                    <?php
                        foreach ($capital1 as $valor) {
                           echo '<option value="'.$valor['capital1'].'">'.$valor['capital1'].'</option>';
                        }
                    ?> 
                </select> 
                <span id="tituloDimenciones">Dimenciones del paquete</span>

                <span id="spanAlto">Alto (cms)</span>
                <input type="number" id="inputAlto">

                <span id="spanAncho">Ancho (cms)</span>
                <input type="number" id="inputAncho">

                <span id="spanLargo">Largo (cms)</span>
                <input type="number" id="inputLargo">

                <span id="spanPeso">Peso en físico</span>
                <input type="number" id="inputPeso">

                <button id="botonCalcular">Calcular</button>
            </div>
            <div id="results">
            </div>
        </div>    

    </section>
    <footer><h1>Darynka Tapia</h1></footer>
    
    
</body>
</html>