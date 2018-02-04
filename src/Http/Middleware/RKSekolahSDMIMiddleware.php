<?php namespace Bantenprov\RKSekolahSDMI\Http\Middleware;

use Closure;

/**
 * The RKSekolahSDMIMiddleware class.
 *
 * @package Bantenprov\RKSekolahSDMI
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RKSekolahSDMIMiddleware
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
        return $next($request);
    }
}
