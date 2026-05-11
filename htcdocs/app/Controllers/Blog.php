<?php

namespace App\Controllers;

use App\Models\PostModel;

class Blog extends BaseController
{
    public function index()
    {
        $model = new PostModel();
        $perPage = 5; // artículos por página

        $data['articulos'] = $model->orderBy('created_at', 'DESC')
                                   ->paginate($perPage);
        $data['pager'] = $model->pager;

        return view('templates/header')
             . view('blog', $data)
             . view('templates/footer');
    }
}