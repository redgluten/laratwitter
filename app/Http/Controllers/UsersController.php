<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display an index of the resource
     * @return Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     * Display the create form
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store the newly created resource in DB
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        return redirect('users/' . $user->id);
    }

    /**
     * Display user profile.
     * @param  User   $user
     * @return Response
     */
    public function show(User $user)
    {
        $tweets = $user->tweets()->orderBy('created_at', 'desc')->get();

        return view('users.show', compact('user', 'tweets'));
    }

    /**
     * Edit the given resource
     * @param  integer $id
     * @return Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @param  User    $user
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'picture' => 'max:255|url',
            'presentation' => 'string|max:3000',
        ]);

        $user->picture = $request->picture;

        $user->presentation = $request->presentation;

        $user->save();

        return redirect('users/' . $user->id);
    }
}
