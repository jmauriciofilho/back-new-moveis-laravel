<?php

namespace App\Domain\Roles;

use App\Domain\_Classes\AdminController;
use App\Domain\Permissions\PermissionsService;

class RolesController extends AdminController
{
    public function index()
    {
        $roles = RolesService::getAll();

        return $this->view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $role = new Roles();

        $permissions = RolesService::getAllPluck();

        return $this->view('admin.roles.create', compact('role', 'permissions'));
    }

    public function edit($id)
    {
        $role = RolesService::find($id);

        $permissions = PermissionsService::getAllPluck();

        return $this->view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function store(RolesRequest $request)
    {
        try
        {
            RolesService::store($request->all());

            return redirect('/admin/roles');
        }
        catch(\Exception $e)
        {
            return redirect()->back();
        }
    }

    public function update($id, RolesRequest $request)
    {
        try
        {
            RolesService::update($id, $request->all());

            return redirect('/admin/roles');
        }
        catch(\Exception $e)
        {
            return redirect()->back();
        }
    }
}
