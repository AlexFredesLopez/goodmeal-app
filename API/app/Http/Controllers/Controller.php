<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


/**
 * @OA\Info(
 *      title="My First API",
 *      version="0.1",
 *      contact="Alex Fredes",
 *
 * )
 *
 * @OA\Server (
 *  url="http://localhost:8080",
 * description="Api rest para el test de goodmeal"
 *
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
