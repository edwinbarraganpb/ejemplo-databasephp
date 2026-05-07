<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD PHP & SQLite</title>
    <style>
        body { font-family: sans-serif; max-width: 600px; margin: 40px auto; padding: 20px; line-height: 1.6; }
        form { background: #f4f4f4; padding: 20px; border-radius: 8px; margin-bottom: 20px; }
        input { display: block; width: 100%; padding: 10px; margin: 10px 0; box-sizing: border-box; }
        button { background: #007bff; color: white; border: none; padding: 10px 20px; cursor: pointer; border-radius: 4px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        .btn-delete { color: #dc3545; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

    <h2>Registrar Usuario</h2>
    <form action="acciones.php?accion=crear" method="POST">
        <input type="text" name="nombre" placeholder="Nombre completo" required>
        <input type="email" name="email" placeholder="Correo electrónico" required>
        <button type="submit">Guardar</button>
    </form>

    <h2>Lista de Usuarios</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
        <?php
        $stmt = $pdo->query("SELECT * FROM usuarios ORDER BY id DESC");
        while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?= htmlspecialchars($user['nombre']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td>
            <a href="editar.php?id=<?= $user['id'] ?>" style="color: #007bff; text-decoration: none; margin-right: 10px;">Editar</a>
                <a href="acciones.php?accion=eliminar&id=<?= $user['id'] ?>" class="btn-delete" onclick="return confirm('¿Eliminar?')">Borrar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>
