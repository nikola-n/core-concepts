@extends('layout')
@section('content')
    <div id="wrapper">
        <div id="page" class="container-fluid">
            <h1>New Article</h1>

            <form action="/articles" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-danger @enderror"value="{{old('title')}}">
                    @error('title')
                    <p class="bg-danger">{{$errors->first('title')}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="excerpt">Excerpt</label>
                    <textarea type="text" name="excerpt" id="excerpt" class="form-control"></textarea>
                    @if($errors->has('excerpt'))
                    <p class="help is-danger">{{$errors->first('excerpt')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea type="text" name="body" id="body" class="form-control @error('body') is-danger @enderror"></textarea>
                    @error('body')
                    <p class="help is-danger">{{$errors->first('body')}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tag">Tags</label>
                    <select name="tags[]" multiple id="">
{{--       Krerira array oti moze da se odberat povekje tagovi za eden artikl--}}
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                    </select>
                    @error('tags')
                    <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                </div>

            </form>
        </div>
    </div>

@endsection
