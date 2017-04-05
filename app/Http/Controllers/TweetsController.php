<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Tweet;
use Illuminate\Http\Request;

class TweetsController extends Controller
{
    /**
     * Display an index of the resource
     * @return Response
     */
    public function index()
    {
        $tweets = Tweet::orderBy('created_at', 'desc')->paginate(10);

        return view('tweets.index', compact('tweets'));
    }

    /**
     * Display the create form
     * @return Response
     */
    public function create()
    {
        return view('tweets/create');
    }

    public function show(Tweet $tweet)
    {
        return view('tweets.show', compact('tweet'));
    }

    /**
     * Store the newly created resource in DB
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['content' => 'required|string|max:140']);

        $tweet = new Tweet;

        $tweet->content = $request->content;

        $tweet->user_id = auth()->user()->id;

        $tweet->save();

        return redirect('/');
    }

    /**
     * Edit the given resource
     * @param  integer $id
     * @return Response
     */
    public function edit(Tweet $tweet)
    {
        return view('tweets.edit', compact('tweet'));
    }

    /**
     * Update the given resource to storage
     * @param  Request $request
     * @param  int  $tweet
     * @return Response
     */
    public function update(Request $request, Tweet $tweet)
    {
        $this->validate($request, ['content' => 'required|string|max:140']);

        $tweet->content = $request->content;

        $tweet->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tweet $tweet)
    {
        Tweet::destroy($tweet->id);

        return redirect('/tweets');
    }
}
