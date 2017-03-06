<?php

namespace App\Domain\Permissions;

class PermissionsService
{
    public static $model = Permission::class;

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

    public static function store($data)
    {
        return self::create($data);
    }

    public static function update($id, array $data)
    {
        $obj = self::find($id);
        return $obj->update($data);
    }
}