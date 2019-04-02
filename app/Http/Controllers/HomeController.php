<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $news = \App\News::all();
        return view('index', ['news' => $news]);
    }

    public function show($id)
    {
        $news = \App\News::find($id);
        if (empty($news))
            return \abort(404);
        return view('show', ['news' => $news]);
    }

    public function post()
    {
        return view('post');
    }

    public function create(Request $request)
    {
        $rules = [
            'title' => 'required|max:190',
            'description' => 'required|max:190',
            'content' => 'required'
        ];

        $valid = $request->validate($rules);

        if (!$valid) {
            return;
        }

        $news = new \App\News();
        $news->title = $request->get('title');
        $news->description = $request->get('description');
        $news->content = $request->get('content');
        $news->poster_image = "test.png";
        $news->category_id = null;
        $news->user_id = $request->user()->id;
        $news->save();

        return redirect()->route('home')->with(['status' => "Create a news item $news->title has successfully!"]);
    }

    public function edit($id)
    {
        $news = \App\News::find($id);
        return view('edit', ['news' => $news]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|max:190',
            'description' => 'required|max:190',
            'content' => 'required'
        ];

        $valid = $request->validate($rules);

        if (!$valid) {
            return;
        }

        $news = \App\News::find($id);
        $news->title = $request->get('title');
        $news->description = $request->get('description');
        $news->content = $request->get('content');
        $news->poster_image = "test.png";
        $news->category_id = null;
        $news->user_id = $request->user()->id;
        $news->save();

        return redirect()->route('home')->with(['status' => "Update a news item $news->title has successfully!"]);
    }

    public function delete($id)
    {
        $news = \App\News::find($id);
        $news->delete();

        return redirect()->route('home')->with(['status' => "Delete a news item $news->title has successfully!"]);
    }
}
