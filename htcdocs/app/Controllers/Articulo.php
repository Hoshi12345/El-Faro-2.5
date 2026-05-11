<?php
namespace App\Controllers;

use App\Models\PostModel;

class Articulo extends BaseController
{
    // Muestra el formulario de creación
    public function crear()
    {
        return view('templates/header')
             . view('articulo/crear')
             . view('templates/footer');
    }

    // Procesa el formulario y guarda en la base de datos
    public function store()
    {
        $model = new PostModel();

        $rules = [
            'title'     => 'required|min_length[3]',
            'content'   => 'required|min_length[10]',
            'categoria' => 'required',
            'seccion'   => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/articulo/crear')
                             ->withInput()
                             ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title'      => $this->request->getPost('title'),
            'content'    => $this->request->getPost('content'),
            'categoria'  => $this->request->getPost('categoria'),
            'fuente'     => $this->request->getPost('fuente'),
            'seccion'    => $this->request->getPost('seccion'),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $model->insert($data);

        return redirect()->to('/')->with('mensaje', 'Artículo publicado con éxito.');
    }
}