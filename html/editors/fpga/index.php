<!DOCTYPE html>
<html>
<head>
<title>Laborat&oacute;rio Remoto de L&oacute;gica Digital - DC/UFSCar</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link rel="stylesheet" href="/editors/fpga/styles.css">

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
	<h1>Laborat&oacute;rio Remoto de L&oacute;gica Digital - DC/UFSCar</h1>

	<?php

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
	$sql = "SELECT * FROM slots WHERE catID=1 AND akey=\"$k\"";
	$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {

			$s=$row["start"];
			$e=$row["end"];

			$dt = date('Y-m-d H:i:s');
			echo "Sessão: Inicio: $s Fim: $e / Agora: $dt";

			$A = strtotime($s); //gives value in Unix Timestamp (seconds since 1970)
			$B = strtotime($e);
			$C = strtotime($dt);

			if ((($C < $A) && ($C > $B)) || (($C > $A) && ($C < $B)) ){
			   echo " liberado";
			} else {
				echo "<br><br>Esta chave so permite acesso no horário entre $s e $e - <a href=/agenda>agende um novo horário</a><br>";
?>
	<button onclick="window.location.href='https://questio42.github.io/'">QuestI0</button>
	<button onclick="window.open('/camera.php', 'camera');">Camera</button>
	<button onclick="window.location.href='/agenda'">Agenda</button>
	<button onclick="window.location.href='/about'">Sobre</button>
<?php
			   exit;
			}
		}
	} else {
	   echo "<BR><center>Chave não encontrada - <a href=/agenda>agende um horário</a></center>";
?>   
	<button onclick="window.location.href='https://questio42.github.io/'">QuestI0</button>
	<button onclick="window.open('/camera.php', 'camera');">Camera</button>
	<button onclick="window.location.href='/agenda'">Agenda</button>
	<button onclick="window.location.href='/about'">Sobre</button>
<?php
	   exit;
	}
	
} else {
	echo "<BR><center>Chave inválida - <a href=/agenda>agende um horário</a></center>";
?>
	<button onclick="window.location.href='https://questio42.github.io/'">QuestI0</button>
	<button onclick="window.open('/camera.php', 'camera');">Camera</button>
	<button onclick="window.location.href='/agenda'">Agenda</button>
	<button onclick="window.location.href='/about'">Sobre</button>
<?php
	exit;
}

?>

	</center>
		<button onclick="window.location.href='https://questio42.github.io/'">QuestI0</button>
		<button onclick="window.open('/camera.php', 'camera');">Camera</button>
		<button onclick="window.location.href='/agenda'">Agenda</button>
		<button onclick="changeSrc('synthesis.php?key=<?php echo $k;?>')">Sintetizar & Programar</button>
		<button onclick="changeSrc('assembly.php?key=<?php echo $k;?>')">Assembly</button>
		<button onclick="window.location.href='/about'">Sobre</button>
		</body>
	<p> <b>Editor</b> (lembre-se do <b>[Save]</b> antes de prosseguir): 
	<br>
	<iframe name="editorFrame" id="editorFrame" src="editor.php" width="100%" height="337">
	</iframe>
	<hr>
	Console:
	<iframe id="iframeId" src="result.html" width="100%" height="300" style="border:none;">
	</iframe>
	</body>
</html>

