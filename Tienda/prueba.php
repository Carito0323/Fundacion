<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_tienda";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tbl_cliente";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Recorrer cada fila de resultados
    while($row = $result->fetch_assoc()) {
        $Nombre = $row['Nombre'];
        $apellido = $row['Apellido'];
        // ... obtener los demás campos ...

        // Convertir la imagen a base64
        $Foto = base64_encode($row['Foto']);

        // Imprimir los datos
        echo "<br>";
        echo "Nombre: $Nombre<br>";
        echo "Apellido: $apellido<br>";
        // ... imprimir los demás campos ...

        // Imprimir la imagen
        echo "<img class='img' src='data:image/jpeg;base64,$Foto'>";
    }
} else {
    echo "No se encontraron registros";
}

// Cerrar la conexión
$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .img {
      width: 100px;
      height: 100px;
      object-fit: cover;
    }
</style>
</head>
<body>
  
</body>
</html>