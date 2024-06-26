<?php
session_start();
session_destroy();
header("Location: " . (isset($_SESSION['redirect_to']) ? $_SESSION['redirect_to'] : 'Principal.php'));
exit;
?>