<?php

namespace App\Domain\Roles;

use App\Domain\_Classes\DefaultService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class RolesService
{
    public static $model = Roles::class;

    public static function find($id)
    {
        $model = self::$model;
        return $model::find($id);
    }

    public static function getAll()
    {
        $model = self::$model;
        return $model::orderBy('display_name')->get();
    }

    public static function getAllPluck()
    {
        $model = self::$model;
        return $model::orderBy('display_name')->pluck('display_name', 'id')->toArray();
    }

    public static function store(array $data)
    {
        DB::transaction(function() use ($data) {

            $request = new Collection($data);

            $model = self::$model;
            $role = $model::create($request->all());

            DefaultService::setBelongsToMany($request->all(), 'permissions', 'perms', $role);
        });
    }

    public static function update($id, array $data)
    {
        DB::transaction(function() use ($id, $data) {

            $request = new Collection($data);

            $role = self::find($id);

            $role->update($request->all());

            DefaultService::setBelongsToMany($request->all(), 'permissions', 'perms', $role);
        });
    }
}