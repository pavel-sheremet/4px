<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('user.index', [
            'users' => User::orderBy('id', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', User::class);

        return view('user.edit', [
            'user' => new User()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return Response
     * @throws AuthorizationException
     */
    public function store(UserRequest $request)
    {
        $this->authorize('create', User::class);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password)
        ]);

        return redirect()->route('user.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     * @throws AuthorizationException
     */
    public function edit(User $user)
    {
        $this->authorize('create', User::class);

        return view('user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return Response
     * @throws AuthorizationException
     */
    public function update(UserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? \Hash::make($request->password) : $user->password
        ]);


        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     * @throws AuthorizationException
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        return redirect()->route('section.index');
    }
}
