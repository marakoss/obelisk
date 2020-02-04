<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class DefaultController
{

	public function index()
	{
		return new Response(
			'<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="asset/styles.css" />
</head>
<body>
<div class="container-fluid">
	<div class="row">

		<div class="jumbotron text-center">
			<h1>Gratuluju!</h1>
			<p class="lead">Úspešně jste našli putovní balíček a nyní máte možnost se pochlubit ostatním ve skupině <a href="https://facebook.com/groups/motoprerov/">@motoprerov</a>.</p>
			<p class="lead"><small>Pokud jste tento balíček našli nedopatřením, vraťte ho prosím na původní místo! Děkuji</small></p>
			<p class="lead">
				<a class="btn btn-success btn-md" href="#upload" role="button">Pochlubte se</a>
			</p>
		</div>

		<div class="col-xs-12">

<form action="/upload" method="POST" enctype="multipart/form-data" id="upload">

<div class="form-group uploadimage camera">
	
	<div class="row">
		<div class="col-xs-6">
			<input type="file" id="camera" name="image" class="inputfile" accept="image/*;capture=camera" capture="user" />
			<label for="camera">
				<figure>
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 512 512">
					<path d="M512 144v288c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48h88l12.3-32.9c7-18.7 24.9-31.1 44.9-31.1h125.5c20 0 37.9 12.4 44.9 31.1L376 96h88c26.5 0 48 21.5 48 48zM376 288c0-66.2-53.8-120-120-120s-120 53.8-120 120 53.8 120 120 120 120-53.8 120-120zm-32 0c0 48.5-39.5 88-88 88s-88-39.5-88-88 39.5-88 88-88 88 39.5 88 88z"></path>
					</svg>
				</figure>
				<span>Vyfoťte se…</span>
			</label>
		</div>
		<div class="col-xs-6">
			<input type="file" id="file" name="image" class="inputfile" accept="image/*;" />
			<label for="file">
				<figure>
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
					<path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
					</svg>
				</figure>
				<span>Vyberte fotku…</span>
			</label>
		</div>
		<div class="col-xs-12">
			<div id="imagepreview"></div>
		</div>
	</div>
</div>

<div class="form-group">
	<label for="name">Vaše jméno</label>
	<input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Vaše celé jméno" />
	<small id="nameHelp" class="form-text text-muted">Jméno bude použito u příspěvku na facebookové stránce <a href="https://facebook.com/groups/motoprerov/">@motoprerov</a></small>
</div>

<div class="form-group">
	<label for="name">Aktuální souřadnice</label>
	<div class="row">
		<div class="col-md-6">
			<input type="text" class="form-control" id="lat" name="lat" aria-describedby="gpsHelp" placeholder="Šířka (Lattitude)" />
			<br />
		</div>
		<div class="col-md-6">
			<input type="text" class="form-control" id="lon" name="lon" aria-describedby="gpsHelp" placeholder="Délka (Longitude)" />
			<br />
		</div>
		<small id="nameHelp" class="form-text text-muted">Pokusíme se je zjistit, ale je možné, že zadání nebude přesné. Opravte je dle libosti</small>
		<div class="col-xs-12">
			<div id="mapholder"></div>
		</div>
	</div>
</div>

<div class="form-check text-center">
	<input type="checkbox" class="form-check-input" id="allowCheck" aria-describedby="allowHelp"  required />
	<label class="form-check-label" for="allowCheck">Souhlasím se zveřejněním</label>
	<br />
	<small id="allowHelp" class="form-text text-muted">Všechny informace zadané do této stránky nejsou ukládané</small>
</div>
<br />

<div class="text-center">
	<button type="submit" class="btn btn-success btn-md">Zveřejnit fotku na skupině</button>
</div>

		</div>
	</div>
</div>
<script src="asset/file-input.js"></script>
<script src="asset/confetti.js"></script>
<script>
var end = Date.now() + (5 * 1000);

var colors = ["#bb0000", "#ffffff", "#00bb00", "#0000bb", "#ffff00"];

(function frame() {
    confetti({
        particleCount: 5,
        angle: 60,
        spread: 55,
        origin: {
            x: 0
        },
        colors: colors
    });
    confetti({
        particleCount: 5,
        angle: 120,
        spread: 55,
        origin: {
            x: 1
        },
        colors: colors
    });

    if (Date.now() < end) {
        requestAnimationFrame(frame);
    }
}());
</script>
<script>

function getLocation() {
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(showPosition, showError);
	}
}

function showPosition(position) {
	var lat = document.getElementById("lat");
	var lon = document.getElementById("lon");
	lat.value = position.coords.latitude;
	lon.value = position.coords.longitude;
	
	var latlon = position.coords.latitude + "," + position.coords.longitude;

	var img_url = "https://maps.googleapis.com/maps/api/staticmap?center=" + latlon + "&zoom=15&size=640x450&markers=color:red%7Clabel:X%7C" + latlon + "&sensor=true&key='. getenv('GOOGLE_MAPS_API_KEY') .'";

	document.getElementById("mapholder").innerHTML = "<img src=\'"+img_url+"\'>";
}

function showError(error) {
  switch(error.code) {
    case error.PERMISSION_DENIED:
      alert("User denied the request for Geolocation.");
      break;
    case error.POSITION_UNAVAILABLE:
      alert("Location information is unavailable.");
      break;
    case error.TIMEOUT:
      alert("The request to get user location timed out.");
      break;
    case error.UNKNOWN_ERROR:
      alert("An unknown error occurred.");
      break;
  }
}

getLocation();
</script>
<script>

function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
			document.getElementById("imagepreview").style.backgroundImage =  "url(" + e.target.result + ")";
			document.getElementById("imagepreview").style.height = "200px";
		}
		reader.readAsDataURL(input.files[0]);
	}
}

document.getElementById("camera").addEventListener("change",function(){
	readURL(document.getElementById("camera"));
});

document.getElementById("file").addEventListener("change",function(){
	readURL(document.getElementById("file"));
});

</script>
</body>
</html>'
		);
	}
}