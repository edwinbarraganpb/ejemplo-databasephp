<?php
// Nombre del archivo de la base de datos
$db_file = __DIR__ . "/database.sqlite";

try {
    // Conexión a SQLite
    $pdo = new PDO("sqlite:" . $db_file);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Crear la tabla si no existe
    $sql = "CREATE TABLE IF NOT EXISTS usuarios (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nombre TEXT NOT NULL,
                email TEXT NOT NULL
            )";
    $pdo->exec($sql);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
