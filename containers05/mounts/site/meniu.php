<?php 
$cale = 'http://localhost/labs/Lab7final/';
session_start();
if(!$_SESSION['user']) { 
	header('Location: '.$cale);
} 
?>
<!DOCTYPE html>
<html> 
<head>
<meta charset="UTF-8" /> 
	<title>Meniu</title>
	<link rel="stylesheet" type="text/css" href="stil.css" /> 
</head>
<body>
	<div class="meniu">
		<ul>
			<li><a href="#1">Despre noi</a></li>
			<li><a href="#2">Produse</a></li>
			<li><a href="#3">Clientii despre noi</a></li>
			<li><a href="#4">Contacte</a></li>
			<li><a href ="delogare.php">Iesire</a></li>
		</ul>
	</div>
	<div class="imagine">
		<img src="img.webp" alt="O imagine" class="img" />
	</div>
</body>
</html>