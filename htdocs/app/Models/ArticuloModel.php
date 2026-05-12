<?php
namespace App\Models;

use CodeIgniter\Model;

class ArticuloModel extends Model
{
    protected $table = 'articulos';
    protected $primaryKey = 'id_articulo';
    protected $allowedFields = [
        'titulo', 'contenido', 'fecha_publicacion',
        'autor', 'imagen', 'id_categoria'
    ];

    // Devuelve todos los artículos con el nombre de la categoría
    public function getArticulosConCategoria(int $limit = 10)
    {
        return $this->select('articulos.*, categorias.nombre AS nombre_categoria')
                    ->join('categorias', 'categorias.id_categoria = articulos.id_categoria')
                    ->orderBy('articulos.fecha_publicacion', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }
}