<?php session_start();
$_SESSION['redirect_to'] = $_SERVER['REQUEST_URI']; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peluditos con futuro</title>
    <link rel="stylesheet" href="Decoracion.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
<nav class="navbar navbar-expand-lg FondoNavBar">
    <a class="navbar-brand" href="#">
        <img src="Fotos/Logo.jpg" alt="Logo del sitio web" style="width: 90px; height: 100px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link ItemNavBar" href="Principal.php">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link ItemNavBar" href="Peluditos.php">Peluditos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link ItemNavBar" href="Blogs.php">Blogs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link ItemNavBar" href="Donaciones.php">Donaciones</a>
        </li>
        <li class="nav-item">
            <a class="nav-link ItemNavBar" href="Historia.html">Historia</a>
        </li>
        <li class="nav-item">
            <a class="nav-link ItemNavBar" href="Adopciones.html">Adopciones</a>
        </li>
        <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-sm-4">
                <form action="Productos.php" method="get">
                    <input type="text" name="Busqueda" id="Busqueda">
                    <input type="submit" value="Buscar" class="BotBus">
                </form>
            </div>
            <div class="col-sm-2">
                <button class="myButton" onclick="window.location.href='Registro.html'">Registrarse</button>
            </div>
            <div class="col-sm-2">
                <button class="myButton" onclick="event.stopPropagation(); document.getElementById('loginForm').style.display='block'">Iniciar sesión</button>
            </div>
            <div class="col-sm-2">
                <button class="myButton" onclick="window.location.href='logout.php'">Cerrar sesión</button>
            </div>
            <div class="col-sm-2">
                <?php
                if (isset($_SESSION['nombre_completo']) && $_SESSION['nombre_completo'] != "") {
                    echo '<a class="nav-link" href="carrito.php">
                            <i class="fas fa-shopping-bag fa-3x bag-icon"></i>
                            </a>';
                }
                ?>
            </div><br><br>
            <div class="col-sm-12">
                <?php
                if (isset($_SESSION['nombre_completo']) && $_SESSION['nombre_completo'] != "") {
                    echo '<h4 class="titulo-usuario">Bienvenido, ' . $_SESSION['nombre_completo'] . '</h4>';
                }else{
                    echo '<h5 class="titulo-usuario">Bienvenido, Invitado</h5>';
                }
                ?>
            </div>
        </div> -->
    </div>
        </ul>
    </div>  
    </nav>    
    <br><br>
    <header>
        <table class="Table1">
            <tr class="tr1">
                <th>
                    <img src="Fotos/Logo.jpg" alt="Logo del sitio web" style="width: 250px; margin-left: 150px;">
                </th>
                <th>
                    <h1 class="TituloPrinc">Peluditos con futuro</h1><br>
                    <p class="Texto1">Cumplimos con labores de rescate y dedicamos el máximo a los animales abandonados. Nuestra labor es totalmente voluntaria y sin ánimo de lucro.</p>
                </th>
            </tr>
        </table>
    </header>
    <br><br><br>
    <section>
        <h2 class="TitCat">Jornadas de adopción</h2><br><br>
        <div class="TableDisp">
            <p class="TitAni">Sábados</p>
            <div class="DispFlex">
                <li class="TextCat">(Imagen)</li>
                <li class="TextCat">Lugar:</li>
                    <p>Texto</p>
                <li class="TextCat">Horario:</li>
                    <p>Texto</p>
            </div>
            <div class="DispFlex">
                <li class="TextCat">(Imagen)</li>
                <li class="TextCat">Lugar:</li>
                    <p>Texto</p>
                <li class="TextCat">Horario:</li>
                    <p>Texto</p>
            </div>
        </div><br>
        <div class="TableDisp">
            <p class="TitAni">Domingos</p>
                <div class="DispFlex">
                    <li class="TextCat">(Imagen)</li>
                    <li class="TextCat">Lugar:</li>
                        <p>Texto</p>
                    <li class="TextCat">Horario:</li>
                        <p>Texto</p>
                </div>
                <div class="DispFlex">
                    <li class="TextCat">(Imagen)</li>
                    <li class="TextCat">Lugar:</li>
                        <p>Texto</p>
                    <li class="TextCat">Horario:</li>
                        <p>Texto</p>
                </div>
        </div>
    </section>
    <br><br><br>
    <h2 class="Titlecarrusel">Nuestros Peluditos</h2><br>
    <!-- <img class='d-block mx-auto' src="Fotos/Foto1.jpg" alt='Slide {$i}' style='max-width: 250px; height: auto;'> -->
        <!-- Inicio del carrusel -->
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "db_peluditos";
                
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Consulta para obtener las imágenes de los productos
            $consulta_imagenes = "SELECT Img_Peludito FROM peluditos";
            $resultado_imagenes = $conn->query($consulta_imagenes);
        ?>
            <!-- Inicio del carrusel -->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                        $i = 0;
                        foreach ($resultado_imagenes as $row) {
                            $active = $i == 0 ? 'active' : '';
                            echo "<li data-target='#carouselExampleIndicators' data-slide-to='{$i}' class='{$active}'></li>";
                            $i++;
                        }
                    ?>
                </ol>
                <div class="carousel-inner">
                    <?php
                        $i = 0;
                        foreach ($resultado_imagenes as $row) {
                            $active = $i == 0 ? 'active' : '';
                            $imagenBase64 = base64_encode($row['Img_Peludito']);
                            echo "
                            <div class='carousel-item {$active}'>
                                <img class='d-block mx-auto' src='data:image/jpeg;base64,{$imagenBase64}' alt='Slide {$i}' style='max-width: 250px; height: auto;'>
                            </div>";
                            $i++;
                        }
                    ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <br><br>
    
            <hr color="black" width="900px">
        <div class="Separa">
            <div class="TableDisp1">
                <div class="DispFlex1">
                    <h2 class="TitTab">Mision</h2>
                        <p class="TextTab">Promover por medio de nuestra labor los derechos de los animales desprotegidos, como lo son el derecho a la vida, salud, no ser torturados ni utilizados como objeto de producción y/o mercancía, hacer entender a los seres humanos que los animales también tienen un corazón que siente.</p>
                </div>
                <div class="DispFlex1">
                    <h2 class="TitTab">Visión</h2>
                        <p class="TextTab">Representar la voz de aquellos que no tienen voz, paralograr que se lleve una verdadera convivencia y respeto entre humanos y animales, y así para el año 2027 seremos la fundación líder en concientización de la cultura animal en Bogotá.</p>
                </div>
                <div class="DispFlex1">
                    <h2 class="TitTab">Números</h2>
                        <p class="TextTab"><a href="https://api.whatsapp.com/send/?phone=573153724188&text=Hola%2C+quiero+mas+informacion+acerca+de+los+peluditos&type=phone_number&app_absent=0" class="NoLink" target="_blank">3153724188</a><br><a href="" class="NoLink" target="_blank"></a>3196582488</p>
                    <br><br>
                    <h2 class="TitTab">Redes sociales</h2>
                        <p class="TextTab"><a href="https://www.facebook.com/people/Peluditos-con-Futuro/100064779190301/?locale=es_LA"  class="NoLink" target="_blank">Facebook</a><br><a href="https://www.instagram.com/peluditos_colombia/?hl=es" class="NoLink" target="_blank">Instagram</a></p>
                </div>
            </div>
            <br>
        <div class="CopyR">&copy; Peluditos con futuro 2024</div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="Back.js"></script>
</html>