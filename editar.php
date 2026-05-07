<?php 
include 'conexion.php'; 

// Obtener datos del usuario actual
$id = $_GET['id'] ?? null;
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->execute([$id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    die("Usuario no encontrado.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <style>
        body { font-family: sans-serif; max-width: 400px; margin: 40px auto; padding: 20px; }
        form { background: #f4f4f4; padding: 20px; border-radius: 8px; }
        input { display: block; width: 100%; padding: 10px; margin: 10px 0; box-sizing: border-box; }
        button { background: #28a745; color: white; border: none; padding: 10px 20px; cursor: pointer; border-radius: 4px; width: 100%; }
        .back { display: block; margin-top: 10px; text-align: center; color: #666; text-decoration: none; }
    </style>
</head>
<body>

    <h2>Editar Usuario</h2>
    <form action="acciones.php?accion=editar" method="POST">
        <!-- Campo oculto para enviar el ID -->
        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
        
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>" required>
        
        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>
        
        <button type="submit">Actualizar Datos</button>
        <a href="index.php" class="back">Cancelar</a>
    </form>

</body>
</html>
