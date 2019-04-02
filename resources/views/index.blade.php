@extends('layouts.app')
@section('title', 'All Posts')

@section('menu_add')
<a title="Create new Post" href="{{ route('news.post') }}" class="float-right"><i class="far fa-plus-square"></i></a>
@stop

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<ul class="list-group">
    @foreach($news as $item)
    <li class="list-group-item"> <a href="{{ route('news.show', ['id' => $item->id]) }}"> {{ $item->title }} </a>
        <div class="float-right">
            <a title="Edit" href="{{ route('news.edit', ['id' => $item->id]) }}"><i class="far fa-edit"></i></a> |
            <a title="Delete" href="{{ route('news.delete', ['id' => $item->id]) }}" style="color:red"><i class="far fa-trash-alt"></i></a>
        </div>
    </li>
    @endforeach
</ul>

@endsection
