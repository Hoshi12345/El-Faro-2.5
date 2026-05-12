<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Contacto extends BaseController
{
    public function index()
    {
        return view('templates/header')
             . view('contacto')
             . view('templates/footer');
    }

    public function enviar()
    {
        $modelo = new UsuarioModel();

        $rules = [
            'nombre'  => 'required|min_length[3]',
            'email'   => 'required|valid_email',
            'mensaje' => 'required|min_length[10]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->to('/contacto')
                             ->withInput()
                             ->with('errors', $this->validator->getErrors());
        }

        $modelo->save([
            'nombre'         => $this->request->getPost('nombre'),
            'email'          => $this->request->getPost('email'),
            'telefono'       => $this->request->getPost('telefono'),
            'mensaje'        => $this->request->getPost('mensaje'),
            'fecha_registro' => date('Y-m-d'),
        ]);

        return redirect()->to('/contacto')
                         ->with('mensaje', '¡Mensaje enviado con éxito!');
    }
}