<?php
// app/Models/NoticiaModel.php
namespace App\Models;

use Core\Database;

class NoticiaModel
{
    private $db;

    public function __construct()
    {
        // Obtiene la instancia única de la conexión PDO
        $this->db = Database::getInstance();
    }

    /**
     * Obtener todos los posts ordenados por fecha descendente.
     * @return array Arreglo asociativo con todas las filas.
     */
    public function obtenerTodos(): array
    {
        $sql = "SELECT id, title, content, created_at, categoria, fuente, seccion
                FROM post
                ORDER BY created_at DESC";
        return $this->db->query($sql);
    }

    /**
     * Obtener un post por su ID.
     * @param int $id
     * @return array|null Arreglo con los datos o null si no existe.
     */
    public function obtenerPorId(int $id): ?array
    {
        $sql = "SELECT id, title, content, created_at, categoria, fuente, seccion
                FROM post
                WHERE id = ?";
        $resultado = $this->db->query($sql, [$id]);
        return $resultado[0] ?? null;
    }

    /**
     * Insertar un nuevo post.
     * @param string $title
     * @param string $content
     * @param string $categoria
     * @param string $fuente
     * @param string $seccion
     * @return bool True si se insertó correctamente.
     */
    public function insertar(string $title, string $content, string $categoria, string $fuente, string $seccion): bool
    {
        $sql = "INSERT INTO post (title, content, created_at, categoria, fuente, seccion)
                VALUES (?, ?, NOW(), ?, ?, ?)";
        return $this->db->execute($sql, [$title, $content, $categoria, $fuente, $seccion]);
    }

    /**
     * Actualizar un post existente.
     * @param int $id
     * @param string $title
     * @param string $content
     * @param string $categoria
     * @param string $fuente
     * @param string $seccion
     * @return bool True si se actualizó al menos una fila.
     */
    public function actualizar(int $id, string $title, string $content, string $categoria, string $fuente, string $seccion): bool
    {
        $sql = "UPDATE post
                SET title = ?, content = ?, categoria = ?, fuente = ?, seccion = ?
                WHERE id = ?";
        return $this->db->execute($sql, [$title, $content, $categoria, $fuente, $seccion, $id]);
    }

    /**
     * Eliminar un post (baja lógica o física). Aquí usamos DELETE físico.
     * @param int $id
     * @return bool True si se eliminó correctamente.
     */
    public function eliminar(int $id): bool
    {
        // Verificar existencia (opcional, para devolver mensaje personalizado)
        $existe = $this->db->query("SELECT COUNT(*) as total FROM post WHERE id = ?", [$id])[0]['total'] > 0;
        if (!$existe) {
            return false;
        }

        $sql = "DELETE FROM post WHERE id = ?";
        return $this->db->execute($sql, [$id]);
    }
}