<?php 
session_start();
if ((isset($_POST["login"]))and(!empty($_POST['login']))and(isset($_POST["pass"]))and(!empty($_POST['pass']))) {
		//deschidem fisierul pentru citire
	$password=$_POST["pass"];
	$login=$_POST["login"];
	$log=fopen("rez.txt", "r")or die("Nu a fost gasit fisierul!");
	$exist=false;
	while(!feof($log))
	{
		//trim — sterge spatiile si alte simboluri de la inceputul si sfarsitul sirului
		$extras=trim(fgets($log));
		if($extras == $login.' '.md5($password)) {
			$exist=true;
		}
	}
	fclose($log);
	$mesaj = "";
	if ($exist==true){
		$mesaj = "Un cont cu acest login si parola deja exista!!!<br />Introdu alte date pentru inregistrare!";
	} else {
		$txt=fopen("rez.txt","a") or die("Fisier inaccesibil!");
		$log=$_POST["login"];
		fwrite($txt, $log);
		$spatiu=" ";
		fwrite($txt,$spatiu);
		$password=md5($_POST["pass"]);
		fwrite($txt,$password);
		$enter="\n";
		fwrite($txt,$enter);
		fclose($txt);
		$mesaj = "Contul a fost creat!";
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Inregistrare</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="stil.css" />
	</head>
	<body>
	<div class="form">
		<p >Inregistrati-va pentru a avea acces la date!</p>
		<form method="POST" action="<?php $_SERVER['SCRIPT_NAME']?>">
		<p><input type="text" placeholder="Introdu log-in-ul" name="login" /></p>
		<input type="password" placeholder="Introdu parola" name="pass" size="12" maxlength="10" /><br />
		<input type="submit" value="Salveaza" />
		<input type="reset" value="Anuleaza" />
		<?php
			if(empty($_REQUEST['login'])||empty($_REQUEST['pass'])) {
			echo "<br />Completati toate campurile!!!"; 
			}

		?>
		</form>
	</div>
	<div class="link">
		<a href ="index.php" class="optiuni"> Autentificare</a>
	</div>
	</body>
</html>