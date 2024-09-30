<?php

$cpp_content = $_POST['cpp_content']; //save the content send by the .js file
$verilog_filename = 'top.v'; //save the name of the empty file

file_put_contents($verilog_filename, $cpp_content); //put content into the empty file

?>
