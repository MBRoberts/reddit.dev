<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Vote;
use Symfony\Component\HttpFoundation\File\UploadedFile;
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
    public function index(Request $request)
    {
        $data['request'] = $request;
        $data['posts'] = (isset($request->search)) ? Post::search($request->search)->paginate(6) :  Post::with('user')->orderBy('created_at', 'desc')->paginate(6);

        $data['posts']->sortBy('created_at');

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
        
        if (!empty($request->file('image'))) {
            if ($request->file('image')->isValid()) {

                $post->image = '/img/post-images/' . $post->id . $request->file('image')->getClientOriginalName();

                $request->file('image')->move(
                    base_path() . '/public/img/post-images/', $post->image
                );  
            };
        };

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
    public function edit(Request $request, $id)
    {
        $data['post'] = Post::findOrFail($id);

        if(!$data['post']->ownedBy($request->user())) {
            $request->session()->flash('ERROR_MESSAGE', 'You do not have permission');
            return redirect()->action('PostsController@index');
        } 
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

        if(!$post->ownedBy($request->user())) {
            $request->session()->flash('ERROR_MESSAGE', 'You do not have permission');
            return redirect()->action('PostsController@index');
        } 

        $post->title = $request->get('title');
        $post->url = $request->get('url');
        $post->content = $request->get('content');
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
        $vote = Vote::where('post_id', '=', $id);

        $vote->delete();
        $post->delete();
        return back();
    }

    public function setVote(Request $request) {

        $vote = Vote::with('post')->firstOrCreate([
            'post_id' => $request->input('post_id'),
            'user_id' => $request->user()->id
        ]);

        $vote->vote = $request->input('vote');
        $vote->save();

        $post = $vote->post;

        $post->upVotes = $post->upVotes();
        $post->downVotes = $post->downVotes();

        $data = [
            'upVotes' => $post->upVotes,
            'downVotes' => $post->downVotes,
            'vote' => $vote->vote
        ];

        return back()->with($data);
    }


}
