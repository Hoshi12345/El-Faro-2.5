<?php
namespace App\Controllers;
use App\Models\NoticiaModel;

class Noticias extends BaseController
{
    public function listar()
    {
        $modelo = new NoticiaModel();
        $data['noticias'] = $modelo->obtenerTodos();
        return view('noticias/lista', $data);
    }

    public function crear()
    {
        $modelo = new NoticiaModel();
        if ($this->request->getMethod() === 'post') {
            $modelo->insertar(
                $this->request->getPost('title'),
                $this->request->getPost('content'),
                $this->request->getPost('categoria'),
                $this->request->getPost('fuente'),
                $this->request->getPost('seccion')
            );
            return redirect()->to('/noticias/listar');
        }
        return view('noticias/formulario');
    }
}