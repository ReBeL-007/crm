<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\User\MassDestroyUserRequest;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {

        $data = [
            'name' =>$request->name,
            'email' => $request->email,
            'email_verified_at' => Carbon::now(),
            'password' => $request->password,
            ];


        $user = User::create($data);

        return redirect()->route('admin.users.index');

    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = [
            'name' =>$request->name,
            'email' => $request->email,
            'password' => $request->password?$request->password:$user->password,
            ];

        $user->update($data);

        return redirect()->route('admin.users.index');

    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back();

    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

}
