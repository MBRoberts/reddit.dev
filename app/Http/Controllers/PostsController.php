<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Log;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['posts'] = Post::paginate(6);
        return view('posts.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->session()->flash('ERROR_MESSAGE', 'Invalid Inputs');
        $this->validate($request, Post::$rules);
        $request->session()->forget('ERROR_MESSAGE');

        $post = new Post();
        $post->created_by = $request->user()->id;
        $post->title = $request->input('title');
        $post->url = $request->input('url');
        $post->content = $request->input('content');
        $post->save();
        Log::info('Created Post: ' . $post);

        $request->session()->flash('SUCCESS_MESSAGE', 'Post was saved successfully');

        return redirect()->action('PostsController@show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['post'] = Post::findOrFail($id);
        return view('posts.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['post'] = Post::findOrFail($id);
        return view('posts.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->session()->flash('ERROR_MESSAGE', 'Invalid Inputs');
        $this->validate($request, Post::$rules);
        $request->session()->forget('ERROR_MESSAGE');

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->url = $request->url;
        $post->content = $request->content;
        $post->save();
        Log::info('Updated Post: ' . $post);

        $request->session()->flash('SUCCESS_MESSAGE', 'Post was saved successfully');

        return redirect()->action('PostsController@show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->action('PostsController@index');
    }
}
