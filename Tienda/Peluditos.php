<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_peluditos";
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    $consulta = "SELECT * FROM categorias";
    $resultado = $conn->query($consulta);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peluditos</title>
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
        </ul>
    </div>  
</nav>

<!-- <nav class="navbar navbar-expand-lg FondoNavBar2">
    <div class=" navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link ItemNavBar2" href="Principal.php">Cachorros</a>
        </li>
        <li class="nav-item">
            <a class="nav-link ItemNavBar2" href="Peluditos.php">Adultos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link ItemNavBar2" href="Blogs.php">Sabios</a>
        </li>
        </ul>

    </div>  
</nav>  -->

    <nav class="FondoNavBar2">
        <?php
            if ($resultado->num_rows > 0) {
                while($row = $resultado->fetch_assoc()) {
                    echo '<a href="Peluditos.php?categoria='.$row['Id_Categoria'].'" class="ItemNavBar2">'.$row['Nom_Categoria'].'</a>';
                }
            }
            //echo "Debug: " . $resultado->num_rows;
        ?>
    </nav>

    <br><br><br>
        <?php
            $categoria = isset($_GET['categoria']) ? intval($_GET['categoria']) : null;

            $sql = "SELECT Nom_Peludito, Edad_Peludito, Hist_Peludito, Img_Peludito, UM_Peludito FROM peluditos WHERE 1=1";
            
            
            if ($categoria !== null) {
                $sql .= " AND Id_Categoria = $categoria";
            }
            
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // Recorrer cada fila de resultados
            while($row = $result->fetch_assoc()) {
                // Convertir la imagen a base64 para poder mostrarla en el HTML
                $imagenBase64 = base64_encode($row['Img_Peludito']);
                $Hist_Peludito = wordwrap($row['Hist_Peludito'], 2000, "<br />\n");
                $Edad_Peludito = number_format($row['Edad_Peludito']);
        
                echo '<table class="Table1">
                    <tr>
                        <td colspan="2" rowspan="2" style="padding-left: 13px; padding-right: 5px; border: 2px solid #DA1212; width: 250px;">
                        <img class="Foto" src="data:Img_Peludito/jpeg;base64,'.$imagenBase64.'" alt="Foto del peludito" />
                        </td>
        
                        <td colspan="2" style="height: 100px; padding-left: 10px; padding-right: 10px; border: 2px solid #DA1212; width: 800px;" class="texto1">
                        '.$row['Nom_Peludito'].'
                        </td>
                    </tr>
        
                    <tr>
                        <td colspan="2" class="texto2" style="height: 70px; padding-left: 10px; padding-right: 10px; border: 2px solid #DA1212; width: 800px;">'.$Edad_Peludito.' '.$row['UM_Peludito'].'</td>
                    </tr>
        
                    <tr>
                        <td colspan="3" style="padding-left: 5px; padding-right: 5px; border: 2px solid #DA1212; height: 200px; width: 800px;"><p class="texto3">
                            '.$Hist_Peludito.'</p>'; '<br>
                            // <p class="texto3">Nombre: '.$row['Nom_Peludito'].'</p>
                            // <br>
                            // <p class="texto3">Edad: '.$row['Edad_Peludito'].' '.$row['UM_Peludito'].'</p>
                            // <br>
                            // <img src="data:Img_Peludito/jpeg;base64,'.$imagenBase64.'" alt="Foto del peludito" />
                            // <br><br>';
                            echo '</td>
                        </tr>
                    </table>

                <br><br>';
                    }
            } else {
                echo "No hay peluditos que presentar";
            }
        ?>
        </div>
    </div>

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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="Back.js"></script>
</body>
</html>