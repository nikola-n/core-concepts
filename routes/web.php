<?php


// TODO Laravel service container
//app()->bind('example', function () {
//    $foo = config('services.foo');
//    return new \App\Example($foo);
//});
//app()->bind('App\Example', function () {
//    $collaborator = new \App\Collaborator();
//    $foo = 'foobar';
//    return new \App\Example($collaborator,$foo);
//});
// Even if you didnt bind it if you resolve() / app() / app()->make() the route of the class
// it will resolve the class object anyway!

//Route::get('/',function (App\Example $example)
//{
// $example = resolve(App\Example::class);

//ddd($example);
// Ovaa logika ke odi vo service provider ne vo routes in RL

//    TODO Custom service Container
///    $container = new \App\Container;
//    $container->bind('example', function () {
//       return new \App\Example();
//    });
//   $example = $container->resolve('example');
//   $example->go();
//   ddd($example);
//});


Route::get('/', 'PagesController@home');

//Route::get('/', function () {
//    return view('test', [
//            'name' => request('name')
//    ]);
//});
Route::get('contact', function () {
    return view('contact');
});
//Vaka ja zimame vrednosta sto ke ja napiseme kako slug so funkcijata
//Route::get('/posts/{post}', function($post) {
//    $posts =
//    [
//        'my-first-post'=>'Hello, this is my first blog post!',
//        'my-second-post'=>'Now I am getting the hang of this blogging thing.'
//    ];
//
//    if(! array_key_exists($post, $posts))
//    {
//        abort(404, 'Sorry that post was not found.');
//    }
//    return view('post', [
//        'post'=>$posts[$post]
//    ]);
//});
Route::get('/posts/{post}', 'PostsController@show');

Route::get('/about', function () {
    return view('about', [
        'articles' => App\Article::take(3)->latest()->get(),
    ]);
});
//GET, POST, PUT, DELETE
Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::post('/articles', 'ArticlesController@store');
Route::get('/articles/create', 'ArticlesController@create'); //ORDER matters
Route::get('/articles/{articles}', 'ArticlesController@show')->name('articles.show');
Route::get('/articles/{articles}/edit', 'ArticlesController@edit');
Route::put('/articles/{article}', 'ArticlesController@update');


Route::get('facade', function (){
    \App\Support\Facades\Filter::get('fuck', 'yeah');
});
