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
$Dia_Jornada = $_POST['Dia_Jornada'];
$Horario_Jornada = $_POST['Horario_Jornada'];
$Lugar_Jornada = $_POST['Lugar_Jornada'];

// Verificar si se subió un archivo
if(isset($_FILES['Img_Jornada']) && $_FILES['Img_Jornada']['tmp_name'] != ''){
  $Img_Jornada = addslashes(file_get_contents($_FILES['Img_Jornada']['tmp_name']));
} else {
  $Img_Jornada = '';
}

// Crear la consulta SQL
$sql = "INSERT INTO jornadas (Dia_Jornada, Horario_Jornada, Lugar_Jornada, Img_Jornada)
VALUES ('$Dia_Jornada', '$Horario_Jornada', '$Lugar_Jornada', '$Img_Jornada')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();

?>