<?php
namespace App\Controllers;

use App\Models\UsuarioModel;

class Admin extends BaseController
{
    public function usuarios()
    {
        $modelo = new UsuarioModel();
        $data['usuarios'] = $modelo->findAll();

        return view('layouts/main', ['content' => view('admin/usuarios', $data)]);
    }
}