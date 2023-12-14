<html>
    <head>
        <style>
            table, tr, td{
                border: solid black 1px;
            }
        </style>
    </head>
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
            $sql = "SELECT clave, nombre, direccion, telefono FROM empleado";
            $conexion =  obtenerConexionBBDD();
            $stmt = $conexion->prepare($sql);
            $stmt->execute();

            /*while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo  $row['clave'];
                echo  $row['nombre'];
                echo  $row['direccion'];
            }*/
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        function eliminarEmpleado(){

        }


    ?>

    <head></head>

    <body>

        <h1>Administrar a los empleados</h1>

        <div>
            <h2>Lista de empleados</h2>
        </div>
        <div>
            <table>
                <?php foreach(obtenerEmpleados() as $row){ ?>
                    <tr>
                        <td><?php echo $row['clave']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['direccion']; ?></td>
                        <td><?php echo $row['telefono']; ?></td>
                    </tr>
                <?php }?> 
            </table>
        </div>
    </body>
</html>