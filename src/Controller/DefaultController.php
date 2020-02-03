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
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<form action="/upload" method="post" enctype="multipart/form-data">
		
				<input type="text" name="name" />
				<input type="text" name="lat" />
				<input type="text" name="lon" />
				<input type="file" name="photo" />
				<input type="submit" value="Upload" name="submit" />
			</form>
		</div>
	</div>
</body>
</html>'
		);
	}
}