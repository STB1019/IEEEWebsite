<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class isAtLeastMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ((!isset($_SESSION['role']))||($_SESSION['role']!='member' && $_SESSION['role']!='webmaster' && $_SESSION['role']!='admin')) {
            Log::info('User without permissions attempted to access restricted page');
            return response()->view('errors.404',['error_code' => '403','error_desc_1' => 'Only members can view this page!','error_desc_2' => 'Only registered members can view this page.']);
        }
        Log::info('User ' . $_SESSION['loggedName'] . ' accessed restricted page');
        return $next($request);
    }
}
