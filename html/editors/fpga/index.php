<!DOCTYPE html>
<html>
<head>
<title>Laborat&oacute;rio Remoto de L&oacute;gica Digital - DC/UFSCar</title>
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
<h1>Laborat&oacute;rio Remoto de L&oacute;gica Digital - DC/UFSCar</h1>

</center>
	<button onclick="window.location.href='https://questio42.github.io/'">QuestI0</button>
	<button onclick="window.open('/camera.html', 'camera');">Camera</button>
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

