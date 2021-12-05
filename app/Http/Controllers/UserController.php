<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        abort_if(Gate::denies("user_access"), 403);

        $users = User::all();

        $data = [
            "users" => $users
        ];

        return view("users.index", $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        abort_if(Gate::denies("user_access"), 403);

        $roles = Role::all()->pluck('name');

        $data = [
            "roles" => $roles
        ];

        return view("users.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        abort_if(Gate::denies("user_access"), 403);

        $user = User::create($request->validated());

        switch ($request['role']) {
            case "Super Admin":
                $user->admin()->create([

                ]);
                break;

            case "Admin":
            case "Doctor":
                $user->doctor()->create([]);
                break;
        }

        $user->assignRole($request['role']);

        return redirect()->route("users.index");

    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user): View
    {
        abort_if(Gate::denies("user_access"), 403);

        $roles = Role::all()->pluck('name');

        $data = [
            "user" => $user,
            "roles" => $roles
        ];

        return view("users.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        abort_if(Gate::denies("user_update"), 403);

        $user->updateOrFail($request->validated());

      /*  switch ($request['role']) {

            case "Admin":
            case "Doctor":
                $user->doctor()->create([]);
                break;
        }*/

        $user->removeRole($user->getRoleNames()[0]);

        $user->assignRole($request['role']);


        return redirect()->route("users.show", $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
