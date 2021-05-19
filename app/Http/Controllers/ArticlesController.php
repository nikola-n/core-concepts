<?php

namespace App\Http\Controllers;

//TODO CSRF
//CSRF - Tricking the users into submitting a request that they did not intend.
// 419 failed csrf auth - laravel status code Token mismatch exception\

//Facade - static interface that proxies to the underline class or component.
use App\Tag;
use App\Article;

class ArticlesController extends Controller {

    public function index()
    {
        //Render a list of resour
        if(request('tag'))
        {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else
        {

            $articles = Article::latest()->get();
        }
        return view('articles.index', ['articles' => $articles]);
    }

    //Ja zema bilo koja vrednost posle articles/slug
    public function show($id)
    {
        //Show a single resource.
        $article = Article::where('id', $id)->first();
        return view('articles.show', ['article' => $article]);
    }

    //7 RESTful controller actions
    public function create()
    {
        //Shows a view to create a new resource.
        $tags = Tag::all();
        return view('articles.create', compact('tags'));
    }

    public function store()
    {
//       $validatedAttributes = request()->validate([
//            'title'=>'required|max:200',
//            'excerpt'=>'required',
//            'body'=>'required',
//        ]);
        //returns json so we can replace it
        // Article::create([$validatedAttributes]);
        //or you can inline it

        //Persist the new resource.
//     $article = new Article();
//     $article->title = request('title');
//     $article->excerpt = request('excerpt');
//     $article->body = request('body');
//     $article->save();
//        Article::create([
//            'title'=> request('title'),
//            'excerpt'=> request('excerpt'),
//            'body'=>request('body')
//        ]);
//        Article::create(request()->validate([
//            'title'=>'required|max:200',
//            'excerpt'=>'required',
//            'body'=>'required',
//        ]));
        //    Article::create($this->validateArticle());
//        Zatoa sto ja smenivme validacijata mora i tuka da smenime
        $this->validateArticle();
        $article = new Article(request(['title', 'excerpt', 'body']));
        $article->user_id = 1;
        $article->save();

        $article->tags()->attach(request('tags'));
        //Sega se hardcodira so auth se resava
        //auth()->user()->articles()->create($article);
        //auth()->id()

        return redirect(route('articles.index'));
    }

    public function edit(Article $article)
    {
        //Show a view to edit an existing resource.
        //$article = Article::find($id);
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article)
    {
        //Persist the edited resource
        $article->update($this->validateArticle());
//        $article->title = request('title');
//        $article->excerpt= request('excerpt');
//        $article->body = request('body');
//        $article->save();

        //  return redirect(route('articles.show', $article));
        return redirect($article->path());
    }
//
//    public function delete(
//    {
//        //Delete the resource
//    }

    /**
     * @return array
     */
    public function validateArticle() : array
    {
        return request()->validate([
            'title' => 'required|max:200',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id',
        ]);
    }
}
