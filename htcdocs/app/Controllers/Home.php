<?php    namespace App\Controllers;
use App\Models\PostModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new PostModel();

        // Obtener los 3 artículos más recientes (destacados)
        $data['destacados'] = $model->orderBy('created_at', 'DESC')->limit(3)->findAll();

        // Obtener artículos por sección
        $data['inicio'] = $model->where('seccion', 'inicio')->orderBy('created_at', 'DESC')->findAll();
        $data['deportes'] = $model->where('seccion', 'deportes')->orderBy('created_at', 'DESC')->findAll();
        $data['negocios'] = $model->where('seccion', 'negocios')->orderBy('created_at', 'DESC')->findAll();

        return view('home', $data);
    }
}