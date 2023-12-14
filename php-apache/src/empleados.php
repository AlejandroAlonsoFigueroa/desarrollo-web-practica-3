<html>
    <?php 
         session_start();
        /*if(isset($_SESSION['id_usuario'])){
            echo("Tienes permiso de estar aquí");
        }else{
            echo("NoooOOO0O, como entraste bro");
            //header("Location: login.php"); 
        }*/
        echo "Hola usuario: " .   $_SESSION['id_usuario'];
       
    ?>

    <?php 
         function obtenerConexionBBDD(){
            $ip = "pgsql:host=localhost;port=5432;dbname=practica3;";
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

        function obtenerEmpleados(){

        }
        function eliminarEmpleado(){
            
        }
    ?>
    <head></head>

    <body>

        <h1>Administrar a los empleados</h1>

        <div>

        </div>
        <div>
            <?php ?>
            <h2>Lista de empleados</h2>
        </div>
    </body>
</html>