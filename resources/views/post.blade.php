@extends('layouts.app')
@section('title', 'New Post')

@section('menu_add')
<a title="Back to home" href="{{ route('home') }}" class="float-right"><i class="fa fa-arrow-left"></i></a>
@stop

@section('content')

    <form action="{{ route('news.create') }}" method="POST">
        @csrf()

        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title" id="title" placeholder="News Title" required>
                @if ($errors->first('title'))
                <div class="alert alert-danger">
                    <span>{{ $errors->first('title') }}</span>
                </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="description" id="description" placeholder="News Description" required>
                @if ($errors->first('description'))
                <div class="alert alert-danger">
                    <span>{{ $errors->first('description') }}</span>
                </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="content" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                <textarea name="content" id="content" placeholder="News Content" cols="30" rows="10"></textarea>
                @if ($errors->first('content'))
                <div class="alert alert-danger">
                    <span>{{ $errors->first('content') }}</span>
                </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Post</button>
          </div>
        </div>

    </form>

@stop

@section('js')
<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
@stop

@section('css')
<style>
    .tox-notifications-container {
        display: none;
    }
</style>
@stop
