<?php
    // Si se ejecutó el botón ENVIAR (post)
    if($_SERVER["REQUEST_METHOD"]=="POST") {

        // Conectarse con la base de datos
        include("con_db.php");

        // Si la conexión tuvo éxito
        if($conex==true)
        {
            // echo 'Conexión exitosa a base de datos';

            // Leer los datos de los campos del formulario
            $nombre = $_POST["txtnombres"];
            $apellido = $_POST["txtapellidos"];
            $correo =  $_POST["txtcorreo"];
            $dni =  $_POST["txtdni"];
            $celular =  $_POST["txtcelular"];
            $derecho =  $_POST["lstcarrera"];
            $descripcion =  $_POST["txtdescripcion"];
          

            // Gerarando la consulta SQL para insertar el contacto
            $consulta =
            "INSERT INTO contactos(nombre,apellido,correo,dni,telefono,derecho,descripcion) 
                VALUES ('$nombre','$apellido','$correo','$dni','$celular','$derecho','$descripcion')";
                    
            // Ejecutar la consulta de INSERCIÓN
            $resultado = mysqli_query($conex,$consulta);

            // Si ejecutó la consulta de INSERCIÓN CON EXITO...
            if($resultado==true) {
                ?>
                <p class="inscripcion_ok">
                    ¡Registro exitoso! En breve nos comunicaremos contigo
                </p>
                <?php
            } else {
                ?>
                <p class="error">
                    ¡Ha ocurrido un error al grabar el registro!
                </p>
                <?php
            }
        } else {
            // Si la conexión tuvo algún problema ...
            echo 'Ha ocurrido un error de conexión a su base de datos';
        }
    }
?>