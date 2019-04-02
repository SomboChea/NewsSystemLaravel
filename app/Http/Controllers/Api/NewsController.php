<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index()
    {
        $news = \App\News::all();

        return $news;
    }

    public function show($id)
    {
        $news = \App\News::find($id);

        if(empty($news))
            return \abort(404);

        return $news;
    }

    // public function create(Request $request)
    // {

    //     $rules = [
    //         'title' => 'required|max:190'
    //     ];

    //     $news = new \App\News();
    //     $news->title = $request->get('title');
    //     $news->description = $request->get('description');
    //     $news->content = $request->get('content');
    //     $news->poster_image = "test.png";
    //     $news->category_id = null;
    //     $news->user_id = $request->user()->id;
    //     $news->save();

    //     return \response(['status' => 'success'], 200);

    // }

    // public function update(Request $request, $id)
    // {
    //     $news = \App\News::find($id);

    //     $news->title = $request->get('title');
    //     $news->description = $request->get('description');
    //     $news->content = $request->get('content');
    //     $news->poster_image = "test.png";
    //     $news->category_id = null;
    //     $news->user_id = $request->user()->id;
    //     $news->save();

    //     return \response(['status' => 'success'], 200);
    // }

    // public function delete($id)
    // {
    //     $news = \App\News::find($id);

    //     $news->delete();
    // }
}
