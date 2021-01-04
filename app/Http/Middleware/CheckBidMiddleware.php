<?php

namespace App\Http\Middleware;

use Route;
use Closure;
use Request;
use App\Modules\ProjectBid\Entities\ProjectBid;

class CheckBidMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $name = $request->all(); 
        if(isset($name['bid_id'])){
            $projectBid = ProjectBid::find($name['bid_id']);
            if ($projectBid && $projectBid->status == 6) {
               return $next($request);
            }
            alertify('This Project is not Approved Yet.')->error();
            return redirect()->route('dashboard');
       }else{
        alertify('Whoops! YOU DIDNOT SELECT ANY OF THE PROJECT.')->error();
        $currentUrl = Route::current()->getName();
        return redirect(route('project.select', ['url' => $currentUrl]));
    }

}
}
