<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{

    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Contech API",
     *      description="Contech API description",
     *      @OA\Contact(
     *          email="sndrawal50@gmail.com"
     *      ),
     *     @OA\License(
     *         name="Apache 2.0",
     *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *     )
     * )
     */
 
    /**  @OA\Server(
     *      url="/api/v1",
     *      description="L5 Swagger OpenApi Server"
     * )
     */

    
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
