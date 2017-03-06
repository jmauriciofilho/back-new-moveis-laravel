<?php

namespace App\Domain\Users;

use App\Domain\_Classes\AdminController;
use App\Domain\Roles\RolesService;

class UsersController extends AdminController
{
    public function index()
    {
        $users = UsersService::getAll();

        return $this->view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $user = new User();

        $roles = RolesService::getAllPluck();

        return $this->view('admin.users.create', compact('user', 'roles'));
    }

    public function edit($id)
    {
        $user = UsersService::find($id);

        $roles = RolesService::getAllPluck();

        return $this->view('admin.users.edit', compact('user', 'roles'));
    }

    public function store(UsersRequest $request)
    {
        try
        {
            UsersService::store($request->all());

            return redirect('/admin/users');
        }
        catch (\Exception $e)
        {
            return redirect()->back();
        }
    }

    public function update($id, UsersRequest $request)
    {
        try
        {
            UsersService::update($id, $request->all());

            return redirect('/admin/users');
        }
        catch (\Exception $e)
        {
            return redirect()->back();
        }
    }
}
