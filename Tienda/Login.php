<?php 
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_tienda";

try {
  // Crear conexión
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Verificar conexión
  if ($conn->connect_error) {
    throw new Exception("Connection failed: " . $conn->connect_error);
  }

  // Recoger los datos del formulario
  $Mail = $_POST['Mail'];
  $Password = $_POST['Password'];

  // Crear la consulta SQL
  $sql = "SELECT * FROM tbl_cliente WHERE Mail = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $Mail);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  // Verificar la contraseña
  if ($user && password_verify($Password, $user['Password'])) {
    // Inicio de sesión exitoso
    // Iniciar una nueva sesión y guardar el correo electrónico del usuario
    $_SESSION['user'] = $Mail;

    // Obtener el nombre y apellido del usuario
    $id_cliente = $user['Id_Cliente'];
    $Nombre_Completo = $user['Nombre'] . ' ' . $user['Apellido'];
    $_SESSION['nombre_completo'] = $Nombre_Completo;
    $_SESSION['id_cliente'] = $id_cliente;

    // Redirigir al usuario a la página de inicio
    header("Location: " . (isset($_SESSION['redirect_to']) ? $_SESSION['redirect_to'] : 'Principal.php'));
    exit;
    }else{
      // Inicio de sesión fallido
      $_SESSION['login_error'] = "Correo electrónico o contraseña incorrectos";
      header("Location: " . (isset($_SESSION['redirect_to']) ? $_SESSION['redirect_to'] : 'Principal.php'));
    }

     // Cerrar la conexión
    $conn->close();
  }catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
  }

?>
