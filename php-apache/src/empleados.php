<html>
    <?php 
         session_start();
        /*if(isset($_SESSION['id_usuario'])){
            echo("Tienes permiso de estar aquí");
        }else{
            echo("NoooOOO0O, como entraste bro");
            //header("Location: login.php"); 
        }*/
        echo "Hola";
        echo  $_SESSION['id_usuario'];
       
    ?>
    <head></head>

    <body>

        <h1>Administrar a los empleados</h1>

        <div>

        </div>
        <div>
            <h2>Lista de empleados</h2>
        </div>
    </body>
</html>