<?php session_start();
$_SESSION['redirect_to'] = $_SERVER['REQUEST_URI']; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
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
    <h1 class="TitBlog">Blog de cuidados para los peluditos</h1>
    <br>
    <table class="Table1">
        <td colspan="1" style="background-color: #D7EAEA; height: 500px;">
            <iframe src="htmlBlogs/Perros.html" name="frame1" style="border: none; height: 500px; width: 500px; scroll-snap-type: none;"></iframe>
            <button class="ButtonBlog"><a href="htmlBlogs/Perros.html" target="_parent" class="ButtonVer">Ver blog</a></button>
        </td>
        <td colspan="1" style="height: 500px; width: 50px;"></td>
        <td colspan="1" style="background-color: #D7EAEA; height: 500px;">
            <iframe src="htmlBlogs/Gatos.html" name="frame2" style="border: none; height: 500px; width: 500px; scroll-snap-type: none;"></iframe>
            <button class="ButtonBlog"><a href="htmlBlogs/Gatos.html" target="_parent" class="ButtonVer">Ver blog</a></button>
        </td>
    </table>
    <br><br>
    <!-- <table class="Table1">
        <td colspan="1" style="background-color: #D7EAEA; height: 500px;">
            <iframe src="htmlBlogs/Conejos.html" name="frame3" style="border: none; height: 500px; width: 500px; scroll-snap-type: none;"></iframe>
            <button class="BotBlog"><a href="htmlBlogs/Conejos.html" target="_parent" class="ButtonVer">Ver blog</a></button>
        </td>
        <td colspan="1" style="height: 500px; width: 50px;"></td>
        <td colspan="1" style="background-color: #D7EAEA; height: 500px;">
            <iframe src="htmlBlogs/Cobayos.html" name="frame4" style="border: none; height: 500px; width: 500px; scroll-snap-type: none;"></iframe>
            <button class="BotBlog"><a href="htmlBlogs/Cobayos.html" target="_parent" class="ButtonVer">Ver blog</a></button>
        </td>
    </table>
    <br><br>
    <table class="Table1">
        <td colspan="1" style="background-color: #D7EAEA; height: 500px;">
            <iframe src="htmlBlogs/Hamsters.html" name="frame5" style="border: none; height: 500px; width: 500px; scroll-snap-type: none;"></iframe>
            <button class="BotBlog"><a href="htmlBlogs/Hamsters.html" target="_parent" class="ButtonVer">Ver blog</a></button>
        </td>
        <td colspan="1" style="height: 500px; width: 50px;"></td>
        <td colspan="1" style="background-color: #D7EAEA; height: 500px;">
            <iframe src="htmlBlogs/Peces.html" name="frame6" style="border: none; height: 500px; width: 500px; scroll-snap-type: none;"></iframe>
            <button class="BotBlog"><a href="htmlBlogs/Peces.html" target="_parent" class="ButtonVer">Ver blog</a></button>
        </td>
    </table>
    <br><br>
    <table class="Table1">
        <td colspan="1" style="background-color: #D7EAEA; height: 500px;">
            <iframe src="htmlBlogs/Pajaros.html" name="frame7" style="border: none; height: 500px; width: 500px; scroll-snap-type: none;"></iframe>
            <button class="BotBlog"><a href="htmlBlogs/Pajaros.html" target="_parent" class="ButtonVer">Ver blog</a></button>
        </td>
    </table> -->
    <br><br><br>
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
                    <p class="TextTab"><a href="" class="NoLink" target="_blank">3196582488</a><br><a href="https://api.whatsapp.com/send/?phone=573153724188&text=Hola%2C+quiero+mas+informacion+acerca+de+los+peluditos&type=phone_number&app_absent=0" class="NoLink" target="_blank">3153724188</a></p>
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