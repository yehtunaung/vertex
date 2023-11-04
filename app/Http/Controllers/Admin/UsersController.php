<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\RoleService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\MassDestroyUserRequest;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (Auth::user()->is_admin) {
            $users = User::with(['roles'])->paginate(10);
        } else {
            $users = User::with(['roles'])->whereRelation('roles', 'id', '<>', 1)->paginate(10);
        }

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (Auth::user()->is_admin) {
            $roles = Role::with('permissions')->get();
        } else {
            $roles = Role::with('permissions')->where('id', '<>', 1)->get();
        }

        return view('admin.users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $roles = RoleService::getRoleIds($request);
        $user = User::create($request->all());
        $user->roles()->sync($roles);
        // $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (Auth::user()->is_admin) {
            $roles = Role::get();
        } else {
            $roles = Role::where('id', '<>', 1)->get();
        }

        $user->load('roles');

        return view('admin.users.edit', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $roles = RoleService::getRoleIds($request);
        $user->roles()->sync($roles);
        // $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
