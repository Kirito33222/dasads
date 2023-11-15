<?php
include("con_db.php");

$error = '';
$resultado = null;
$fila = null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["txtdni"])) {
    $dni = mysqli_real_escape_string($conex, $_POST["txtdni"]);
    
    // Preparar la consulta SQL para buscar por DNI
    $sql_leer = "SELECT * FROM contactos WHERE dni = '$dni'";
    
    // Ejecutar la consulta
    $resultado = mysqli_query($conex, $sql_leer);

    // Obtener los resultados
    $fila = mysqli_fetch_assoc($resultado);

    if (!$fila) {
        $error = "No se encontraron datos para el DNI proporcionado.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Obligatorio para que trabaje diseño web responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

 
    <!-- Enlazar el archivo con la hoja de estilos -->
    <link rel="stylesheet" href="css/estilos-tra.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- Enlazar con la libreria de iconos fontawesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="imagenes/favicon32x32.png" type="image/x-icon">
</head>
<body>

    <!-- Cabecera del sitio -->
    <header id="cabecera">
        <!-- Contenedor  -->
        <div class="contenedor" >
            <div class="barra-top">
                <div class="logo">
                    <img src="imagenes/BARRISTAR.JPG" class="ajustar_img">
                </div><!-- Fin de logo-->

                <!-- Barra de menu principal  -->
                <nav id="menu">
                <!-- Contenedor -->
                    <div class="contenedor">
                        <ul class="menu_barra">
                            <li><a href="index.php">Inicio</a></a></li>
                            <li><a href="index.php#servicios">Servicios</a></li>
                            <li><a href="index.php#equipo">Abogados</a></li>
                            <li><a href="index.php#casos">Casos</a></li>
                            <li><a href="index.php#contactanos">Contáctanos</a></li>
                            <li><a href="#tramites">Tramites</a></li>
                        </ul>
                    </div><!-- Fin de contenedor -->
                 </nav><!-- Fin de barra de menu principal  -->
            </div><!-- Fin de Barra top -->
        </div> <!-- Fin de contenedor  -->
    </header><!-- Fin de la cabecera del sitio -->

    <!-- Consulta tu tramite con tu dni -->
    <section id="nosotros" class="espacio">

        <!-- Contenedor  -->
        <div class="contenedor">
            <!-- Fila -->
            <div class="fila">
            
                 <!-- Columna izquierda -->
                <div class="columna">
                    <img src="imagenes/consulta.jpg" >
                </div><!-- Fin de columna izquierda -->
            
                <!-- Columna derecha -->
                <div class="columna">
                <form id="formulario_tramite" action="" method="post">
                        <h3><b>CONSULTA EL AVANCE DE TU TRAMITE</b></h3>

                        <div class="entrada">
                            <input class="campo" type="tel" 
                            placeholder="Número de DNI" 
                            id="txtdni" name="txtdni">
                        </div>

                    <p>
                        <input class="boton_consultar" type="submit" value="Consultar">
                    </p>
                    
                    <p id="msjerror" class="error">
                    </p>
                    </form>
                </div><!-- Fin de columna derecha -->
            </div><!-- Fin de fila -->
        </div> <!-- Fin de contenedor  -->
    </section><!-- fin de sobre nosotros -->

    <section id="servicios" class="espacio">
        <!-- Contenedor  -->        
        <div class="contenedor"> 
            <h2><b> Informacion de tu tramite </b></h2>

            <div class="columna">
                <form id="formulario_tramite" action="" method="post">
                <div class = "campo">
                    <h4> Ingrese su dni para ver su estado de tramite</h4>
                    
                    <?php if ($fila): ?>
                    <p><b>Nombre: <?php echo htmlspecialchars($fila['nombre']); ?></b></p>
                    <p><b>Apellido: <?php echo htmlspecialchars($fila['apellido']); ?></b></p>
                    <p><b>Correo: <?php echo htmlspecialchars($fila['correo']); ?></b></p>
                    <p><b>Telefono: <?php echo htmlspecialchars($fila['telefono']); ?></b></p>
                    <p><b>Descripcion: <?php echo htmlspecialchars($fila['descripcion']); ?></b></p>
                    <p><b>Estado del tramite: <?php echo htmlspecialchars($fila['Estadotramite']); ?></b></p>
                    <?php elseif (!empty($error)): ?>
                    <p>Ingrese su dni para ver su tramite</p>
                    <?php endif; ?>
                </div>

                </form>
            </div><!-- Fin de fila -->
        </div><!-- Fin de contenedor  -->
    </section><!-- Fin de nuestro servicio -->

    <!-- Pie de página -->
    <footer id="pie" class="pie">
        <!-- Contenedor -->
        <div class="contenedor">
            <!-- Fila Grupo 1  -->
            <div class="grupo-1">
                <!-- Columna izquierda -->
                <div>
                    <img src="imagenes/buffet.JPG" alt="">
                    <h2>BARRISTAR</h2>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Animi, at?</p>
                </div><!-- Fin de columna izquierda -->
                <!-- Primera columna del medio -->
                <div>
                    <h2>Enlace rápido</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, provident. Tempora perspiciatis odit optio repellendus placeat animi omnis ullam vitae.</p>
                </div><!-- Fin de primera columna del medio -->
                <!-- Segunda columna del medio -->
                <div>
                    <h2>Área rapida</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, saepe.</p>
                </div><!-- Fin de segunda columna del medio -->
                <!-- Columna derecha -->
                <div>
                    <h2>Contáctenos</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, sint!</p>
                </div><!-- Fin de columna derecha -->
            </div><!-- Fin de fila Grupo 1  -->
            <!-- Fila Grupo 2  -->
            <div  class="grupo-2">
                <!-- Fila -->
                <div class="fila">
                    <!-- Copyright -->
                    <div class="copyright">
                        &copy; Política de privaciadad<b>Slee Dw</b> 2022 - Barristar | Buffet de abagados.Reservados todos los derechos.
                    </div><!-- Fin de copyright -->
                    <!-- Redes Sociles -->
                    <div class="redes-sociales">
                        <a href="https://www.facebook.com/Abogados-Per%C3%BA-100104478015304" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                        <a href="https://twitter.com/search?q=%23abogado" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                        <a href="https://www.instagram.com/gbmt.abogados/?hl=es" target="_blank"><i class="fa-brands fa-square-instagram"></i></a>
                    </div><!-- Fin de redes Sociles -->
                </div><!-- Fin de fila -->
            </div><!-- Fin de fila Grupo 2  -->
        </div><!-- Fin de contenedor -->
    </footer><!-- Fin de pie de página -->
    
</body>
</html>
<script src="scripts/validar-formulario-tra.js"></script>
