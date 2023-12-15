Para levantar el proyecto con docker, es necesario tener levantados 2 contenedores, uno para la BBDD  de postgres y otro para la aplicación empaquetada de PHP

Pasos: 

1.- Crear la imagen para postgres 
Posicionarse sobre el directorio del Dockerfile de postgres y correr el comando "docker build -t img-postgres-db ."   

2.- Levantar la imagen creada previamente en un contenedor
docker run --name contenedor-postgres-db  -e POSTGRES_PASSWORD=ajxy2381 -d img-postgres-db

3.- Crear la imagen para PHP
Posicionarse sobre el directorio del Dockerfile de PHP y correr el comando "docker build -t img-php-app ."   

4.- Levantar la imagen de PHP creada anteriormente en un contenedor
docker run -d -p 3000:80 img-php-app




Practica PHP número 3 Desarrollo web
CRUD PHP haciendo uso de preparedStatements para evitar la inyección SQL
