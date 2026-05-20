<?php

namespace App\Controllers;

use App\Models\PostModel;

class Blog extends BaseController
{
    public function index()
    {
        $model = new PostModel();
        $perPage = 5;

        $data['articulos'] = $model->orderBy('created_at', 'DESC')
                                   ->paginate($perPage);
        $data['pager'] = $model->pager;

        // ✅ Una sola línea, sin concatenaciones
        return view('layouts/main', ['content' => view('blog', $data)]);
    }
}