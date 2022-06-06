<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Facades\Hash;

class CategoryRepository
{
    /**
     * @var Category
     */
    private $category;

    public function __construct(Category $category)
    {
        $this->category           = $category;
    }

    public static function create(array $dados)
    {
        $categoriaCriada = Category::create($dados);

        return $categoriaCriada;
    }

    public static function update(array $dados)
    {
        $categoriaAtualizada = Category::where('id', $dados['id'])
            ->update($dados);

        return $categoriaAtualizada;
    }

    public static function delete(int $id)
    {
        $usuarioExcluido = Category::where('id',$id)
            ->delete();

        return $usuarioExcluido;
    }

    public static function findById(int $id)
    {
        return Category::where('id', $id)->get()[0];
    }

    public function index()
    {
        return Category::all();
    }
}
