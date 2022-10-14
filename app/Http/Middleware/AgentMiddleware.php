<?php

namespace App\Http\Middleware;

use App\Model\Agent\UserAgent;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session('agent_login')) {
            return redirect()->route('agent.login');
        }

        return $next($request);
    }
}
