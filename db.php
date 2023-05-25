<?php

session_start();

$conn = mysqli_connect( //Se utiliza la libreria mysqli y luego el metodo connect
    'localhost', //Donde esta el servidor de la base de de datos
    'root', //Usuario
    '', //Contrasena, por defecto no tiene
    'php_mysql_crud' //Base de datos a la que se conectara
); 

/*if (isset($conn)) { //Verifica que la variable $conn este definida y no sea nula
    echo 'DB is connected';
}*/
?>