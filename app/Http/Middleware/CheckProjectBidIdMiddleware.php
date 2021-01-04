<?php

namespace App\Http\Middleware;

use Closure;
use App\Modules\ProjectBid\Entities\ProjectBid;


class CheckProjectBidIdMiddleware
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
        if(isset($name['id'])){
            $projectBid = ProjectBid::find($name['id']);
            if ($projectBid && $projectBid->status == 6) {
                return $next($request);
            }
            alertify('This Project is not Approved Yet.')->error();
            return redirect()->route('dashboard');
        }
        else{
            alertify('Whoops! YOU DIDNOT SELECT ANY OF THE PROJECT BID.')->error();
            return redirect(route('projectBid.index'));
        }
    }
}
