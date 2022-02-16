@extends('layouts.app')

@section('title')
 | {{$post->title}}
@endsection

@section('content')
<div class="container">

  @if (session('success'))
  <div class="alert alert-success" role="alert">
    {{session('success')}}
  </div>
  @endif

  <h1 class="py-3">{{$post->title}}</h1>
  <h4>
    Categoria - <strong>{{$post->category->name}}</strong>
  </h4>
  <h4>
    @forelse ($post->tags as $tag)
      <span class="badge rounded-pill bg-success text-light">{{$tag->name}}</span>
    @empty
      n/a
    @endforelse
  </h4>

  @if ($post->cover)
    <div class="image">
      {{-- concateno ad asset/ il nome del file presente nel db (colonna cover) --}}
      <img width="350" src="{{asset('storage/' . $post->cover)}}" alt="{{$post->cover_original_name}}">
      <p>{{$post->cover_original_name}}</p>
    </div>
  @endif

  <p>
    {{$post->content}}
  </p>

  <a href="{{route('admin.posts.index')}}" class="btn btn-warning">Torna alla lista</a>
  <a href="{{route('admin.posts.edit', $post)}}" class="btn btn-primary">Modifica</a>
</div>
@endsection