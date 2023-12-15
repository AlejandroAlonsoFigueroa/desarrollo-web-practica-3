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
    function eliminarEmpleado($clave){
        $eliminadoCorrectamente = false;
        $sqlDelete ="DELETE FROM EMPLEADO WHERE CLAVE = ?"; 
        $conexion = obtenerConexionBBDD();
        
        $stmt = $conexion->prepare($sqlDelete);
        $eliminadoCorrectamente = $stmt->execute([$clave]);


        if($eliminadoCorrectamente){
            header("Location: empleados.php"); 
            exit; 
        }else{
            echo "No fue posible eliminar el empleado";
        }
       
    }

    $clave =  $_POST["clave"];
   
    
    eliminarEmpleado($clave);

   
?>