<?php
class Conexion
{
    public static function obtener(): PDO
    {
        $config = require __DIR__ . '/../config/config.php';
        $db = $config['db'];

        $dsn = "mysql:host={$db['host']};dbname={$db['nombre']};charset={$db['charset']}";

        return new PDO($dsn, $db['usuario'], $db['clave'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }
}