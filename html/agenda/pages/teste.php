

<?php

        function dateEmMysql($dateSql){
            $ano= substr($dateSql, 6);
            $mes= substr($dateSql, 3,-5);
            $dia= substr($dateSql, 0,-8);
            return $ano."-".$mes."-".$dia;
        }


	$a="02.10.2020";
	$d="";

	$d=dateEmMysql($a);

	echo "A=$a";
	echo "\r\n";
	echo "D=$d";
	echo "\r\n";

?>
