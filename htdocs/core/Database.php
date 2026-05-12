<?php
namespace Core;

use PDO;
use PDOException;

class Database
{
    private static $instance = null;
    private $pdo;

    // Datos de conexión (pueden venir de constantes o de variables de entorno)
    private $host;
    private $dbName;
    private $user;
    private $pass;
    private $charset = 'utf8mb4';

    // Constructor privado para Singleton
    private function __construct()
    {
        // Obtener configuración de las variables de entorno (archivo .env)
        $this->host     = getenv('database.default.hostname') ?: 'localhost';
        $this->dbName   = getenv('database.default.database') ?: 'elfaro_db';
        $this->user     = getenv('database.default.username') ?: 'root';
        $this->pass     = getenv('database.default.password') ?: '';

        $dsn = "mysql:host={$this->host};dbname={$this->dbName};charset={$this->charset}";

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    // Evitar clonación
    private function __clone() {}

    // Método estático para obtener la instancia única (Singleton)
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Retorna el objeto PDO nativo por si se necesita
    public function getConnection()
    {
        return $this->pdo;
    }

    // Ejecuta una consulta SELECT con parámetros opcionales y devuelve todas las filas
    public function query(string $sql, array $params = []): array
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    // Ejecuta una sentencia que no retorna resultados (INSERT, UPDATE, DELETE)
    public function execute(string $sql, array $params = []): bool
    {
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    // Llama a un procedimiento almacenado
    public function callProcedure(string $procedure, array $params = []): array
    {
        // Construir placeholders ?,?,?
        $placeholders = implode(',', array_fill(0, count($params), '?'));
        $stmt = $this->pdo->prepare("CALL $procedure($placeholders)");
        $stmt->execute($params);
        // Los procedimientos que hacen SELECT devolverán resultados
        // Si no, devolverá un array vacío
        return $stmt->fetchAll();
    }
}