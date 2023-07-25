<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post; //Informar para o laravel onde está o post

class PostController extends Controller
{
    public function create(Request $request){
        $new_post = [
            'title' => 'Qualquer coisa',
            'content' => 'Conteúdo qualquer',
            'autor' => 'Leonardo'
        ];

        $posts = new Post(@$new_post);
        $posts->save();

        dd($posts);
    }
}
