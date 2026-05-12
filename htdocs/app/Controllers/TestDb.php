<?php namespace App\Controllers;

class TestDb extends BaseController
{
    public function index()
    {
        try {
            $db = \Config\Database::connect();
            $db->initialize(); // Forza la conexión real
            echo "✅ Conexión exitosa a la base de datos.";
        } catch (\Throwable $e) {
            echo "❌ Error de conexión: " . $e->getMessage();
        }
    }
}