<?php
// Iniciar la sesión
session_start();
$_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_tienda";
// Conexión a la base de datos
$db = new mysqli($servername, $username, $password, $dbname);

if ($db->connect_error) {
    die("Error de conexión: " . $db->connect_error);
}

// Si se envió una opinión
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['nombre_completo']) && $_SESSION['nombre_completo'] != "") {
    $message = $_POST['message'];
    $username = $_SESSION['nombre_completo'];
    $id_cliente = $_SESSION['id_cliente']; 

    $sql = "INSERT INTO tbl_coment (Id_Cliente, Username, Message ,  Fecha) VALUES (?, ?, ?, NOW())";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("iss", $id_cliente, $username, $message);
    $stmt->execute();

    // Redirigir a la misma página para evitar el reenvío del formulario
    header("Location: Opiniones.php");
    exit;
}

// Consulta para obtener las opiniones
$sql = "SELECT Id_Cliente, Username, Message, Fecha FROM tbl_coment ORDER BY Fecha DESC";
$result = $db->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donaciones</title>
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
    <br>

    <h1 class="TitBlog">Donaciones</h1><br>

    <section>
        <div class="TableDisp1">
            <table>
                <tr>
                    <td><p class="TitAni">Nequi</p><br>
                    <div><img src="Fotos/nequi.png" alt="Logo Nequi" style="width: 90px; height: 120px"></div></td>
                    <td>
                    <div class="DispFlex1">
                        <li class="TextCat">Número:</li>
                            <p class="texto4">3196582488</p>
                    </div>
                </tr>
            </table>
            <br>
            <table>
                <tr>
                    <td><p class="TitAni">Bancolombia</p><br>
                    <div><img src="Fotos/bancolombia.png" alt="Logo Bancolombia" style="width: 130px; height: 120px"></div></td>
                    <td>
                    <div class="DispFlex1">
                        <li class="TextCat">Cuenta de ahorros:</li>
                            <p class="texto4">Titular: Peluditos con futuro</p>
                        <li class="TextCat">Número:</li>
                            <p class="texto4">178.484331-61</p>
                        <li class="TextCat">Nit:</li>
                            <p class="texto4">900.888.014</p>
                    </div>
                </tr>
            </table>
            <br>
        </div>    
        </div><br><br><br>
        <div class="TableDisp1">
            <table>
            <tr>
                <td><p class="TitAni">Daviplata</p><br>
                <div><img src="Fotos/daviplata.png" alt="Logo Daviplata" style="width: 100px; height: 90px"></div></td>
                <td>
                <div class="DispFlex1">
                    <li class="TextCat">Número:</li>
                        <p class="texto4">3196582488</p>
                </div>
            </tr>
            </table>
            <br>
            <table>
            <tr>
                <td><p class="TitAni">Paypal</p><br>
                <div><img src="Fotos/Paypal_2014_logo.png" alt="Logo Paypal" style="width: 100px; height: 100px"></div></td>
                <td>
                <div class="DispFlex1">
                    <li class="TextCat">Datos:</li>
                        <p class="texto4">peluditoscolombia@gmail.com</p>
                </div>
            </tr>
            </table>
        </div>
        <br><br><br>
        <div class="TableDisp1">
            <div class="DispFlex1">
                <p class="TitAni">Comida:</p><br>
                <p class="texto4">Como te imaginaras, nuestros peluditos consumen una gran cantidad de alimento todos los días, por ello apreciamos mucho cualquier tipo y cantidad de comida que nos quieras aportar.</p>
            </div>    
            
            <div class="DispFlex1">
                <p class="TitAni">Accesorios y utensilios:</p><br>
                <p class="texto4">Si cuentas con cobijas, juguetes o cualquier implemento para perros o gatos que no estés usando, será muy bien recibido y apreciado por nuestros peluditos.</p>
            </div>
            <div class="DispFlex1">
                <p class="TitAni">Difunde:</p><br>
                <p class="texto4">Siempre puedes ayudarnos a llegar a mas personas compartiendo nuestra pagina web y nuestras redes sociales.</p>
            </div>
        </div><br>
        <div class="TableDisp1">
            <div class="DispFlex1">
                <p class="TitAni">Sé voluntario:</p><br>
                <p class="texto4">Tu tiempo y esfuerzo también son de gran ayuda, asi que si deseas ayudarnos en alguna de nuestras jornadas puedes comunicarte a los números de teléfono que aparecen en la pagina. Recuerda que también proveemos certificación para el servicio social de los estudiantes.</p>
            </div>
        </div>
    </section>
    
    <br>
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