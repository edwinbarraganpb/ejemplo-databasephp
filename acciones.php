<?php
include 'conexion.php';

$accion = $_GET['accion'] ?? '';

// Lógica para CREAR
if ($accion === 'crear' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    if (!empty($nombre) && !empty($email)) {
        $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email) VALUES (?, ?)");
        $stmt->execute([$nombre, $email]);
    }
}

// Lógica para ELIMINAR
if ($accion === 'eliminar' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->execute([$id]);
}



// Lógica para EDITAR (Actualizar)
if ($accion === 'editar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    if (!empty($id) && !empty($nombre) && !empty($email)) {
        $stmt = $pdo->prepare("UPDATE usuarios SET nombre = ?, email = ? WHERE id = ?");
        $stmt->execute([$nombre, $email, $id]);
    }
}

// Redirigir siempre de vuelta al inicio
header("Location: index.php");
exit;
