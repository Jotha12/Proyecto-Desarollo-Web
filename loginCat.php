<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$data = 'proyecto2';

$conexion = mysqli_connect($host, $user, $pass) OR die('problemas con la autenticacion');
mysqli_select_db($conexion, $data) or die('problemas con la base de datos');

$nombre = isset($_POST['txtusuario']);
$contrasena = isset($_POST["txtcontrasena"]);

$query = mysqli_query($conexion,"SELECT * FROM usuario WHERE nombre = '".$nombre."' and contrasena = '".$contrasena."'");
$nr = mysqli_num_rows($query);

if($nr == 1){
    //header("Location: menuest.php");
}
else if ($nr == 0) {
    //header("Location: loginEst.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Catedratico</title>
    <link rel="stylesheet" href="css/loginEst.css">
</head>
<body>
    <div class="login-wrap">
        <div class="login-html">
            <h1>Catedratico</h1>
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Ingresar</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <form method="post" action="menucat.php">
                        <div class="group">
                            <label for="user" class="label">Username</label>
                            <input id="user" name="txtusuario" type="text" class="input"/>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" type="password" name="txtcontrasena" class="input" data-type="password"/>
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
