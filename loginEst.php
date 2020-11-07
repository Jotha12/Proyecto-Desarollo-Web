<?php
    include_once 'database.php';
    
    session_start();

    if(isset($_GET['cerrar_sesion'])){
        session_unset(); 

        // destroy the session 
        session_destroy(); 
    }
    
    if(isset($_SESSION['role'])){
        switch($_SESSION['role']){
            case 1:
                header('location:menucat.php');
            break;

            case 2:
                header('location:menuest.php');
            break;

            default:
        }
    }

    if(isset($_POST['nombre']) && isset($_POST['contrasena'])){
        $nombre = $_POST['nombre'];
        $contrasena = $_POST['contrasena'];

        $db = new Database();
        $query = $db->connect()->prepare('SELECT *FROM usuario WHERE nombre = :nombre AND contrasena = :contrasena');
        $query->execute(['nombre' => $nombre, 'contrasena' => $contrasena]);

        $row = $query->fetch(PDO::FETCH_NUM);
        
        if($row == true){
            $role = $row[2];
            
            $_SESSION['role'] = $role;
            switch($role){
                case 1:
                    header('location:menucat.php');
                break;

                case 2:
                    header('location:menuest.php');
                break;

                default:
            }
        }else{
            // no existe el usuario
            echo "Nombre de usuario o contraseña incorrecto";
        }
        

    }
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
