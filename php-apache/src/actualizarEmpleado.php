<?php 
    echo "Vamos a actualizar";
    function obtenerConexionBBDD(){
        $ip = "pgsql:host=172.17.0.2;port=5432;dbname=postgres;";
        $username = "postgres";
        $password = "ajxy2381";
        try {
            $pdo = new PDO($ip, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die('Error en la conexión a la base de datos: ' . $e->getMessage());
        }
    }


    function actualizarEmpleado($clave, $nombre, $direccion, $telefono){
        $actualizadoCorrectamente = false;
        $sqlUpdate ="UPDATE EMPLEADO SET NOMBRE = ?, DIRECCION = ?, TELEFONO = ? WHERE  CLAVE = ?";
        $conexion = obtenerConexionBBDD();
        
        $stmt = $conexion->prepare($sqlUpdate);
        $actualizadoCorrectamente = $stmt->execute([$nombre, $direccion, $telefono, $clave]);


        if($actualizadoCorrectamente){
            header("Location: empleados.php"); 
            exit; 
        }else{
            echo "No fue posible actualizar el empleado";
        }
       
    }

    $clave =  $_POST["clave"];
    $nombre =  $_POST["nombre"];
    $direccion =  $_POST["direccion"];
    $telefono =  $_POST["telefono"];
    
    actualizarEmpleado($clave, $nombre, $direccion, $telefono);

?>