<?php

function page() {

?>

<!DOCTYPE html>
<html>
<head>
<title>Lab. Remoto de Embarcados - DC/UFSCar🍌</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/github-fork-ribbon-css/0.2.3/gh-fork-ribbon.min.css" />

<style>
body {background-color: #e0e0e0; color: #2b3856;}
.github-fork-ribbon:before { background-color: #ff7f00; }
</style>
        <script>
            function changeSrc(loc) {
			//document.getElementById('iframeId').save();
                document.getElementById('iframeId').src = loc;
            }

	function openInNewTab(url) {
	  var win = window.open(url, '_blank');
	  win.focus();
	}
      </script>
    </head>
    <body>
<a class="github-fork-ribbon" href="https://github.com/QuestIO42/vlab" data-ribbon="Fork me on GitHub" title="Fork me on GitHub">Fork me on GitHub</a>
<center>
<h1>Lab. Remoto de Embarcados - DC/UFSCar🍌</h1>
	<BR><center>Chave não encontrada - <a href=/agenda>agende um horário</a></center>
	<button onclick="window.location.href='https://questio42.github.io/'">QuestI0</button>
    <button onclick="window.open('/camera.html', 'camera');">Camera</button>
	<button onclick="window.location.href='/agenda'">Agenda</button>
	<button onclick="window.location.href='/about'">Sobre</button>
    </body>
</body>
</html>

<?php
}

$dbHost=$_ENV["MYSQL_HOST"];
$dbUnam=$_ENV["MYSQL_USER"]; 
$dbPwrd=$_ENV["MYSQL_PASSWORD"];
$dbName=$_ENV["MYSQL_DATABASE"];

global $con;
$con = mysqli_connect($dbHost, $dbUnam, $dbPwrd) or trigger_error("Erro ao acessar o Banco de Dados: " . mysqli_error($con));

mysqli_select_db($con, $dbName) or trigger_error("Erro ao acessar o banco de dados: " . mysqli_error($con));


if ($con) {
        $query="set names utf8";
        $result=mysqli_query($con,$query);
}


if (!empty($_GET['key']) && is_numeric($_GET['key'])) {

	$k=$_GET['key'];
	$sql = "SELECT * FROM slots WHERE akey=\"$k\"";
	$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {

			$s=$row["start"];
			$e=$row["end"];
			$cat=$row["catID"];
			switch ($cat) {
				case 1: 
				  $editor = "fpga";
				  break;
				case 2:
				  $editor = "arduino_mega";
				  break;
				case 3:
				  $editor = "arduino_uno";
				  break;
				case 4:
				  $editor = "stm32";
				  break;
			} 
		}
		header("Location: https://vlab.dc.ufscar.br/editors/$editor/index.php?key=$k");
		exit;
	} else {
		page();
		exit;	
	}
} else {
	page();
	exit;
}

?>

