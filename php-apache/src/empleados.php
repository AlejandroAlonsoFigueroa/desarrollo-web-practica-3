<html>
    <head>
        <style>
            table, tr, td{
                border: solid black 1px;
                padding: 7px;
            }
            input{
                all: unset;
                border: solid black 1px;
                padding: 7px;
            }
            button{
                border: none;
                margin: 0;
                padding: 0;
                background-color: 004481;
                padding: 9px;
                color: white;
            }
            *{
                font-family: arial;
            }

            .boton-borrar{
                background-color: red;
                color: white;
            }
            p{
                margin: 3px 0px;
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

        <div style = "border: solid black 1px; width: fit-content;">
            <h1>Guardar empleado</h1>

            <form action = "guardarEmpleado.php" method = "POST">
                <div>
                    <div>
                        <div><p>Clave</p></div>
                        <div><input type = "number" name = "clave" required /></div>
                    </div>
                    <div>
                    <div><p>Nombre</p></div>
                        <div><input type = "text" name = "nombre"required/></div>
                    </div>
                    <div>
                        <div><p>Dirección</p></div>
                        <div><input type = "text" name = "direccion" required/></div>
                    </div>
                    <div>
                        <div><p>Teléfono</p></div>
                        <div><input type = "text" name = "telefono" required/></div>
                    </div>
                </div>
                <div style = "margin-top: 10px;">
                    <button type = "submit">Guardar empleado</button>
                </div>
            </form>
        </div>
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
                        <td style = "padding: 0;">
                            <form action = "borrarEmpleado.php" method = "POST">
                                <input type = "hidden" name = "clave" value = "<?php echo $row['clave']; ?>"/>
                                <button style = "padding: 0;"class = "boton-borrar" type = "submit">Eliminar</button>
                            </form>
                        </td>
                        <td onClick = "mostrarFormActualizar('<?php echo $row['clave']; ?>', '<?php echo $row['nombre']; ?>', '<?php echo $row['direccion']; ?>', '<?php echo $row['telefono']; ?>')">Editar<?php  ?></td>
                    </tr>
                <?php }?> 
            </table>
        </div>

        <!-- Formulario para actualizar, escondido -->
        <div id ="contenedor-absoluto" style = "display: none; position: absolute; top: 0; left: 0; background-color: grey; width: 100%; height: 100%;">
           <div style = "background-color: white; width: fit-content; padding: 50px; margin: 0 auto;">
                    <form action = "actualizarEmpleado.php" method = "POST">
                        <div>
                            <div>
                                <div><p>Clave</p></div>
                                <div><input id = "fClave" type = "number" name = "clave" required readonly/></div>
                            </div>
                            <div>
                            <div><p>Nombre</p></div>
                                <div><input id = "fNombre" type = "text" name = "nombre"required/></div>
                            </div>
                            <div>
                                <div><p>Dirección</p></div>
                                <div><input id = "fDireccion" type = "text" name = "direccion" required/></div>
                            </div>
                            <div>
                                <div><p>Teléfono</p></div>
                                <div><input id = "fTelefono" type = "text" name = "telefono" required/></div>
                            </div>
                        </div>
                        <div style = "margin-top: 10px;">
                            <button type = "submit">Editar empleado</button>
                        </div>
                    </form>
           </div> 
        </div>
        <script>
            function mostrarFormActualizar(clave, nombre, direccion , telefono){
                var contenedorAbsoluto = document.getElementById("contenedor-absoluto");
                document.getElementById("fClave").value = clave;

                document.getElementById("fNombre").value = nombre;
                document.getElementById("fDireccion").value = direccion;
                document.getElementById("fTelefono").value = telefono;
              
                
                contenedorAbsoluto.style.display = "block";

                
            }
        </script>
                
    </body>
</html>