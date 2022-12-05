<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TiendaResource;
use App\Models\Tienda;
use Illuminate\Http\Request;




class TiendaController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/tiendas",
     *     @OA\Response(
     *          response="200",
     *          description="listado de tiendas"
     *     ),
     *     @OA\Response(
     *          response="500",
     *          description="error al listar las tiendas"
     *     )
     *
     * )
     *
     */
    public function index()
    {

        $tiendas = Tienda::all();

        if ($tiendas === null) {
            return response()->json([
                'msg' => "Error al listar las tiendas",
                "status" => false
            ], 500);
        }

        return TiendaResource::collection($tiendas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     *
     * @OA\Post (
     *     path="/api/tiendas",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="nombre",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="direccion",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="telefono",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="horario_retiro",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "nombre":"example title",
     *                     "direccion":"example content",
     *                     "telefono":"example content",
     *                     "horario_retiro":"example content"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="nombre", type="string", example="title"),
     *              @OA\Property(property="direccion", type="string", example="content"),
     *              @OA\Property(property="telefono", type="string", example="content"),
     *              @OA\Property(property="horario_retiro", type="string", example="content"),
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
        $tienda = Tienda::create($request->all());

        if ($tienda === null) {
            return response()->json([
                'status' => false,
                'message' => "Error al crear la tienda"
            ], 200);
        }

        return response()->json([
            'status' => true,
            'message' => "Tienda creada correctamente"
        ], 200);
    }



    public function edit(Tienda $tienda)
    {
        //
    }

    /**
     * @OA\Put (
     *     path="/api/tiendas/{id}",
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     * @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="nombre",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="direccion",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="telefono",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="horario_retiro",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "nombre":"example title",
     *                     "direccion":"example content",
     *                     "telefono":"example content",
     *                     "horario_retiro":"example content"
     *                }
     *             )
     *         )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *             @OA\Property(property="msg", type="string", example="Tienda eliminada")
     *         )
     *     )
     * )
     */
    public function update($id, Request $request)
    {
        try {

            $tienda = Tienda::find($id);
            $request = $request->all();
            $tienda->nombre = $request['nombre'];
            $tienda->direccion = $request['direccion'];
            $tienda->telefono = $request['telefono'];
            $tienda->horario_retiro = $request['horario_retiro'];

            $tienda->save();


            return response()->json([
                'status' => true,
                "msg" => "Tienda editada correctamente"
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'status' => false,
                "msg" => $th->getMessage()
            ]);
        }
    }

     /**
     * @OA\Delete (
     *     path="/api/tiendas/{id}",
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *             @OA\Property(property="msg", type="string", example="Tienda eliminada correctamente")
     *         )
     *     )
     * )
     */
    public function destroy($id)
    {
        try {

            $tienda = Tienda::where("id", $id)->first();

            if ($tienda === null) {
                throw new \Exception('Tienda no existe');
            }
            if ($tienda->delete()) {
                throw new \Exception("Tienda tiene productos asociados");
            }
            return response()->json([
                "status" => true,
                "msg" => "La tienda  ha sido eliminada correctamente"
            ], 200);
        } catch (\Throwable $th) {

            $msg = $th->getMessage();
            if ($th->getCode() == 23000) {
                $msg = "Tienda tiene productos asociados";
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
     *     path="/api/tiendas/{id}",
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
     *              @OA\Property(property="nombre", type="string", example="title"),
     *              @OA\Property(property="direccion", type="string", example="content"),
     *              @OA\Property(property="telefono", type="string", example="content"),
     *              @OA\Property(property="horario_retiro", type="string", example="content"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *         )
     *     )
     * )
     */
    public function show($id)
    {
        $tienda = Tienda::where("id", $id)->get();


        if ($tienda === null) {
            return response()->json([
                "msg" => "Error al obtener la tienda",
                "status" => "false"
            ]);
        }
        return response()->json([
            "tienda" => TiendaResource::collection($tienda),
            "status" => true
        ]);
    }
}
