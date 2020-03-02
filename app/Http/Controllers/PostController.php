<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function forceDelete($post)
    {
        Post::onlyTrashed()->where(['id' => $post])->forceDelete();

        return redirect()->route('posts.trashed');
    }

    public function restore($post)
    {
        $post = Post::onlyTrashed()->where(['id' => $post])->first();

        if($post->trashed()) {
            $post->restore();
        }
        return redirect()->route('posts.trashed');
    }

    public function trashed()
    {
        //Retorna somente os arquivos que estão marcados como exclusos no banco de dados
        $posts = Post::onlyTrashed()->get();

        return view ('posts.trashed', ['posts' => $posts]);
    }

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
        //$posts = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->orderBy('title',  'desc')->get();
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

        //Retorna todos os registris, inclusive os registro marcados com deletados no banco de dados
//        $post = Post::withTrashed()->get();

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
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Object - Propriedade - Save
        $post = new Post;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->description = $request->description;
        $post->save();

        //Mass Assigment. ou preenchimento em massa
//        Post::create([
//            'title' => $request->title,
//            'subtitle' => $request->subtitle,
//            'description' => $request->description
//        ]);

        /*firstOrNew: Funciona como um where, ele no primeiro nó de array verifica se existe por exemplo o title
        que está vindo dentro do request, caso não exista ele inseri caso exista ele não faz nada....*/
//        $post = Post::firstOrNew([
//            'title' => 'teste2',
//            'subtitle' => 'teste3',
//        ], [
//            'description' => 'teste2'
//        ]);
//        $post->save();

        /*firstOrCreate: Ele insere o registro caso não encontre por padrão, diferente do firstOrNew que precisa do
        método save, para persistir os dados no banco de dados..., porém caso não exista ele não iria ser criado*/
//        $post = Post::firstOrCreate([
//            'title' => 'teste4',
//            'subtitle' => 'teste4',
//        ], [
//            'description' => 'teste4'
//        ]);

        return redirect()->route('posts.index');
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
        return view('posts.edit', ['post' => $post]);
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
        /*Fazendo a omissão da nova instancia de obj post, ira funcionar da mesma forma por o obj já foi passado,
        e essa é a forma mais usada no dia a dia para a atualização de registros, pois é praticamente a mesma coisa
        que no cadastro de registros*/
//        $post = new Post;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->description = $request->description;
        $post->save();

        //Outra forma de fazer a atualização do registro é alimentando novamente a varivel post com o id pelo find
//        $post = Post::find($post->id);
//        $post->title = $request->title;
//        $post->subtitle = $request->subtitle;
//        $post->description = $request->description;
//        $post->save();

        /*O updateOrCreate ele atualiza caso encontre o registro e caso não encontre o mesmo, ele o cria,
        o primeira passagem de parametros dentro do conchetes, é como se fosse o WHERE ele está verificando o registro
        e caso o encontre ele só atualiza com os parametros que são passados e caso não encontre ele o cria*/
//        $post = Post::updateOrCreate([
//            'title' => 'teste5'
//        ], [
//            'subtitle' => 'teste5',
//            'description' => 'teste5'
//        ]);

        /*Atalização em massa, de varios registro passando o parametro WHERE, e atualizando somente o campo
        description por exemplo, o mesmo deve ser feito com muita responsabilidade pois caso seje passado algum
        parametro dentro do where de forma equivocada o mesmo ira atualizar  registros que não deveriam,
        o exemplo abaixo está atualizando registro que são com datas maiores a data de hoje*/
//        Post::where('created_at', '>=', date('Y-m-d H:i:s'))->update(['description' => 'teste da descrição']);

        return redirect()->route('posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //Deleção passando o find o ID do usuário ao qual quero que seje deletado
//        Post::find($post->id)->delete();

        //Deleção em massa de mais de um registro, passando dentro de um array quais são os registros
//        Post::destroy([10, 11]);

        //Esclusão passando o ID do usuário diretamento dentro do método destroy
        //Versão mais usada no dia a dia claro, fazendo um tratamento avisando ao usuário que o registro será deletado
        Post::destroy($post->id);

        //Outra forma de exclusão em massa passando parametro WHERE para determinar qual a ação,
        //nesse caso excluindo registro com a data maior que a do dia atual
//        Post::where('created_at', '>=', date('Y-m-d H:i:s'))->delete();

        return redirect()->route('posts.index');
    }
}
