<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{


    public function index()
    {

        $productos = Producto::all();

        if($productos === null){
            return response()->json([
                "msg" => "No hay productos a mostrar",
                "status" => true
            ], 200);
        }
        return response()->json([
            "productos" => Producto::all(),
            "status" => true
        ], 200);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Producto $producto)
    {
        //
    }


    public function edit(Producto $producto)
    {
        //
    }


    public function update(Request $request, Producto $producto)
    {
        //
    }

    public function destroy(Producto $producto)
    {
        //
    }
}
