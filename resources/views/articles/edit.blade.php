@extends('layout')
@section('content')
    <div id="wrapper">
        <div id="page" class="container-fluid">
            <h1>Update Article</h1>

            <form action="/articles/{{$article->id}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{$article->title}}">
                </div>
                <div class="form-group">
                    <label for="excerpt">Excerpt</label>
                    <textarea type="text" name="excerpt" id="excerpt" class="form-control" value="{{$article->excerpt}}"></textarea>
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea type="text" name="body" id="body" class="form-control" value="{{$article->body}}"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                </div>
            </form>
        </div>
    </div>

@endsection
