<?php
namespace App\Controllers;

use App\Models\PostModel;

class Articulo extends BaseController
{
    public function crear()
    {
        return view('layouts/main', ['content' => view('articulo/crear')]);
    }

    public function store()
    {
        $model = new PostModel();

        $rules = [
            'title'     => 'required|min_length[3]',
            'content'   => 'required|min_length[10]',
            'categoria' => 'required|max_length[20]',
            'seccion'   => 'required',
            'fuente'    => 'max_length[20]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/articulo/crear')
                             ->withInput()
                             ->with('errors', $this->validator->getErrors());
        }

        // Validar imagen (opcional)
    $file = $this->request->getFile('imagen');
    $imagenNombre = null;

    if ($file && $file->isValid() && !$file->hasMoved()) {
        // Validar extensión
        $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
        if (!in_array($file->getMimeType(), $allowedTypes)) {
            return redirect()->to('/articulo/crear')->withInput()->with('error', 'Formato no permitido. Use JPG, PNG o WEBP.');
        }
        // Validar tamaño (máximo 2 MB = 2 * 1024 * 1024 bytes)
        if ($file->getSize() > 2 * 1024 * 1024) {
            return redirect()->back()->withInput()->with('error', 'La imagen no puede superar los 2 MB.');
        }

        // Generar nombre único y mover
        $imagenNombre = $file->getRandomName();
        $uploadPath = FCPATH . 'uploads/articulos/';
        // Crear carpeta si no existe
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }
        $file->move($uploadPath, $imagenNombre);
    }


        $data = [
            'title'      => $this->request->getPost('title'),
            'content'    => $this->request->getPost('content'),
            'categoria'  => $this->request->getPost('categoria'),
            'fuente'     => $this->request->getPost('fuente'),
            'seccion'    => $this->request->getPost('seccion'),
            'imagen'     => $imagenNombre,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $model->insert($data);

        return redirect()->to('/')->with('mensaje', 'Artículo publicado con éxito.');
    }
    public function getArticulo($id)
{
    $model = new PostModel();
    $articulo = $model->find($id);
    if (!$articulo) {
        return $this->response->setJSON(['error' => 'Artículo no encontrado'])->setStatusCode(404);
    }
    return $this->response->setJSON($articulo);
}
}
