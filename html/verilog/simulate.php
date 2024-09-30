<!DOCTYPE html>
<html>
<head>
    <script src="skins/default.js" type="text/javascript"></script>
    <script src="wavedrom.min.js" type="text/javascript"></script>
</head>
<body onload="WaveDrom.ProcessAll();">

<?php

$cmd = "/bin/bash simulate.sh";

$descriptorspec = array(
   0 => array("pipe", "r"),   // stdin is a pipe that the child will read from
   1 => array("pipe", "w"),   // stdout is a pipe that the child will write to
   2 => array("pipe", "w")    // stderr is a pipe that the child will write to
);
flush();
$process = proc_open($cmd, $descriptorspec, $pipes, realpath('./'), array());
echo "<pre>";
if (is_resource($process)) {
    while ($s = fgets($pipes[1])) {
        print $s;
        flush();
    }
    while ($s = fgets($pipes[2])) {
        print $s;
        flush();
    }
}
echo "</pre>";
echo "DONE!";
?>
<script type="WaveDrom">
    <?php readfile("dump.json"); ?>
</script>
</body>
</html>