<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = Product::all();

        return view('admin.product.index', [
            'resources' => $resources
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.product.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Product();
        $data['name'] = $request->get('name');
        $data['description'] = $request->get('description');
        $data['categorie_id'] = $request->get('category');
        $formatPreco = floatval(str_replace( array( '\'', '"', 'R$' , ''), '', $request->get('preco')));
        $data['preco'] = $formatPreco;
        $file= $request->file('image');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('images-products'), $filename);
        $data['image'] = $filename;

        $data->save();

        return redirect()->route('product.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resources = Product::where('id', $id)->get();
        $categories = Category::all();

        return view('admin.product.edit', [
            'resources' => $resources,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $data['name'] = $request->get('name');
        $data['description'] = $request->get('description');
        $data['categorie_id'] = $request->get('category');
        $formatPreco = floatval(str_replace( array( '\'', '"', 'R$' , ''), '', $request->get('preco')));
        $data['preco'] = $formatPreco;

        if($request->file('image') != ''){

            if($product->image != ''  && $product->image != null){
                unlink("images-products/".$product->image);
            }

            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images-products'), $filename);

            $data['image'] = $filename;
       }

       $product->update($data);

       Session::flash('message', 'Produto editado com sucesso!');
       Session::flash('alert-class', 'alert-success');

       return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        unlink("images-products/".$product->image);

        $product->delete();

        Session::flash('message', 'Produto excluido com sucesso!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('product.index');
    }
}
