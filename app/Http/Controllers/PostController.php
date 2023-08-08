<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Certifique-se de importar o modelo do Post corretamente


    class PostController extends Controller
{
    public function create(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'autor' => 'required|string|max:255',
            ]);

            $post = Post::create($validatedData);

            return response()->json($post, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao criar o post'], 500);
        }
    }




    public function read($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        return $post;
    }

    public function all()
    {
        $posts = Post::all();

        return $posts;
    }

    public function update(Request $request, $id)
    {
        try {
            $post = Post::find($id);

            if (!$post) {
                return response()->json(['message' => 'Post not found'], 404);
            }

            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'autor' => 'required|string|max:255',
            ]);

            $post->update($validatedData);

            return response()->json($post, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao atualizar o post'], 500);
        }
    }

    public function delete(Request $request, $id){
        $post = Post::find($id);
        if(!$post){
            return response()->json(['message' => 'Post not found'], 404);
        }
        $post->delete();
        return response()->json(['message' => 'Post deleted successfully'], 200);
    }
}
