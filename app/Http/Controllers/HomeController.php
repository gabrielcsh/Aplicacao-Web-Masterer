<?php

namespace App\Http\Controllers;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('adminHome');
    }

    public function produto($id = null)
    {
        if( !empty($id) ) {
            $registro = Product::where([
                'id'    => $id,
                ])->first();

            if( !empty($registro) ) {
                return view('produto', [
                    'registro' => $registro
                ]);
            }
        }
        return redirect()->route('home');
    }
}
