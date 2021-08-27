<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=StyleSheet href="style.css" type="text/css" >
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                <select name="inputOrigen" id="inputOrigen">
                    <?php
                        foreach ($capital1 as $valor) {
                           echo '<option value="'.$valor['capital1'].'">'.$valor['capital1'].'</option>';
                        }
                    ?>                    
                </select>
                <span id="labelDestino">Ciudad destino</span>
                <select name="inputDestino" id="inputDestino">
                    <?php
                        foreach ($capital1 as $valor) {
                           echo '<option value="'.$valor['capital1'].'">'.$valor['capital1'].'</option>';
                        }
                    ?> 
                </select> 
                <span id="tituloDimenciones">Dimensiones del paquete</span>

                <span id="spanAlto">Alto (cms)</span>
                <input type="number" id="inputAlto" name="inputAlto" min="1">

                <span id="spanAncho">Ancho (cms)</span>
                <input type="number" id="inputAncho" name="inputAncho" min="1">

                <span id="spanLargo">Largo (cms)</span>
                <input type="number" id="inputLargo" name="inputLargo" min="1">

                <span id="spanPeso">Peso en físico</span>
                <input type="number" id="inputPeso" name="inputPeso" min="1">

                <button id="botonCalcular" onclick="calcular()">Calcular</button>
            </div>
            <div id="results">

            </div>
        </div>    

    </section>
    <footer>
        <h3>Desarrollado por Darynka Tapia ♥</h3>
    </footer>

    <script>
        function calcular(){

            var origen = document.getElementById('inputOrigen');
            origen = origen[origen.selectedIndex].value;
            var destino = document.getElementById('inputDestino');
            destino = destino[destino.selectedIndex].value;

            var parametros = {
                'capital1' : origen,
                'capital2' : destino,
                'alto'     : document.getElementById('inputAlto').value,
                'ancho'    : document.getElementById('inputAncho').value,
                'largo'    : document.getElementById('inputLargo').value,
                'peso'     : document.getElementById('inputPeso').value
            }

            
            $.ajax({
                method: "POST",
                url: "functions.php",
                data: parametros
            })
            .done(function( response ) {
                let data = response.split(' | '); 
                

                var respuesta = document.getElementById('results');
                respuesta.innerHTML = `De: <b>${data[0]}</b> A: <b>${data[1]}</b>
                <br>
                La distancia es de ${data[2]}
                <br>
                Dimensiones del paquete: ${data[3]} x ${data[4]} x ${data[5]}
                <br>
                Peso Volumétrico: ${data[6]}
                <br>
                Se entregara dentro de la zona ${data[7]}
                <br>
                Tarifa de entrega: ${data[8]}
                `;
                console.log(data);

                document.getElementById('results').style.display="block";
                document.getElementById('results').style.transition="0.5s";
                
                
            });
        }
        

    </script>

    
    
    
</body>
</html>