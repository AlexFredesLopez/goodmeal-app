<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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


        return response()->json([
            "tiendas" => $tiendas,
            "status" => true
        ], 200);
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
            'message' => "Tienda creada correctamente",
            'tienda' => $tienda
        ], 200);
    }



    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Tienda  $tienda
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Tienda $tienda)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function edit(Tienda $tienda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tienda $tienda)
    {
        //
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
    public function destroy($id)
    {

        $tienda = Tienda::where("id", $id);
        if($tienda->get() === null){

            return response()->json([
                "status" => false,
                "msg" => "La tienda que indicas no existe"
            ], 500);
        }

        $tienda->delete();

        return response()->json([
            "status" => true,
            "msg" => "La tienda  ha sido eliminada correctamente"
        ], 200);
    }


 /**
     *
     * @OA\Get (
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
    public function show($id){
        $tienda = Tienda::where("id" , $id)->get();
        if($tienda === null){
            return response()->json([
                "msg" => "Error al obtener la tienda",
                "status" => "false"
            ]);
        }
        return response()->json([
            "tienda" => $tienda,
            "status" => true
        ]);
    }
}
