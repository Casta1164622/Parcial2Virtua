<?php
$host = getenv('DB_HOST') ?: 'db';
$port = getenv('DB_PORT') ?: '3306';
$db   = getenv('DB_DATABASE') ?: 'parcialdb';
$user = getenv('DB_USERNAME') ?: 'parcialuser';
$pass = getenv('DB_PASSWORD') ?: 'parcialpass123';

$conn = @new mysqli($host, $user, $pass, $db, (int)$port);
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Ejemplo Docker</title>
	</head>
	<body>
		<h1>Ejemplo funcionando</h1>
		<p>Contenedor web (Nginx) → contenedor app (Apache/PHP) → contenedor db (MySQL)</p>

		<?php if ($conn && !$conn->connect_error): ?>
			<p style="color:green;">Conexión a MySQL exitosa.</p>
		<?php else: ?>
			<p style="color:red;">Error al conectar a MySQL.</p>
			<pre><?php echo htmlspecialchars($conn ? $conn->connect_error : 'No se pudo inicializar mysqli'); ?></pre>
		<?php endif; ?>
	</body>
</html>
