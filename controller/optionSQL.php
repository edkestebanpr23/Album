<?php
    //http://stackoverflow.com/questions/18382740/cors-not-working-php
	if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }

    $host = "localhost";
    $user = "root";
    $pw   = "";
    $db   = "esteban_y_mario";

    $conexion = mysqli_connect($host, $user, $pw, $db);

    if(!$conexion){
        echo "fail";
    } else {
        $ejecucion = $_POST["ejecucion"];
        if($ejecucion == 1) {
            $user = $_POST['user'];
            $sqlQuery = "SELECT description FROM user WHERE nickname = '$user'";
            $ejec = mysqli_query($conexion, $sqlQuery);
            if($ejec) {
                $dato = mysqli_fetch_assoc($ejec);
                echo 1 . $dato['description'] . 1;
            } else {
                echo 'error';
            }
        } else if ($ejecucion == 2) {
            $texto = $_POST['text'];
            $user = $_POST['user'];
            $sqlQuery = "UPDATE user SET description = '$texto' WHERE nickname = '$user'";
            $ejec = mysqli_query($conexion, $sqlQuery);
            if($ejec) {
                echo 'insert';
            } else {
                echo 'error';
            }
        }
    }
?>