<!DOCTYPE html>
<html>
<head>
<title>Laborat&oacute;rio Remoto de L&oacute;gica Digital - DC/UFSCar</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link rel="stylesheet" href="./styles.css">

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
	<a href="https://questio42.github.io/">
        <img class="logo" src="../../assets/logo.svg" alt="Logo QuestIO" width="60" height="60" />
    </a>

	<main>
		<h1 class="title">Lab. Remoto de L&oacute;gica Digital</h1>

		<?php

		// $dbHost=$_ENV["MYSQL_HOST"];
		// $dbUnam=$_ENV["MYSQL_USER"]; 
		// $dbPwrd=$_ENV["MYSQL_PASSWORD"];
		// $dbName=$_ENV["MYSQL_DATABASE"];

		// global $con;
		// $con = mysqli_connect($dbHost, $dbUnam, $dbPwrd) or trigger_error("Erro ao acessar o Banco de Dados: " . mysqli_error($con));

		// mysqli_select_db($con, $dbName) or trigger_error("Erro ao acessar o banco de dados: " . mysqli_error($con));


		// if ($con) {
		// 		$query="set names utf8";
		// 		$result=mysqli_query($con,$query);
		// }


		// if (!empty($_GET['key']) && is_numeric($_GET['key'])) {

		// 	$k=$_GET['key'];
		// 	$sql = "SELECT * FROM slots WHERE catID=1 AND akey=\"$k\"";
		// 	$result = mysqli_query($con, $sql);

		// 	if (mysqli_num_rows($result) > 0) {
		// 		while($row = mysqli_fetch_assoc($result)) {

		// 			$s=$row["start"];
		// 			$e=$row["end"];

		// 			$dt = date('Y-m-d H:i:s');
		// 			echo "<div class='sessao-info'><b>Sessão</b> - <b>Início:</b> $s <b>Fim:</b> $e / <b>Agora:</b> $dt</div>";

		// 			$A = strtotime($s); //gives value in Unix Timestamp (seconds since 1970)
		// 			$B = strtotime($e);
		// 			$C = strtotime($dt);

		// 			if ((($C < $A) && ($C > $B)) || (($C > $A) && ($C < $B)) ){
		// 			echo " liberado";
		// 			} else {
		// 				echo "<br><br>Esta chave so permite acesso no horário entre $s e $e - <a href=/agenda>agende um novo horário</a><br>";
		?>
			<!-- <button onclick="window.location.href='https://questio42.github.io/'">QuestI0</button>
			<button onclick="window.open('/camera.php', 'camera');">Camera</button>
			<button onclick="window.location.href='/agenda'">Agenda</button>
			<button onclick="window.location.href='/about'">Sobre</button> -->
		<?php
			// 		exit;
			// 		}
			// 	}
			// } else {
			// echo "<BR><center>Chave não encontrada - <a href=/agenda>agende um horário</a></center>";
		?>   
			<!-- <button onclick="window.location.href='https://questio42.github.io/'">QuestI0</button>
			<button onclick="window.open('/camera.php', 'camera');">Camera</button>
			<button onclick="window.location.href='/agenda'">Agenda</button>
			<button onclick="window.location.href='/about'">Sobre</button> -->
		<?php
		// 	exit;
		// 	}
			
		// } else {
		// 	echo "<BR><center>Chave inválida - <a href=/agenda>agende um horário</a></center>";
		?>
			<!-- <button onclick="window.location.href='https://questio42.github.io/'">QuestI0</button>
			<button onclick="window.open('/camera.php', 'camera');">Camera</button>
			<button onclick="window.location.href='/agenda'">Agenda</button>
			<button onclick="window.location.href='/about'">Sobre</button> -->
		<?php
		// 	exit;
		// }

		?>
		<div class="options">
			<button class="option-home" onclick="window.location.href='/'">
                <img src="../../assets/home.png" alt="QuestIO" class="icon">
                Home
            </button>

			<button class="option" onclick="changeSrc('synthesis.php?key=<?php echo $k;?>')">
				<img src="../../assets/programar.png" alt="Sintetizar & Programar" class="icon">
				Sintetizar & Programar
			</button>

			<button class="option" onclick="changeSrc('assembly.php?key=<?php echo $k;?>')">
				<img src="../../assets/assembly.png" alt="Assembly" class="icon">
				Assembly
			</button>
		</div>

		<div class="codespace"> 
			<p><b>Editor</b> (lembre-se do <b>[Save]</b> antes de prosseguir):</p>
			<iframe name="editorFrame" id="editorFrame" src="editor.php" width="100%" height="380"></iframe>
		</div>

		<div class="console">
			<p><b>Console</b></p>
			<iframe id="iframeId" src="result.html" width="100%" height="200"></iframe>
		</div>
	</main>
</body>
</html>

