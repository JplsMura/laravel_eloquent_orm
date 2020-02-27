<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //take = LIMIT
        /*Retornando uma coleção de registro com GET, passando a clausula WHERE para trazer somente os registro
            que a data de criação do campo created_at, seje maior que a data de hoje, listando o mesmo por orderBy
            trazendo os registro em order descrecente passando como parametro o title e trazendo um coleção de registros
            com o GET()
        */
//        $posts = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->orderBy('title',  'desc')->get();
//        foreach ($posts as $post){
//            echo "<h1>{$post->title}</h1>";
//            echo "<h2>{$post->subtitle}</h2>";
//            echo "<p>{$post->description}</p>";
//            echo "<hr>";
//        }

        /*Retorna somente um único registro independentemente que existam 100 registros*/
//        $post = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->first();
//            echo "<h1>{$post->title}</h1>";
//            echo "<h2>{$post->subtitle}</h2>";
//            echo "<p>{$post->description}</p>";
//            echo "<hr>";

        /*Lança um erro para a aplicação caso o mesmo não encontre um registro, mandando o usuario a uma
        página 404, pouco usado pois o mesmo deve ser tratado dentro da aplicação e a experiencia do usuario
        não ser destruida e o mesmo continuar a navegação de forma tranquila*/
//        $post = Post::where('created_at', '>=', date('2022-m-d H:i:s'))->firstOrFail();
//        echo "<h1>{$post->title}</h1>";
//        echo "<h2>{$post->subtitle}</h2>";
//        echo "<p>{$post->description}</p>";
//        echo "<hr>";

        /*O find sempre leva em consideração a chave primaria do registro, e busca o registro com
        base na chave primaria do método*/
//        $post = Post::find(1);
//            echo "<h1>{$post->title}</h1>";
//            echo "<h2>{$post->subtitle}</h2>";
//            echo "<p>{$post->description}</p>";
//            echo "<hr>";


        /*Busca o registro através da chave primaria porém caso não encontre o mesmo o usuario é redirecionado
        a página 404 da aplicação o mesmo método usado em firstOrFail*/
//        $post = Post::findOrFail(1001);
//        echo "<h1>{$post->title}</h1>";
//        echo "<h2>{$post->subtitle}</h2>";
//        echo "<p>{$post->description}</p>";
//        echo "<hr>";

        /*Exists, verifica a existe de registro assim e retorna true or false
           como o EMPTY porém isso direto na query, o EXISTS só funciona dentro de uma coleção de registros*/
//        $posts = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->orderBy('title', 'desc')->exists();
//        foreach ($posts as $post){
//            echo "<h1>{post->title}</h1>";
//            echo "<h2>{post->subtitle}</h2>";
//            echo "<p>{post->description}</p>";
//            echo "<hr>";
//        }

        /*Agregadores
        max - min - avg(media artimetrica) - sum - count :: O avg e o sam só funcionam com num inteiros,
        esses métodos agregadores não precisam do GET no final da query pois todos só iram retornar um único
        registro

        count - conta a quantidade de registros,.

        max - mostra o max em determinado campo estipulado e o min o minimo

        */
//        $posts = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->count();
//        $posts = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->max('title');
//        $posts = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->min('title');

        /*Seleciona todos os registro de POSTS*/
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
