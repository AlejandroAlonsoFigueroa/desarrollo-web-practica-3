<?php 

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


   

    function guardarEmpleado($clave, $nombre, $direccion, $telefono){
        $guardadoCorrectamente = false;
        $sqlInsert ="INSERT INTO EMPLEADO(CLAVE, NOMBRE, DIRECCION, TELEFONO) VALUES(?, ?, ?, ?)";
        $conexion = obtenerConexionBBDD();
        
        $stmt = $conexion->prepare($sqlInsert);
        $guardadoCorrectamente = $stmt->execute([$clave, $nombre, $direccion, $telefono]);


        if($guardadoCorrectamente){
            header("Location: empleados.php"); 
            exit; 
        }else{
            echo "No fue posible guardar el empleado";
        }
       
    }

    $clave =  $_POST["clave"];
    $nombre =  $_POST["nombre"];
    $direccion =  $_POST["direccion"];
    $telefono =  $_POST["telefono"];
    
    guardarEmpleado($clave, $nombre, $direccion, $telefono);
?>