@extends('layouts.app')
@section('title', 'News: '. $news->title)

@section('menu_add')
<a title="Back to home" href="{{ route('home') }}" class="float-right"><i class="fa fa-arrow-left"></i></a>
@stop

@section('content')

    <h2><b>Title:</b> {{ $news->title }}</h2>
    <hr>
    <h3><b>Description</b></h3>
    <h4>{{ $news->description }}</h4>
    <br />
    <h3><b>Content</b></h3>
    <p>
        {!! $news->content !!}
    </p>
@stop
