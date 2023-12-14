<html>
    <head>
        <style>
            *{
                font-family: arial;
            }
            input{
                all: unset;
                border: solid black 1px;
                padding: 7px;
            }
            .label-login{
                font-weight: bold;
            }

            button{
                border: none;
                margin: 0;
                padding: 0;
                background-color: 004481;
                padding: 9px;
                color: white;
            }
        </style>
    </head>
    <body>
        <div>
            <form>
                <div>
                    <div><p class = "label-login">Usuario</p></div>
                    <input type = "text" />
                </div>
                <div>
                    <div class = "label-login"><p>Contraseña</p></div>
                    <input type = "text" />
                </div>

                <div style = "margin-top: 10px;">
                    <button type = "submit">Iniciar sesión</button>
                </div>
            </form>
        </div>
    </body>
</html>