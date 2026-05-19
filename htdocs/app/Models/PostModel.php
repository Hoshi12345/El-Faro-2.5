<?php namespace App\Models;
use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table      = 'posts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'content', 'categoria', 'fuente', 'seccion','imagen'];
    protected $useTimestamps = false;  // Usaremos el TIMESTAMP de MySQL
}