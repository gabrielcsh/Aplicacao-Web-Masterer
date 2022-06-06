<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    /**
     * @var User
     */
    private $usuario;

    private $projetoRepository;

    private $funcaoRepository;

    public function __construct(User $usuario)
    {
        $this->usuario           = $usuario;
    }

    public static function create(array $dados)
    {
        $usuarioExistente = User::where('email', $dados['email'])->first();

        if($usuarioExistente != null){
            throw new \Exception('Já existe um usuário com o login especificado.');
        }

        $is_admin = null;
        if($dados['email'] == 'admin@masterer.com'){
            $is_admin = 1;
        }

        $dados['password'] = Hash::make($dados['password']);
        $dados['is_admin'] = $is_admin;

        $usuarioCriado = User::create($dados);

        return $usuarioCriado;
    }

    public static function update(array $dados)
    {
        $usuarioAtualizado = User::where('id', $dados['id'])
            ->update($dados);

        return $usuarioAtualizado;
    }

    public static function delete(int $id)
    {
        $usuarioExcluido = User::where('id',$id)
            ->delete();

        return $usuarioExcluido;
    }

    public static function findById(int $id)
    {
        return User::where('id', $id)->get()[0];
    }

    public static function findByEmail(string $email)
    {
        return User::where('email', $email)->get()[0];
    }

    public function index()
    {
        return User::all();
    }
}
