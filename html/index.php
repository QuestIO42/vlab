<?php

function page() {
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <title>Lab. Remoto de Embarcados - DC/UFSCar</title>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/github-fork-ribbon-css/0.2.3/gh-fork-ribbon.min.css" />
        <link rel="stylesheet" href="styles.css">

        <script>
            function changeSrc(loc) {
                document.getElementById('iframeId').src = loc;
            }

            function openInNewTab(url) {
                var win = window.open(url, '_blank');
                win.focus();
            }
        </script>
    </head>
    <body>
        <a class="github-fork-ribbon" href="https://github.com/QuestIO42/vlab" data-ribbon="Fork me on GitHub" title="Fork me on GitHub">
            Fork me on GitHub
        </a>
        
        <a href="https://questio42.github.io/">
            <img class="logo" src="./assets/logo.svg" alt="Logo QuestIO" width="60" height="60" />
        </a>

        <main>
            <h2 class="subtitle">DC/UFSCar</h2>
            <h1 class="title">Lab. Remoto de Embarcados</h1>

            <div class="message">
                <h3> Bem-vindo ao nosso Laboratório! </h3>
                <p> 
                    Este espaço foi criado para oferecer suporte ao desenvolvimento de projetos com a plataforma Terasic DE10-Standard (Cyclone V SoC). 
                    Agora localizado no <strong>Espaço Maker do DC/UFSCar</strong>, o laboratório conta com uma estrutura aprimorada, incluindo iluminação auxiliar para 
                    uso noturno. 
                </p>
            </div>

            <div class="option-container">
                <button class="option-home" onclick="window.location.href='https://questio42.github.io/'">
                    <img src="./assets/home.png" alt="QuestIO" class="icon">
                    Home
                </button>

                <button class="option-questio" onclick="window.location.href='https://questio.vlab.dc.ufscar.br/'">
                    <img src="./assets/questio.png" alt="QuestIO" class="icon">
                    QuestI0
                </button>

                <button class="option" onclick="window.open('/camera.php', 'camera');">
                    <img src="./assets/camera.png" alt="Camera" class="icon">
                    Camera
                </button>

                <button class="option" onclick="window.location.href='/agenda'">
                    <img src="./assets/agenda.png" alt="Agenda" class="icon">
                    Agenda
                </button>

                <button class="option" onclick="window.location.href='/about'">
                    <img src="./assets/sobre.png" alt="Sobre" class="icon">
                    Sobre
                </button>
            </div>
        </main>
    </body>
    </html>
    <?php
}

// $dbHost=$_ENV["MYSQL_HOST"];
// $dbUnam=$_ENV["MYSQL_USER"]; 
// $dbPwrd=$_ENV["MYSQL_PASSWORD"];
// $dbName=$_ENV["MYSQL_DATABASE"];

// global $con;
// $con = mysqli_connect($dbHost, $dbUnam, $dbPwrd) or trigger_error("Erro ao acessar o Banco de Dados: " . mysqli_error($con));

// mysqli_select_db($con, $dbName) or trigger_error("Erro ao acessar o banco de dados: " . mysqli_error($con));

// if ($con) {
//     $query = "set names utf8";
//     $result = mysqli_query($con, $query);
// }

// if (!empty($_GET['key']) && is_numeric($_GET['key'])) {
//     $k = $_GET['key'];
//     $sql = "SELECT * FROM slots WHERE akey=\"$k\"";
//     $result = mysqli_query($con, $sql);

//     if (mysqli_num_rows($result) > 0) {
//         while($row = mysqli_fetch_assoc($result)) {
//             $s = $row["start"];
//             $e = $row["end"];
//             $cat = $row["catID"];
//             switch ($cat) {
//                 case 1: 
//                     $editor = "fpga";
//                     break;
//                 case 2:
//                     $editor = "arduino_mega";
//                     break;
//                 case 3:
//                     $editor = "arduino_uno";
//                     break;
//                 case 4:
//                     $editor = "stm32";
//                     break;
//             }
//         }
//         header("Location: https://legacy.vlab.dc.ufscar.br/editors/$editor/index.php?key=$k");
//         exit;
//     } else {
//         page();
//         exit;    
//     }
// } else {
//     page();
//     exit;
// }

    page();
// ?>
