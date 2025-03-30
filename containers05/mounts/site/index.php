<?php
	$cale = 'http://localhost/labs/Lab7final/';
	session_start();
	if (isset($_REQUEST['ok'])) {
		if ((isset($_POST["login"]))and(!empty($_POST['login']))and(isset($_POST["pass"]))and(!empty($_POST['pass']))) {
			$password=$_POST["pass"];
			$login=$_POST["login"];
			$log=fopen("rez.txt", "r")or die("Fisier inaccesibil!");
			$exist=false;
			while(!feof($log))
			{
				$extras=trim(fgets($log));
				if($extras == trim($login).' '.md5($password)) {$exist=true;}
			}
			fclose($log);
			if ($exist==true){
				$_SESSION['user'] = $login;
				header('Location: '.$cale.'meniu.php');
			} else {
				header('Location: '.$cale);}		
		}
		
		}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Autentificare</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="stil.css" />
	</head>
	<body>
	<div class="link">
		<a href ="inregistrare.php" class="optiuni"> Inregistrare</a>
	</div>
	<div class="form">
		<p>Autentificati-va, completand formularul!</p>
		<form method="POST" action="<?php $_SERVER['SCRIPT_NAME']?>">
		<p>	<input type="text" placeholder="Log-in" name="login" /></p>
			<input type="password" placeholder="Parola" name="pass" size="12" maxlength="10" /><br /> 
			<input type="submit" value="Intra" name="ok" />
			<input type="reset" value="Sterge" />
		</form>
	</div>
	</body>
</html>