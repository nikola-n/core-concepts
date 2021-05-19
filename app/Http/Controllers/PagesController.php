<?php

namespace App\Http\Controllers;

use App\Example;
//use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;

class PagesController extends Controller
{
    public function home()//Filesystem $file)//Example $example)
    {
       // return request('name');
        //return Request::input('name');
        //ddd($example);
       // return View::make('welcome');
       // return $file->get(public_path('index.php'));
        Cache::remember('foo',60, fn() =>'foobar');
      return Cache::get('foo');

    }
}
