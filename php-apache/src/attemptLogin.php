
<?php 
    session_start();

    function validarCredenciales($usuario, $contra){
        $conexion = obtenerConexionBBDD();
        
        $consulta = "SELECT id, username, password FROM usuarios WHERE username = ? AND password = ?";
        $stmt = $conexion->prepare($consulta);
        $stmt->execute([$usuario, $contra]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row){
            echo "Usuario válido";
            $_SESSION['id_usuario'] = $row['id'];
            header("Location: empleados.php"); 
            exit; 
        }else{
            echo "Credenciales inválidas";
        }
    }



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

    if(isset($_POST["username"]) && isset($_POST["password"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        validarCredenciales($username, $password);
    }else{
        echo "Vienen vacías las credenciales";
    }
   
?>