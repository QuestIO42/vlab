<?php

function page() {

?>

<!DOCTYPE html>
<html>
<head>
<title>Lab. Remoto de L&oacute;gica Digital - DC/UFSCar</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

<style>
body {background-color: #e0e0e0; color: #2b3856;}
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
<center>
<h1>Lab. Remoto de L&oacute;gica Digital - DC/UFSCar</h1>

	   <BR><center>Chave não encontrada - <a href=/agenda>agende um horário</a></center>
        <button onclick="window.open('http://vlab.dc.ufscar.br:8081/', 'camera');">Camera</button>
	<button onclick="window.location.href='/agenda'">Agenda</button>
	<button onclick="window.location.href='/about'">Sobre</button>
    </body>
</body>
</html>

<?php
}


$dbHost="localhost"; //MySQL server
$dbUnam="reservas"; //database username
$dbPwrd="*******"; //database password
$dbName="reservas"; //database name


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

