<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_peluditos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Recoger los datos del formulario
$Nom_Peludito = $_POST['Nom_Peludito'];
$Hist_Peludito = $_POST['Hist_Peludito'];
$Edad_Peludito = $_POST['Edad_Peludito'];
$UM_Peludito = $_POST['UM_Peludito'];
$Id_Categoria = $_POST['Id_Categoria'];

// Verificar si se subió un archivo
if(isset($_FILES['Img_Peludito']) && $_FILES['Img_Peludito']['tmp_name'] != ''){
  $Img_Peludito = addslashes(file_get_contents($_FILES['Img_Peludito']['tmp_name']));
} else {
  $Img_Peludito = '';
}

// Crear la consulta SQL
$sql = "INSERT INTO peluditos (Nom_Peludito, Hist_Peludito, Edad_Peludito, UM_Peludito, Id_Categoria, Img_Peludito)
VALUES ('$Nom_Peludito', '$Hist_Peludito', '$Edad_Peludito', '$UM_Peludito', '$Id_Categoria', '$Img_Peludito')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();

?>