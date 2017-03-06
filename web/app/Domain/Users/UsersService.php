<?php

namespace App\Domain\Users;

use App\Domain\_Classes\DefaultService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class UsersService
{
    public static $model = User::class;
    public static $pathEmails = 'admin.users.emails.';

//    public static function __callStatic() { }

    public static function find($id)
    {
        $model = self::$model;
        return $model::find($id);
    }

    public static function getAll()
    {
        $model = self::$model;
        return $model::orderBy('name')->get();
    }

    public static function getAllPluck()
    {
        $model = self::$model;
        return $model::orderBy('name')->pluck('name', 'id')->toArray();
    }

    public static function store(array $data)
    {
        DB::transaction(function() use ($data) {

            $request = new Collection($data);

            $password = str_random(16);
            $request->merge(['password' => bcrypt($password)]);

            $model = self::$model;
            $user = $model::create($request->all());

            DefaultService::setBelongsToMany($request->all(), 'roles', 'roles', $user);

            self::sendEmail('store', 'Conta Criada', $user->email, compact('user', 'password'));

        });
    }

    public static function update($id, array $data)
    {
        DB::transaction(function() use ($id, $data) {

            $request = new Collection($data);

            $user = self::find($id);

            DefaultService::setBelongsToMany($request->all(), 'roles', 'roles', $user);

            $user->update($request->all());
        });
    }
}