<?php

namespace App\Domain\Dashboard;

use App\Domain\Permissions\Permission;
use App\Domain\Roles\Roles;
use App\Domain\Users\User;
use App\Domain\_Classes\AdminController;

class DashboardController extends AdminController
{
    private $users;
    private $roles;
    private $permissions;

    public function __construct(User $users, Roles $roles, Permission $permissions)
    {
        parent::__construct();
        $this->users = $users;
        $this->roles = $roles;
        $this->permissions = $permissions;
    }

    public function index()
    {
        $countUsers = $this->users->all()->count();
        $countRoles = $this->roles->all()->count();
        $countPermissions = $this->permissions->all()->count();

        return $this->view('admin.dashboard.index', compact('countUsers', 'countRoles', 'countPermissions'));
    }
}
