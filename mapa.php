<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <button id="TrazarRuta">trazar mapa</button>

    <div id="mapa"></div>
    

    <script>
        fetch("https://google-maps-geocoding.p.rapidapi.com/geocode/json?address=164%20Townsend%20St.%2C%20San%20Francisco%2C%20CA&language=en", {
	"method": "GET",
	"headers": {
		"x-rapidapi-host": "google-maps-geocoding.p.rapidapi.com",
		"x-rapidapi-key": "f533e3e604msh09b79d971ff5a92p11c352jsn0abc862cf7d5"
	}
})
.then(response => {
	console.log(response.url);
})
.catch(err => {
	console.error(err);
});
    </script>
</body>
</html>