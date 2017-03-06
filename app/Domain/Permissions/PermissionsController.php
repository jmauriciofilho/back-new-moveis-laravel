<?php

namespace App\Domain\Permissions;

use App\Domain\_Classes\AdminController;

class PermissionsController extends AdminController
{
    public function index()
    {
        $permissions = PermissionsService::getAll();

        return $this->view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        $permission = new Permission();

        return $this->view('admin.permissions.create', compact('permission'));
    }

    public function edit($id)
    {
        $permission = PermissionsService::find($id);

        return $this->view('admin.permissions.edit', compact('permission'));
    }

    public function store(PermissionsRequest $request)
    {
        try
        {
            PermissionsService::store($request->all());

            return redirect('/admin/permissions');
        }
        catch (\Exception $e)
        {
            return redirect()->back();
        }
    }

    public function update($id, PermissionsRequest $request)
    {
        try
        {
            PermissionsService::update($id, $request->all());

            return redirect('/admin/permissions');
        }
        catch (\Exception $e)
        {
            return redirect()->back();
        }
    }
}
