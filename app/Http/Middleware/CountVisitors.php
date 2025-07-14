<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class CountVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();//production
        // $ip = '188.209.226.118'; //local
        $locationData = Location::get($ip);

        // that come from go to
        sessionStart:

        //Start a new session
        session_start();

        //Check the session start time is set or not
        if (!isset($_SESSION['start'])) {
            $visiter = new Visitor();
            $visiter->location_info = json_encode($locationData);
            $visiter->save();

            $_SESSION['start'] = time();
            $_SESSION['ip'] = $ip;
        }

        //Check the session is expired or not
        if (isset($_SESSION['start'])) {
            if ((time() - $_SESSION['start'] > 3600)) {
                //Unset the session variables
                session_unset();

                //Destroy the session
                session_destroy();

                goto sessionStart;
            }
        }
        return $next($request);
    }
}
