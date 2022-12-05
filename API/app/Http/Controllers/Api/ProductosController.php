<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductoResource;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductosController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/productos",
     *     @OA\Response(
     *          response="200",
     *          description="listado de productos"
     *     ),
     *     @OA\Response(
     *          response="500",
     *          description="error al listar las productos"
     *     )
     *
     * )
     *
     */
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
            "productos" => ProductoResource::collection($productos),
            "status" => true
        ], 200);
    }

    public function create()
    {

    }

 /**
     *
     * @OA\Post (
     *     path="/api/productos",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="producto_nombre",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="producto_descripcion",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="producto_precio",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="producto_stock",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "producto_nombre":"Producto Nombre prueba",
     *                     "producto_descripcion":"Descripcion Prueba",
     *                     "producto_precio": 1000,
     *                     "producto_stock": 10 ,
     *                     "tienda_id" : 2
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="producto_nombre", type="string", example="title"),
     *              @OA\Property(property="producto_descripcion", type="string", example="content"),
     *              @OA\Property(property="producto_precio", type="string", example="content"),
     *              @OA\Property(property="producto_stock", type="string", example="content"),
     *              @OA\Property(property="tienda_id", type="integer", example="content"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="invalid",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="fail"),
     *          )
     *      )
     * )
     */
    public function store(Request $request)
    {
        $request = $request->all();
        $request['producto_slug'] = Str::slug($request['producto_nombre']);


        $producto = Producto::create($request);


        if ($producto === null) {
            return response()->json([
                'status' => false,
                'message' => "Error al crear el producto"
            ], 200);
        }

        return response()->json([
            'status' => true,
            'message' => "Producto creado correctamente"
        ], 200);
    }



     /**
     *
     * @OA\Put (
     *     path="/api/productos/{id}",
    *      @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="producto_nombre",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="producto_descripcion",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="producto_precio",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="producto_stock",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "producto_nombre":"Producto Nombre prueba",
     *                     "producto_descripcion":"Descripcion Prueba",
     *                     "producto_precio": 1000,
     *                     "producto_stock": 10 ,
     *                     "tienda_id" : 2
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="producto_nombre", type="string", example="title"),
     *              @OA\Property(property="producto_descripcion", type="string", example="content"),
     *              @OA\Property(property="producto_precio", type="string", example="content"),
     *              @OA\Property(property="producto_stock", type="string", example="content"),
     *              @OA\Property(property="tienda_id", type="integer", example="content"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="invalid",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="fail"),
     *          )
     *      )
     * )
     */
    public function update($id, Request $request)
    {

        try {
            $producto = Producto::find($id);

            if($producto == null){
                throw new \Exception("Producto no existe");
            }

            $request = $request->all();
            $producto->producto_nombre = $request['producto_nombre'];
            $producto->producto_slug = Str::slug($request['producto_nombre']);
            $producto->producto_descripcion = $request['producto_descripcion'];
            $producto->producto_precio = $request['producto_precio'];
            $producto->producto_stock = $request['producto_stock'];
            $producto->tienda_id = $request['tienda_id'];

            $producto->save();

            return response()->json([
                "status" => true,
                "msg" => "Producto editado correctamente"
            ]);

        } catch (\Exception $th) {
            return response()->json([
                "status" => false,
                "msg" => $th->getMessage()
            ]);
        }
    }

    /**
     * @OA\Delete (
     *     path="/api/productos/{id}",
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *             @OA\Property(property="msg", type="string", example="Producto eliminado")
     *         )
     *     )
     * )
     */
    public function destroy($id)
    {
        try {

            $producto = Producto::find($id);

            if ($producto === null) {
                throw new \Exception('producto no existe');
            }
            if (! $producto->delete()) {
                throw new \Exception("Error al eliminar el producto");
            }
            return response()->json([
                "status" => true,
                "msg" => "El producto  ha sido eliminada correctamente"
            ], 200);
        } catch (\Throwable $th) {

            $msg = $th->getMessage();
            if ($th->getCode() == 23000) {
                $msg = "producto tiene productos asociados";
            }
            return response()->json([
                "status" => false,
                "msg" => $msg
            ], 500);
        }
    }


     /**
     *
     * @OA\Get (
     *     path="/api/productos/{id}",
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="producto_nombre", type="string", example="title"),
     *              @OA\Property(property="producto_descripcion", type="string", example="content"),
     *              @OA\Property(property="producto_precio", type="string", example="content"),
     *              @OA\Property(property="producto_stock", type="string", example="content"),
     *              @OA\Property(property="tienda_id", type="integer", example="content"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *         )
     *     )
     * )
     */
    public function show($id)
    {
        $producto = Producto::where("id", $id)->get();
        if ($producto === null) {
            return response()->json([
                "msg" => "Error al obtener el producto",
                "status" => "false"
            ]);
        }
        return response()->json([
            "producto" => ProductoResource::collection($producto),
            "status" => true
        ]);
    }
}
