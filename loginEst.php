<?php

include_once "database.php";

session_start();

if(isset($_GET['cerrar session'])){
    session_unset();
    session_destroy();

}

if(isset($_SESSION['rol'])){
    switch($_SESSION['rol']){
        case 1:
            header('lacation: menucat.php');
        break;

        case 2;
            header('lacation: menuest.php');
        break;
        default:

    }

}

if(isset($_POST['nombre']) && isset($_POST['contrasena'])){

    $nombre = $_POST['nombre'];
    $contrasena = $_POST['contrasena'];

    $db = new Database();
    $query = $db->connect()->prepare('SELECT *FROM usuarios WHERE nombre = :nombre AND contrasena = :contrasena');
    $query->execute(['nombre' => $nombre, 'contrasena' => $contrasena ]);

    $row = $query->fetch(PDO::FETCH_NUM);
    if($row == true){
        //validar rol
        $rol = $row[3];
        $_SESSION['rol'] = $rol;

        switch($_SESSION['rol']){
            case 1:
                header('location: menucat.php');
            break;

            case 2:
            header('location: menuest.php');
            break;

            default:
        }


    }else{
        echo "Usuario y contrase;a incorrecto";
    }
}


// //$host = 'localhost';
// //$user = 'root';
// $pass = '';
// $data = 'proyecto2';

// $conexion = mysqli_connect($host, $user, $pass) OR die('problemas con la autenticacion');
// mysqli_select_db($conexion, $data) or die('problemas con la base de datos');

// $nombre = isset($_POST['txtusuario']);
// $contrasena = isset($_POST["txtcontrasena"]);

// $query = mysqli_query($conexion,"SELECT * FROM usuario WHERE nombre = '".$nombre."' and contrasena = '".$contrasena."'");
// $nr = mysqli_num_rows($query);

// if($nr == 1){
//     //header("Location: menuest.php");
//     echo "Bienvenido:" .$nombre;
// }
// else if ($nr == 0) {
//     //header("Location: loginEst.php");
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Estudiante</title>
    <link rel="stylesheet" href="css/loginEst.css">
</head>
<body>
    <div class="login-wrap">
        <div class="login-html">
            <h1>Estudiante</h1>
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Ingresar</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <form action="#" method="POST">
                        <div class="group">
                            <label for="user" class="label">Username</label>
                            <input  name="nombre" type="text" class="input"/>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input  type="password" name="contrasena" class="input"/>
                        </div>
                   
                        <div class="group">
                            <input type="submit" class="button" value="Ingresar"/>
                        </div>
                        <div class="hr"></div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>
