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

        $tweet->save();

        return redirect('/');
    }

    /**
     * Edit the given resource
     * @param  integer $id
     * @return Response
     */
    public function edit($id)
    {
        $tweet = Tweet::findOrFail($id);

        return view('tweets.edit', compact('tweet'));
    }

    /**
     * Update the given resource to storage
     * @param  Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['content' => 'required|string|max:140']);

        $tweet = Tweet::findOrFail($id);

        $tweet->content = $request->content;

        $tweet->save();

        return redirect('/');
    }
}
