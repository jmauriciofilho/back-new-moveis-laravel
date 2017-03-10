<?php

namespace App\Domain\Users;

use App\Domain\_Classes\DefaultService;
use App\Domain\Roles\Roles;
use App\Domain\Roles\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsersService
{
    public static $model = User::class;
    public static $pathEmails = 'admin.users.emails.';
    private $user;

//    public static function __callStatic() { }

    function __construct(User $user)
    {
        $this->user = $user;
    }

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

    public function loginApp(Request $request)
    {
        $has = Auth::attempt(['email' => $request->get('email'),
            'password' => $request->get('password')]);

        if ($has) {
            $model = self::$model;
            $user = $model::all()->where('email', '=', $request->get('email'))->first();
            $json = new Collection();

            $json->put('user', $user->toArray());
            $json->put('role', $user->roles->toArray());

            return json_encode($json->toArray());
        }

        return "Usuário não encontrado!";

    }

    public function storeUser(Request $request)
    {
        DB::transaction(function() use ($request)
        {
            $role = $request->get('role_id');
            $request->merge(['password' => bcrypt($request->get("password"))]);
            $user = $this->user->create($request->all());
            $user->roles()->attach($role);

        });

        return "Usuário criado com sucesso.";
    }

    public function updateUser(Request $request)
    {
        $user = $this->user->where('id', $request->get('id'))->update($request->all());

        if ($user){
            return "Atualizado com sucesso.";
        }else{
            return "Erro na atualização.";
        }
    }

    public function changePassword(Request $request)
    {
        $user = $this->user->where('id', $request->get('id'))->first();
        $request->merge(['password' => bcrypt($request->get("password"))]);
        $user->password = $request->get('password');
        if ($user->save()){
            return "Senha alterada com sucesso.";
        }else{
            return "Erro na alteração da senha.";
        }

    }

    public function deleteUser(Request $request)
    {
        $detete = $this->user->where('id', $request->get('id'))->delete();
        if ($detete){
            return "Cliente apagado com sucesso.";
        }else{
            return "Erros ao apagar cliente.";
        }
    }

    public function toSeekUser(Request $request)
    {
        $user = $this->user->where('id', $request->get('id'))->first();
        $json = new Collection();
        $json->put('client', $user->toArray());
        return json_encode($json->toArray());
    }

    public function allUser()
    {
        $users = User::all();

        return json_encode($users);
    }
}