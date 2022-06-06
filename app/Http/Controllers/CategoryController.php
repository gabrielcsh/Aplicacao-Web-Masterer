<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    
    }

    public function createCategory()
    {
        $category =  CategoryRepository::create([
            'name' => $_REQUEST['name']
        ]);

        if($category){
            Session::flash('message', 'Categoria inserida com sucesso!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('getCategories');
        } else {
            Session::flash('message', 'Erro ao cadastrar categoria, tente novamente!');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('insertCategories');
        }
    }

    public function editCategory(int $id)
    {
        $data = [
            'id'          => $id,
            'name'        => $_REQUEST['name'],
        ];

        CategoryRepository::update($data);

        Session::flash('message', 'Categoria atualizada com sucesso!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('editCategories', ['id' => $id]);
    }

    public function deleteCategory(int $id)
    {
        CategoryRepository::delete($id);

        Session::flash('message', 'Categoria excluida com sucesso!');
        Session::flash('alert-class', 'alert-success');
        
        return redirect()->route('getCategories');
    }
}
